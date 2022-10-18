<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\QuizQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = DB::table('courses')->get();
        return view('admin.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.create');
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
            'name' => 'required|unique:courses,name',
        ]);

        $data = [];
        $data['name'] = $request->name;
        $data['status'] = $request->status;
        $data['order_id'] = $request->order_id;
        $data['created_at'] = now();

        DB::table('courses')->insert($data);
        $notification = array('message' => 'Course Add Successfully.', 'alert-type' => 'success',);
        return redirect()->route('admin.course.index')->with($notification);
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
        $course = DB::table('courses')->where('id', $id)->first();
        return view('admin.course.edit', compact('course'));
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
            'name' => 'required|unique:courses,name,' . $id
        ]);
        $student = DB::table('users')->where('role', 0)->get();
        $all = [];
        if ($request->status == 0) {
            foreach ($student as $key => $value) {
                $new = json_decode($value->course_id);
                foreach ($new as $key => $val) {
                    if ($val == $id) {
                        array_push($all, $val);
                        $notification = array('message' => 'Status cannot be changed.', 'alert-type' => 'error',);
                        return redirect()->back()->with($notification);
                    }
                }
            }
            $qsn = QuizQuestion::where('course_id', $id)->get();
            if ($qsn && $qsn->count() > 0) {
                $notification = array('message' => 'Status cannot be changed.', 'alert-type' => 'error',);
                return redirect()->route('admin.course.index')->with($notification);
            }
        }
        $data = [];
        $data['name'] = $request->name;
        $data['status'] = $request->status;
        $data['order_id'] = $request->order_id;
        $data['created_at'] = now();

        DB::table('courses')->where('id', $id)->update($data);

        $notification = array('message' => 'Course Updated Successfully.', 'alert-type' => 'success',);
        return redirect()->route('admin.course.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $student = DB::table('users')->where('role', 0)->get();
        $all = [];
        foreach ($student as $key => $value) {
            $new = json_decode($value->course_id);
            foreach ($new as $key => $val) {
                if ($val == $id) {
                    array_push($all, $val);
                    $notification = array('message' => 'Course cannot be deleted.', 'alert-type' => 'error',);
                    return redirect()->route('admin.course.index')->with($notification);
                }
            }
        }
        $qsn = QuizQuestion::where('course_id', $id)->get();
        if ($qsn && $qsn->count() > 0) {
            $notification = array('message' => 'Course cannot be deleted.', 'alert-type' => 'error',);
            return redirect()->route('admin.course.index')->with($notification);
        }
        DB::table('courses')->where('id', $id)->delete();

        $notification = array('message' => 'Course deleted successfully.', 'alert-type' => 'success',);
        return redirect()->route('admin.course.index')->with($notification);
    }
}
