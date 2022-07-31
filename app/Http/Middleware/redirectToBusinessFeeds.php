<?php

namespace App\Http\Middleware;

use App\Models\businessSignupSetting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class redirectToBusinessFeeds
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

/*
        $bussiness = businessSignupSetting::where('user_id',Auth::user()->id)->first();
        $role_type = Auth::user()->getRoleNames();
        if($role_type[0] == "business" && $bussiness->name != null && isset($bussiness->id) ){*/
            return redirect()->route('feeds');
        /*}else{
           return $next($request);
        }*/


    }
}
