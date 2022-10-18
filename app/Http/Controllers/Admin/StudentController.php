<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Notifications\StudentNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students =  DB::table('users')->where('role', 0)->get();
        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = DB::table('courses')->where('status', 1)->get();
        return view('admin.students.create', compact('courses'));
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
            'course_id' => 'required',
        ]);
        // dd($request->course_id);
        $pass = Str::random(8);
        $data = [];
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['course_id'] = json_encode($request->course_id);
        $data['status'] = $request->status;
        $data['password'] = Hash::make($pass);
        $data['str_pass'] = $pass;
        $data['role'] = 0;
        $data['created_at'] = Carbon::now();
        DB::table('users')->insert($data);

        $userMail = [
            'subject' => 'New students login info.',
            'greeting' => 'Hi ' . $data['name']  . ', ',
            'email' => 'Login Email : ' . $data['email'],
            'password' => 'Login Password : ' . $pass,
            'body' => 'Your account is created on HaiEnglish.com , Now you can use our website
             by login with the above credentials. ',
            'thanks' => 'Thank you for using HaiEnglish',
        ];
        // Notification::route('mail', $data['email'])->notify(new StudentNotification($userMail));

        $notification = array('message' => 'Student added successfully.','alert-type' => 'success',);
        return redirect()->route('admin.student.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courses = DB::table('courses')->where('status', 1)->get();
        $student =  DB::table('users')->where('id', $id)->first();
        return view('admin.students.edit', compact('student', 'courses'));
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
            'email' => 'required|email|unique:users,email,'.$id
        ]);
        $data = [];
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['course_id'] = $request->course_id;
        $data['status'] = $request->status;
        $data['created_at'] = now();
        DB::table('users')->where('id', $id)->update($data);

        $notification = array('message' => 'Student updated successfully.','alert-type' => 'success',);
        return redirect()->route('admin.student.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        $notification = array('message' => 'Student deleted successfully.','alert-type' => 'success',);
        return redirect()->route('admin.student.index')->with($notification);
    }
}
