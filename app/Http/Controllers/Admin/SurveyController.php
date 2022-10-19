<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $survey = DB::table('survey')->get();
        return view('admin.survey.index', compact('survey'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = DB::table('quiz_questions')->where('status',1)->get();
        return view('admin.survey.create', compact('questions'));
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
            'name' => 'required|unique:survey,name',
            'question_ids' => 'required',
        ]);

        $data['name'] = $request->name;
        $data['date'] = date_create($request->date);
        $data['status'] = $request->status;
        $data['question_ids'] = json_encode($request->question_ids);
        $data['created_at'] = Carbon::now();
        $data['created_by'] = Auth::user()->id;
        DB::table('survey')->insert($data);
        $notification = array('message' => 'Survey Created Successfully.', 'alert-type' => 'success',);
        return redirect()->route('admin.survey.index')->with($notification);
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
        $survey = DB::table('survey')->where('id', $id)->first();
        $questions = DB::table('quiz_questions')->where('status',1)->get();
        return view('admin.survey.edit', compact('survey','questions'));
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
            'name' => 'required|unique:survey,name,' . $id,
            'question_ids' => 'required',
        ]);

        $data['name'] = $request->name;
        $data['date'] = date_create($request->date);
        $data['status'] = $request->status;
        $data['question_ids'] = json_encode($request->question_ids);
        $data['created_at'] = Carbon::now();
        $data['created_by'] = Auth::user()->id;
        DB::table('survey')->where('id', $id)->update($data);
        $notification = array('message' => 'Survey Created Successfully.', 'alert-type' => 'success',);
        return redirect()->route('admin.survey.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('survey')->where('id', $id)->delete();
        $notification = array('message' => 'Survey deleted successfully.', 'alert-type' => 'success',);
        return redirect()->route('admin.survey.index')->with($notification);
    }
}
