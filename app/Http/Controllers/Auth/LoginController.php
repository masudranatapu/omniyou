<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function AdminLoginPage()
    {
         return view('auth.admin_login');
    }

    public function AdminLogin(Request $request)
    {
        $validate = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);

        if (auth()->attempt(array('email' => $request->email, 'password' => $request->password))) {

            if (auth()->user()->status == 0) {
                Auth::logout();
                $notification = array('message' => 'Your account is inactive. Please contact admin.','alert-type' => 'error',);
                return redirect()->back()->with($notification);
            }

            if (auth()->user()->role == 1) {
                 $notification = array(
                    'message' => 'You are logged in',
                    'alert-type' => 'success',
                 );
                 return redirect()->route('admin.dashboard')->with($notification);
            }else{
                return redirect()->route('home');
            }

        }else{
            $notification = array('message' => 'Invalid email or password','alert-type' => 'error',);
            return redirect()->back()->withInput()->with($notification);
        }
    }

}
