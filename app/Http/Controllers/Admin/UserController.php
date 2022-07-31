<?php



namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;

use App\Models\User;

use Illuminate\Http\Request;

use App\Http\Requests\StoreUserRequest;

use Hash;

class UserController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $users = User::Role('user')->paginate(20);

        return view('admin.pages.users.index',compact('users'));

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('admin.pages.users.create');

    }



    /**

     * Store a newly created resource in storage.

     *

    * @param  \App\Http\Requests\StoreUserRequest  $request

     * @return \Illuminate\Http\Response

     */

    public function store(StoreUserRequest $request)

    {

        $data = $request->all();

        $data['password'] = Hash::make($request->password);

        $data['status'] = $request->status;

        $user = User::create($data);

        $user->assignRole('user');

        return redirect()->route('users.index');

    }



    /**

     * Display the specified resource.

     *

     * @param  \App\Models\User  $user

     * @return \Illuminate\Http\Response

     */

    public function show(User $user)

    {



    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Models\User  $user

     * @return \Illuminate\Http\Response

     */

    public function edit(User $user){

        return view('admin.pages.users.edit',compact('user'));

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Models\User  $user

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, User $user)

    {

        $data = $request->all();

        if($data['password'] == ''){

            $data['password'] = $user->password;

        }else{

            $data['password'] = Hash::make($data['password']);

        }

        $user->update($data);

        return redirect()->route('users.index');

    }

    

    public function updateProfile(Request $request,$user_id)

    {







     $user_db = UserDbSetting::where('user_id',$user_id)->first();



     $data = $request->validate([

       'name' => 'nullable',

       'job'  => 'nullable',

       'bio'  =>'nullable',

       'contry' => 'nullable',

       'area'=>'nullable',

       'city'=>'nullable',

       'street' =>'nullable',

       'facebook' =>'nullable',

       'instagram' =>'nullable',

       'twiter'=>'nullable',

       'youtube'=>'nullable',

       'linkedin'=>'nullable',

       'tiktok'=>'nullable',

       'image'=>'nullable',



     ]);







      UserDbSetting::where('user_id',$user_id)->update([

        'name' => $data['name'],

        'job_description'   =>$data['job'],

        'bio'               => $data['bio'],

        'contry'            => $data['contry'],

        'area'              =>$data['area'],

        'city'              =>$data['city'],

        'street'            =>$data['street'],

        'facebook'          =>$data['facebook'],

        'instagrm'          =>$data['instagram'],

        'twiter'            =>$data['twiter'],

        'youtube'           =>$data['youtube'],

        'linkedin'          =>$data['linkedin'],

        'tiktok'            =>$data['tiktok'],

      ]);





      if($request->image_user){



        $user_db->addMedia($request->image_user)->toMediaCollection('images');

      }



      $user =  User::where('id',$user_id)->first();

      if(Hash::check($request->current_paseword , $user->password)){

        if($request->new_password == $request->confirm){

          $user->update([

            'password'=>Hash::make($request->new_password),

          ]);

        }

      }









      return redirect()->route('user_setting.index');

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Models\User  $user

     * @return \Illuminate\Http\Response

     */

    public function destroy(User $user)

    {

        $user->delete();

    }

}

