<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\App;

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
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }
    
    /**
     * Create a Username Customization.
     *
     * @return void
     */
    public function username()
    {
        return 'username';
    }


  /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        
        App::setLocale('en');
        // validation
        $rules = [
            'name' => 'required',
            'password' => 'required'
        ];
        
        $customMessages = [
            'name.required'     => 'The user name field is required.',
            'password.required' => 'The password field is required.',
        ];
        
        $validator = Validator::make($request->all(), $rules ,$customMessages );
        if ($validator->fails()) {
            toast($validator->errors()->first(),'warning');   
            return redirect()->back();
        }
        
        $credentials = $request->only('name', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
          $admin = Auth::guard('admin')->user();
         
            // Authentication passed...
          return redirect()->route('dashboard',compact('admin'));
         //   return redirect()->intended('dashboard');
        }
        
        toast('invalid username or password.','error'); 
        return redirect()->route('view_login'); 
        
    }
    
    
    public function login(Request $request)
    {   
        $input = $request->all();
  
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
  
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password'])))
        {
            return redirect()->route('home');
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
          
    }

}
