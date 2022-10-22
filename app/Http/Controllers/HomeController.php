<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }
            $course_id = json_decode(Auth::user()->course_id);
            $courses = DB::table('courses')->whereIn('id', $course_id)->get();
            return view('home', compact('courses'));
        } else {
            return view('home');
        }
    }

    public function profile()
    {
        $user = User::find(Auth::user()->id);
        $course_id = json_decode(Auth::user()->course_id);
        $courses = DB::table('courses')->whereIn('id', $course_id)->get();
        return view('profile', compact('user', 'courses'));
    }

    public function profileUpdate(Request $request)
    {
        $current_user = User::find(Auth::user()->id);
        $data = $request->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::user()->id],
        ]);
        // $current_user->name = $request->name;
        // $current_user->email = $request->email;
        if ($request->pass_change == 1) {
            $request->validate([
                'old_password'            => 'required',
                'new_password'            => 'required|min:8',
                'password_confirmation'   => 'required|min:8|same:new_password',
            ]);

            $old_password = $request->old_password;
            if (Hash::check($old_password, Auth::user()->password)) {
                $data['password'] = Hash::make($request->new_password);
            } else {
                $notification = array('message' => 'Old Password Not Matched!', 'alert-type' => 'error');
                return redirect()->back()->with($notification);
            }
        }
        // dd($request->pass_change);
        DB::table('users')->where('id', Auth::user()->id)->update($data);
        $notification = array('message' => 'Profile Updated', 'alert-type' => 'success');
        return redirect()->route('home')->with($notification);
    }
}
