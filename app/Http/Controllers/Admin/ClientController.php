<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\QuizQuestion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = DB::table('clients')->get();
        return view('admin.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client.create');
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
            'name' => 'required',
            'email' => 'required|unique:clients,email',
        ]);

        $data = [];
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['phone'] = $request->phone;
        $data['status'] = $request->status;
        $data['order_id'] = $request->order_id;
        $data['created_at'] = Carbon::now();

        DB::table('clients')->insert($data);
        $notification = array('message' => 'client Add Successfully.', 'alert-type' => 'success',);
        return redirect()->route('admin.client.index')->with($notification);
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
        $client = DB::table('clients')->where('id', $id)->first();
        return view('admin.client.edit', compact('client'));
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
            'name' => 'required',
            'email' => 'required|unique:clients,email,' . $id
        ]);
        // $student = DB::table('users')->where('role', 0)->get();
        // $all = [];
        // if ($request->status == 0) {
        //     foreach ($student as $key => $value) {
        //         $new = json_decode($value->client_id);
        //         foreach ($new as $key => $val) {
        //             if ($val == $id) {
        //                 array_push($all, $val);
        //                 $notification = array('message' => 'Status cannot be changed.', 'alert-type' => 'error',);
        //                 return redirect()->back()->with($notification);
        //             }
        //         }
        //     }
        //     $qsn = QuizQuestion::where('client_id', $id)->get();
        //     if ($qsn && $qsn->count() > 0) {
        //         $notification = array('message' => 'Status cannot be changed.', 'alert-type' => 'error',);
        //         return redirect()->route('admin.client.index')->with($notification);
        //     }
        // }
        $data = [];
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['phone'] = $request->phone;
        $data['status'] = $request->status;
        $data['order_id'] = $request->order_id;
        $data['updated_at'] = Carbon::now();

        DB::table('clients')->where('id', $id)->update($data);

        $notification = array('message' => 'client Updated Successfully.', 'alert-type' => 'success',);
        return redirect()->route('admin.client.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // $student = DB::table('users')->where('role', 0)->get();
        // $all = [];
        // foreach ($student as $key => $value) {
        //     $new = json_decode($value->client_id);
        //     foreach ($new as $key => $val) {
        //         if ($val == $id) {
        //             array_push($all, $val);
        //             $notification = array('message' => 'client cannot be deleted.', 'alert-type' => 'error',);
        //             return redirect()->route('admin.client.index')->with($notification);
        //         }
        //     }
        // }
        // $qsn = QuizQuestion::where('client_id', $id)->get();
        // if ($qsn && $qsn->count() > 0) {
        //     $notification = array('message' => 'client cannot be deleted.', 'alert-type' => 'error',);
        //     return redirect()->route('admin.client.index')->with($notification);
        // }
        DB::table('clients')->where('id', $id)->delete();

        $notification = array('message' => 'client deleted successfully.', 'alert-type' => 'success',);
        return redirect()->route('admin.client.index')->with($notification);
    }
}
