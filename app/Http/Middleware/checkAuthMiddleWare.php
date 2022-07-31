<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class checkAuthMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next )
    {

/*
            if(Auth::check() && Auth::user()->hasRole('business')){

                return redirect()->route('business_feed');

            }elseif(Auth::check() && Auth::user()->hasRole('user')){

                return redirect()->route('home');

            }else{*/

                return $next($request);
           // }


    }
}
