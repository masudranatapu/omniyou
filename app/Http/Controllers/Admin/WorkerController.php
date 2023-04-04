<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Notifications\StudentNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers =  DB::table('users')->select('users.*','survey.name as survey_name')->leftJoin('survey','survey.id','users.running_survey_id')->where('role', 'worker')->get();
        // dd($workers->course_id);
        // foreach (json_decode(($workers->course_id)) as $key => $value) {
        //     dd($value);
        // }
        return view('admin.workers.index', compact('workers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = DB::table('clients')->where('status', 1)->where('worker_id', null)->get();
        return view('admin.workers.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);
        $client_id = $request->assign_client;
        // dd(($client_id));

        $pass = Str::random(8);
        $data = [];
        $data['name'] = $request->name;
        $data['code'] = DB::table('users')->where('role','worker')->max('code')+1;
        $data['email'] = $request->email;
        $data['client_id'] = json_encode($request->client_id);
        $data['status'] = $request->status;
        $data['password'] = Hash::make($pass);
        $data['str_pass'] = $pass;
        $data['role'] = 0;
        $data['created_at'] = Carbon::now();
        if ($client_id && $request->status == 0) {
            $notification = array('message' => 'Opps! Cannot add client for inactive worker.', 'alert-type' => 'error',);
            return redirect()->back()->withInput()->with($notification);
        }
        $id = DB::table('users')->insertGetId($data);
        if ($client_id) {
            $clients = DB::table('clients')->whereIn('id', $client_id)->get();
            foreach ($clients as $key => $client) {
                DB::table('clients')->where('id', $client->id)->update(['worker_id' => $id]);
            }
        }

        $userMail = [
            'subject' => 'New workers login info.',
            'greeting' => 'Hi ' . $data['name']  . ', ',
            'email' => 'Login Email : ' . $data['email'],
            'password' => 'Login Password : ' . $pass,
            'body' => 'Your account is created on Assesment Builder as a worker. , Now you can use our website
             by login with the above credentials. ',
            'thanks' => 'Thank you for using Assesment Builder',
        ];
        Notification::route('mail', $data['email'])->notify(new StudentNotification($userMail));

        $notification = array('message' => 'Worker added successfully.', 'alert-type' => 'success',);
        return redirect()->route('admin.worker.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $worker =  DB::table('users')->where('id', $id)->first();
        $clients = DB::table('clients')->where('worker_id', $id)->get();
        return view('admin.workers.show', compact('worker', 'clients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients = DB::table('clients')->where('status', 1)->where('worker_id', null)->orWhere('worker_id', $id)->get();
        $survey = DB::table('survey')->where('status', 1)->get();
        $worker =  DB::table('users')->where('id', $id)->first();
        $old_client = DB::table('clients')->where('worker_id', $id)->pluck('id')->toArray();
        // dd($old_client);
        return view('admin.workers.edit', compact('worker', 'clients', 'old_client','survey'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id
        ]);
        $data = [];
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['client_id'] = json_encode($request->client_id);
        $data['status'] = $request->status;
        $data['running_survey_id'] = $request->running_survey_id;
        $data['created_at'] = Carbon::now();
        DB::table('users')->where('id', $id)->update($data);
        $client_id = $request->assign_client;
        $previous_client = DB::table('clients')->where('worker_id', $id)->pluck('id')->toArray();

        if (!empty($previous_client) || $client_id && $request->status == 0) {
            foreach ($previous_client as $key => $value) {
                DB::table('clients')->where('id', $value)->update(['worker_id' => null]);
            }
            $notification = array('message' => 'Client cannot assigned for inactive worker.', 'alert-type' => 'warning',);
            return redirect()->route('admin.worker.index')->with($notification);
        }

        if ($client_id) {
            $clients = DB::table('clients')->whereIn('id', $client_id)->pluck('id')->toArray();
            $mismatch = array_diff($previous_client, $clients);
            // dd($mismatch);
            if ($mismatch) {
                // $null_client = DB::table('clients')->whereIn('id', $mismatch)->get();
                foreach ($mismatch as $key => $value) {
                    // dd($value);
                    DB::table('clients')->where('id', $value)->update(['worker_id' => null]);
                }
            }
            foreach ($clients as $key => $client) {
                DB::table('clients')->where('id', $client)->update(['worker_id' => $id]);
            }
        } else {
            if (!empty($previous_client)) {
                foreach ($previous_client as $key => $value) {
                    DB::table('clients')->where('id', $value)->update(['worker_id' => null]);
                }
            }
        }


        $notification = array('message' => 'Worker updated successfully.', 'alert-type' => 'success',);
        return redirect()->route('admin.worker.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $previous_client = DB::table('clients')->where('worker_id', $id)->pluck('id')->toArray();
        if (!empty($previous_client)) {
            foreach ($previous_client as $key => $value) {
                DB::table('clients')->where('id', $value)->update(['worker_id' => null]);
            }
        }
        DB::table('users')->where('id', $id)->delete();
        $notification = array('message' => 'Worker deleted successfully.', 'alert-type' => 'success',);
        return redirect()->route('admin.worker.index')->with($notification);
    }

    public function surveyUser($wid,$sid)
    {
        $workers = DB::table('users')->where('id', $wid)->first();
        $clients = DB::table('clients')->where('status', 1)->get();
        $client_survey = DB::table('clients_survey')->where('worker_id', $wid)->where('survey_id', $sid)->pluck('client_id')->toArray();
        return view('admin.workers.surveyuser', compact('workers', 'clients','client_survey'));
    }

    public function assignedClient(Request $request)
    {
        if($request->check == 'checked'){

            $clients_survey_id = DB::table('clients_survey')->insertGetId([
                'survey_id' => $request->survey,
                'client_id' => $request->client,
                'worker_id' => $request->worker,
                'date' => date('Y-m-d'),
                'status' => 1,
                'created_at'=> Carbon::now(),
                'created_by' => Auth::user()->id,
            ]);

            $survey = DB::table('survey')->where('id', $request->survey)->first();

            $questions = json_decode($survey->question_ids);

            foreach ($questions as $key => $value) {

                $quizquestions = DB::table('quiz_questions')->where('id', $value)->first();
                // return $quizquestions->question_type;
                // return $quizquestions->question;

                if($quizquestions->question_type == 1){

                    $quiz_options = DB::table('quiz_options')
                                        ->where('question_no', $quizquestions->id)
                                        ->select('answer_option')
                                        ->get();

                    $data = json_encode($quiz_options);

                }else {
                    $data = NULL;
                }

                DB::table('clients_survey_questions')->insert([
                    'clients_survey_id' => $clients_survey_id,
                    'quiz_question_id' => $value,
                    'quiz_question' => $quizquestions->question,
                    'question_type' => $quizquestions->question_type,
                    'question_options' => $data,
                    'created_at' => Carbon::now(),
                    'created_by' => Auth::user()->id,
                ]);

            }

            $result = 1;
            return response()->json(['success'=>'Client assigned successfully done', 'result' => $result]);

        }else {

            $clientssurvey =  DB::table('clients_survey')->where('survey_id', $request->survey)->where('client_id', $request->client)->where('worker_id', $request->worker)->first();
            DB::table('clients_survey_questions')->where('clients_survey_id', $clientssurvey->id)->delete();
            DB::table('clients_survey')->where('survey_id', $request->survey)->where('client_id', $request->client)->where('worker_id', $request->worker)->delete();
            $result = 0;
            return response()->json(['success'=>'Client unassigned successfully done', 'result' => $result]);
        }
    }

}
