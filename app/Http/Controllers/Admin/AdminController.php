<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\QuizQuestion;
use App\InterviewUser;
use App\UserCorrectAns;
use App\UserQuizAnswer;
use App\UserFreeWritingAns;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = InterviewUser::count();
        $questions = QuizQuestion::count();
        $workers = User::where('role', 0)->count();
        $clients = DB::table('clients')->where('status', 1)->count();
        return view('admin.dashboard', compact('users', 'questions', 'workers', 'clients'));
    }

    public function AdminProfile()
    {
        return view('admin.profile.index');
    }

    public function AdminProfileUpdate(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required',
            'image'    => 'image|mimes:jpg,png,jpeg',
        ]);

        $data = User::find(Auth::user()->id);
        $data->name    = $request->name;
        $data->email   = $request->email;
        if ($request->hasFile('image')) {
            // delete old image
            $imagePath = public_path($data->image);
            if (file_exists($imagePath)) {
                File::delete($imagePath);
            }
            // add new image
            $image = $request->file('image');
            $name  = time() . '.' . $image->getClientoriginalExtension();
            $image->move('backend/img/profile/', $name);
            $data->image = 'backend/img/profile/' . $name;
        }
        $data->update();
        $notification = array('message' => 'Profile Updated Successfully.', 'alert-type' => 'success',);
        return redirect()->back()->with($notification);
    }

    public function AdminPasswordChange(Request $request)
    {
        $request->validate([
            'old_password'            => 'required',
            'new_password'            => 'required|min:8',
            'password_confirmation'   => 'required|min:8|same:new_password',
        ]);

        $current_user = Auth::user();
        $old_password = $request->old_password;
        if (Hash::check($old_password, $current_user->password)) {
            $current_user_password = Hash::make($request->new_password);
            DB::table('users')->where('id', $current_user->id)->update(['pssword' => $current_user_password]);
            Auth::logout();
            $notification = array('message' => 'Password Changed', 'alert-type' => 'success');
            return redirect()->route('admin.login')->with($notification);
        } else {
            $notification = array('message' => 'Old Password Not Matched!', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }

    public function QuizList(Request $request )
    {
        $interview_user = InterviewUser::orderBy('id', 'desc')->get();
        $survey = DB::table('survey')->get();

        if($request->selectserveryid == 1) {
            $clients_survey = DB::table('clients_survey')
            ->select('clients_survey.*','survey.name as survey_name','survey.date as survey_date','survey.question_ids','worker.name as worker_name','clients.name as client_name')
            ->leftJoin('survey','survey.id','clients_survey.survey_id')
            ->leftJoin('users as worker','worker.id','clients_survey.worker_id')
            ->leftJoin('clients', 'clients.id','clients_survey.client_id')
            ->where('survey_id', $request->survey_id)
            ->get();
            // dd($clients_survey);
            return view('admin.user_quiz.index', compact('interview_user','survey','clients_survey'));
        }else {
            $clients_survey = DB::table('clients_survey')
            ->select('clients_survey.*','survey.name as survey_name','survey.date as survey_date','survey.question_ids','worker.name as worker_name','clients.name as client_name')
            ->leftJoin('survey','survey.id','clients_survey.survey_id')
            ->leftJoin('users as worker','worker.id','clients_survey.worker_id')
            ->leftJoin('clients', 'clients.id','clients_survey.client_id')
            ->get();
            return view('admin.user_quiz.index', compact('interview_user','survey','clients_survey'));
        }
    }

    public function QuizView($id)
    {
        $clients_survey = DB::table('clients_survey')
        ->select('clients_survey.*','survey.name as survey_name','survey.date as survey_date','survey.question_ids','worker.name as worker_name','clients.name as client_name')
        ->leftJoin('survey','survey.id','clients_survey.survey_id')
        ->leftJoin('users as worker','worker.id','clients_survey.worker_id')
        ->leftJoin('clients', 'clients.id','clients_survey.client_id')
        ->where('clients_survey.id', $id)
        ->first();

        // dd($clients_survey);

        $interview_user = InterviewUser::find($id);
        $ans_questions = UserQuizAnswer::where('interview_user_id',$id)->where('quiz_course_id',$id)->get();
        
        return view('admin.user_quiz.view', compact('clients_survey', 'interview_user', 'ans_questions'));

    }

    public function destroy($id)
    {

        $interview = InterviewUser::where('id', $id)->first();
        $correct = UserCorrectAns::where('interview_user_id', $interview->student_id)->where('quiz_course_id', $interview->course_id)->get();
        $answer = UserQuizAnswer::where('interview_user_id', $interview->student_id)->where('quiz_course_id', $interview->course_id)->get();
        // dd($correct->count());
        foreach ($correct as $key => $value) {
            $value->delete();
        }
        foreach ($answer as $key => $value) {
            $value->delete();
        }
        InterviewUser::where('id', $id)->delete();
        $notification = array('message' => 'Quiz Deleted Successfully.', 'alert-type' => 'error',);
        return redirect()->route('quiz.index')->with($notification);
    }

}
