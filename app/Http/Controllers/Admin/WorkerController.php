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

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers =  DB::table('users')->where('role', 0)->get();
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
        $worker =  DB::table('users')->where('id', $id)->first();
        $old_client = DB::table('clients')->where('worker_id', $id)->pluck('id')->toArray();
        // dd($old_client);
        return view('admin.workers.edit', compact('worker', 'clients', 'old_client'));
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
}
