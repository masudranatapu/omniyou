<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{

    public function index()
     {
        $data = DB::table('quiz_questions')->orderBy('id', 'DESC')->get();
        return view('admin.question.index', compact('data'));
     }

    public function create()
    {
        $courses = DB::table('courses')->where('status', 1)->get();
        return view('admin.question.create', compact('courses'));
    }

    public function store(Request $request)
     {
         $request->validate([
            'question'      => 'required',
            'course_id' => 'required',
            'order_num'     => 'required',
            'status'        => 'required',
         ]);

         $data = array();
         $data['question']      = $request->question;
         $data['course_id'] = $request->course_id;
         $data['order_id']      = $request->order_num;
         $data['status']        = $request->status;
         DB::table('quiz_questions')->insert($data);
         $notification = array('message' => 'Question Add Successfully.','alert-type' => 'success',);
         return redirect()->route('question.index')->with($notification);
     }

   public function edit($id)
    {
        $courses = DB::table('courses')->where('status', 1)->get();
        $data = DB::table('quiz_questions')->where('id', $id)->first();
        return view('admin.question.edit', compact('data', 'courses'));
    }

    public function update(Request $request, $id)
    {

         $data = array();
         $data['question']      = $request->question;
         $data['question_type'] = $request->question_type;
         $data['order_id']      = $request->order_num;
         $data['status']        = $request->status;
         DB::table('quiz_questions')->where('id', $id)->update($data);
         $notification = array('message' => 'Question Updated Successfully.','alert-type' => 'success',);
         return redirect()->route('question.index')->with($notification);
    }

   public function view($id)
    {
        $data = DB::table('quiz_questions')->where('id', $id)->first();
        return view('admin.question.view', compact('data'));
    }

    public function destroy($id)
    {
        $data = DB::table('quiz_questions')->where('id', $id)->delete();
        $notification = array('message' => 'Question Deleted Successfully.','alert-type' => 'success',);
        return redirect()->back()->with($notification);
    }


    public function QuizAnsIndex()
    {
        $data = DB::table('quiz_questions')
                ->leftjoin('quiz_options', 'quiz_questions.id', 'quiz_options.question_no')
                ->select('quiz_questions.*', 'quiz_options.question_no', 'quiz_options.answer_option')
                ->get();
        return view('admin.quiz_answer.index', compact('data'));
    }

    public function QuizAnsCreate()
    {
        $question    = DB::table('quiz_questions')->get();
        $quiz_option = DB::table('quiz_options')->get();
        return view('admin.quiz_answer.create', compact('question', 'quiz_option'));
    }

    public function QuizAnsEdit()
    {
        return view('admin.quiz_answer.edit');
    }

    public function QuizOptionIndex()
    {
         $data = DB::table('quiz_options')
                ->leftjoin('quiz_questions', 'quiz_options.question_no', 'quiz_questions.id')
                ->select('quiz_options.*', 'quiz_questions.question')
                ->get();
        return view('admin.quiz_option.index', compact('data'));
    }

    public function QuizOptionCreate()
    {
        $question    = DB::table('quiz_questions')->get();
        return view('admin.quiz_option.create', compact('question'));
    }

    public function QuizOptionEdit()
    {
        $question    = DB::table('quiz_questions')->get();
        return view('admin.quiz_option.edit', compact('question'));
    }








}
