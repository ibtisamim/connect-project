<?php



namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;

use App\Models\BusinessDbSetting;

use App\Models\Profile;

use App\Providers\RouteServiceProvider;

use App\Models\User;

use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

use App\Models\BusinessField;

use App\Models\Business;

use App\Models\Collection;



class RegisterController extends Controller

{

    /*

    |--------------------------------------------------------------------------

    | Register Controller

    |--------------------------------------------------------------------------

    |

    | This controller handles the registration of new users as well as their

    | validation and creation. By default this controller uses a trait to

    | provide this functionality without requiring any additional code.

    |

    */



    use RegistersUsers;



    /**

     * Where to redirect users after registration.

     *

     * @var string

     */





    protected $redirectTo = '/';



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('guest');

    }



    /**

     * Get a validator for an incoming registration request.

     *

     * @param  array  $data

     * @return \Illuminate\Contracts\Validation\Validator

     */

    protected function validator(array $data)

    {

        

        $rules = [

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            'password' => ['required', 'min:8'],

            'password_confirmation' => ['required','same:password']

        ];

        

        $customMessages = [

            'password.required'    => 'The password field is required and must be 10 numbers.',

            'password_confirmation.required'    => 'The password field is required and must be 10 numbers.',

            'password.min'    => 'The password field is required and must be not less 8 characters.',

            

            'password_confirmation.same' => 'password and confirm must be same',

            'email.required'    => 'The email field is required.',

            'email.unique'    => 'The email field is used by another account.',

        ];

        

        return Validator::make($data, $rules ,$customMessages);

       

    }



    /**

     * Create a new user instance after a valid registration.

     *

     * @param  array  $data

     * @return \App\Models\User

     */

    protected function create(array $data){

        $email = explode("@",$data['email']);
        $name = $email[0];
        if($data['role'] == "user"){
            $user =  User::create([
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => 'employee',
                'name' => $name,
                'username' => $name
            ]);

/*

          Profile::create([

            'user_id'=>$user->id,

          ]);*/

          $user->assignRole('user');
          if(isset($data['code'])){ // this guest register from invitation (employee or mmember)
              if($user->has('invitation')){

              }
          }


          /*

          $email_invitation = Invitation::where('email' ,$data['email'])->first();



          if($email_invitation){

            EmployeeAccept::create([

              'user_id' => $user->id,

              'employeer' => $email_invitation->user_id, // is id employeer 

            ]);

          }*/

       

          //  return view('completeRegister',compact('user')); 



        }elseif($data['role'] == "business"){

            $business =  User::create([
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => 'business',
                'name' => $name,
                'username' => $name

            ]);

            $business->assignRole('business');

            Business::create([
              'user_id'=> $business->id,
              'speciality' => 'Developmet & Design' ,
              'linked_in' => 'https://translate.google.jo/',
              'description' => 'Business Company for Developmet & Design',
              'name' => $name,
            //  'business_field_id' => $data['business_field_id']

            ]);

            $user = $business;
        }

        // create Collection
        Collection::create(['name'=>'Default' ,'description'=>'Default collection' ,'private'=>0 , 'user_id'=>$user->id]);
        toast('Register,successfull please complete your profile','success');
        return $user;
    }

}

