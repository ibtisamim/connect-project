<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLogin
{
    public function handle(Request $request, Closure $next ,$guard = null)
    {
//      if (Auth::guard($guard)->check()) {
//
//        if($guard == "admin"){
//
//          return redirect()->route('admin_login');
//
//        } else {
//
//          return redirect()->route('login');
//        }
//
//      }

        return $next($request);
    }
}
