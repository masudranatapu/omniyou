<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    // {
    //     if(auth()->user()->role == 'admin'){
    //         return $next($request);
    //     }else{
    //         return redirect()->back()->with('error', 'Sorry, You are not a admin !!');
    //     }


    // }

    public function handle($request, Closure $next, String $role = null) {
        if (!Auth::check()) // This isnt necessary, it should be part of your 'auth' middleware
            return redirect('/');

        $user = Auth::user();
        if($user->role == $role)
            return $next($request);

        return redirect('/');
    }


}


