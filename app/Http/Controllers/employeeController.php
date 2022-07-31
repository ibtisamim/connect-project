<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Mail;
use Auth;
use App\Models\Invitation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class employeeController extends Controller
{
    public function index(){

        $users = User::role('user')->get();
        return view('business.employee',compact('users'));
        
    }

    public function invit(Request $request){
      
        $email = $request->post('email');
        $role = $request->post('role');
/*
        $data = $request->validate([
            'email' => 'required|email|unique:invitations',
            'role' => 'required'
        ]);*/
        
        
$rules = [
    'email' => 'required|email|unique:invitations',
    'role' => 'required'
    ];
    
$messages = [
    ];

$validator = Validator::make($request->all(), $rules, $messages, [
]);


        /*$validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:employees,email', //|unique:invitations
            'role' => 'required'
        ]);*/
        
        

        if ($validator->fails()) {
            toast(Arr::last(Arr::flatten($validator->messages()->get('*'))),'error');
            return back()->withErrors($validator)->withInput();
        }
        
        // search about email in our users list
        $email_in_user_list = User::where('email',$email)->first();
     
        if($email_in_user_list){ 
            Employee::create([
                "user_id" => $email_in_user_list->id,
                "email" => $email,
                "role" => $role,
                "business_id" => Auth::user()->id,
                "status" => "pending" ,
                "slug" => str_slug($email_in_user_list->name , "-")
            ]);  
            
            $employee = $email_in_user_list->email;
            
        }else{
            Invitation::create([
                "user_id" => Auth::user()->id,
                "email" => $data['email'],
                "role" => $data['role'],
            ]);            
        }

        // send email to both
        $business = Auth::user();
        Mail::send('emails.send', ['employee' => $email], function ($message) use ($email,$business)
        {
            $message->from($business->email, 'Employeer');
            $message->to($email);
        });

        toast('Send Invite Successfully','success');
    
        return  redirect()->route('employees');

    }
}
