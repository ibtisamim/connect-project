<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobOffer;
use App\Models\RequestProject;

class DashboardController extends Controller
{
    //index
    public function index(){
        
        return view('admin.pages.dashboard-ecommerce');
    }
    
    // view admin login
    public function admin(){
     return view('auth.login_admin');
   }
   
    public function joboffersList(){
        $items = JobOffer::paginate(10);
     return view('admin.pages.joboffers.index' , compact('items'));
   }
   
    public function requestprojectList(){
        $items = RequestProject::paginate(10);
     return view('admin.pages.requestProjects.index' , compact('items'));
   }   
   
}
