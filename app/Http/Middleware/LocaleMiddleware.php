<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Setting;
use App\Models\Country;
use App\Models\BusinessField;
use App\Models\ReportReason;
use App\Models\HiddenReason;
use Auth;
use App\Models\Page;




class LocaleMiddleware{


  /**

   * Handle an incoming request.

   *

   * @param  \Illuminate\Http\Request  $request

   * @param  \Closure  $next

   * @return mixed



   */


  public function handle(Request $request, Closure $next){


    // available language in template array
      $availLocale = ['en' => 'en', 'ar' => 'ar'];
      $users = User::whereHas('profile')->get();
      $categories = Category::latest()->get();
      $settings = Setting::all();
      $countries = Country::where('status','Enable')->get();
      $business_fields = BusinessField::where('status','Enable')->get();
      $report_reasons = ReportReason::where('status','Enable')->get();
      $hide_reasons_project = HiddenReason::where('status','Enable')->where('type','project')->get();
      $hide_reasons_bprofile = HiddenReason::where('status','Enable')->where('type','bussinessprofile')->get();
      $hide_reasons_user = HiddenReason::where('status','Enable')->where('type','user')->get();
      $hide_reasons_rfq = HiddenReason::where('status','Enable')->where('type','rfq')->get();
      $hide_reasons_job = HiddenReason::where('status','Enable')->where('type','job')->get();
      
      $class = 'col-md-4';
      $pages = Page::all();
      $terms = Page::find(18);
      $privacy = Page::find(12);
      // Set the Laravel locale
      \View::share('terms_pobup', $terms);
      \View::share('privacy_pobup', $privacy);
      \View::share('users', $users);
      \View::share('categories', $categories );
      \View::share('settings', $settings );
      \View::share('countries', $countries );
      \View::share('class', $class );
      \View::share('card_col', 'col-lg-3' );
      \View::share('start', '0' );
      \View::share('businessfields', $business_fields);
      \View::share('report_reasons', $report_reasons);
      \View::share('hide_reasons_project', $hide_reasons_project);
      \View::share('hide_reasons_bprofile', $hide_reasons_bprofile);
      \View::share('hide_reasons_user', $hide_reasons_user);
      \View::share('hide_reasons_rfq', $hide_reasons_rfq);
      \View::share('hide_reasons_job', $hide_reasons_job);
      \View::share('pages', $pages);
      return $next($request);

  }







}







