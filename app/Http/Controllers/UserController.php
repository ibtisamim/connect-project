<?php

namespace App\Http\Controllers;

use App\Models\CertificatesCv;
use App\Models\Collection;
use App\Models\Country;
use App\Models\EducationCv;
use App\Models\Milestone;
use App\Models\Profile;
use App\Models\User;
use App\Models\WorkExperience;
use App\Models\Project;
use App\Rules\MatchOldPassword;
use App\Models\City;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;


class UserController extends Controller{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(){ // user login

      $user = Auth::user();
      $user_data =  $user->profile;
      return view('user.dashboard',compact('user', 'user_data'));

    }


    public function dashboard(){ // user dashboard

      $user = Auth::user();
      $user_data =  $user->profile;
      $cities = City::where('country_id',$user_data->country_id)->get();
      if($user->Collections()->count() == 0){
          // create default collection
          Collection::create(['name' => 'Default' , 'description'=> 'Default Collection' , 'private'=>'0' , 'user_id' => $user->id]);
      }
      return view('user.dashboard',compact('user' , 'user_data' ,'cities'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function completeRegisterStep2(Request $request){

        if(Auth::user()->role == 'business'){

            $rules = [
                'area'              => 'required',
                'bio'               => 'required',
                'business_field_id' => 'required',
                'city_id'           => 'required',
                'companyname'       => 'required|regex:/^[a-zA-Z\\s]+$/u|min:5|max:255|unique:profiles,name,'.Auth::user()->id, 
                'country_id'        => 'required',
                'description'       => 'required',
                'street'            => 'required',
            ];

        }else{

            $rules = [
                'firstname'         => 'required',
                'bio'               => 'required',
                'lastname'          => 'required',
                'description'       => 'required',
            ];
        }


        if (($request->has('phone')) || ($request->has('country_key'))){
            $rules['country_key'] = 'required';
            $rules['phone'] = 'required';
        }


        $customMessages = [
            'area.required'             => 'The area field is required.',
            'bio.required'              => 'The bio field is required.',
            'business_field_id.required'=> 'The speciality field is required.',
            'city_id.required'          => 'The city field is required.',
            'companyname.regex'         => 'Your company name must be just letters',
            'companyname.required'      => 'The companyname field is required.',
            'country_id.required'       => 'The country field is required.',
            'description.required'  => 'The Position field is required.',
            'street.required'           => 'The street field is required.',
            'firstname.required'        => 'First tname is required.',
            'lastname.required'         => 'Last name is required.',
            'country_key.required'      => 'Country key is required.',
            'phone.required'         => 'Phone is required.',
        ];


        $validator = Validator::make($request->all(), $rules ,$customMessages );

        if ($validator->fails()) {
             // $dataObject['errors'] = $validator->errors();
            toast($validator->errors()->first(),'warning');   
            return redirect()->back()->withInput($request->input());
        }


        if(Auth::user()){

            $user_data =  array();
            $user_data['company'] = $request->companyname; // update company in user model
            $user_data['name'] = $request->firstname." ".$request->lastname; // update name in user model
            if($request->has('phone')){
                $user_data['phone'] = $request->country_key.$request->phone;
            }

            Auth::user()->update($user_data); // update user model

            // create user profile model
            $profile = new Profile;
            if($request->has('companyname'))
            $profile->company_name          = $request->companyname;

            if($request->has('area'))
            $profile->area          = $request->area;

            if($request->has('bio'))
            $profile->bio           = $request->bio;

            if($request->has('city_id'))
            $profile->city_id       = $request->city_id;

            if($request->has('country_id'))
            $profile->country_id      = $request->country_id;

            if($request->has('facebook'))
            $profile->facebook        = $request->facebook;

            if($request->has('instagrm'))
            $profile->instagrm        = $request->instagrm;

            if($request->has('linkedin'))
            $profile->linkedin      = $request->linkedin;

            if($request->has('description'))
            $profile->job_description = $request->description;

           //$profile->lat           = $request->lat;

           //$profile->lon           = $request->lon;

           //$profile->pinterest     = $request->pinterest;

            if($request->has('street'))
            $profile->street        = $request->street;

            if($request->has('tiktok'))
            $profile->tiktok        = $request->tiktok;

            if($request->has('twiter'))
            $profile->twiter        = $request->twiter;

            if($request->has('youtube'))
            $profile->youtube       = $request->youtube;
            $profile->user_id       = Auth::user()->id;
            $profile->save();

            if(Auth::user()->role == 'business'){
                // attach speciality
                if($request->hasFile('commercial_register') && $request->file('commercial_register')->isValid()){
                    Auth::user()->addMediaFromRequest('commercial_register')->toMediaCollection('commercialregister');
                } 
                Auth::user()->BusinessField()->attach($request->business_field_id);
            }

        }

        // save commercial register image if business profile
       return redirect()->route('index');

    }


    /**

     * Display the specified resource.

     *

     * @param  \App\Models\User  $user

     * @return \Illuminate\Http\Response

     */

    public function show(User $user){
        $user_data =  $user->profile;
        return view("user.show",compact('user' , 'user_data')); 
    }

    public function deleteImageProfile(User $user){
        $user->clearMediaCollection('thumbprofile');
        $user_data =  $user->profile;
        return view("user.dashboard",compact('user' , 'user_data')); 
    }


    /**



     * Show the form for editing the specified resource.

     *

     * @param  \App\Models\User  $user

     * @return \Illuminate\Http\Response

     * 
     */

    public function edit(User $user){
        $user_data =  $user->profile;
        return view("user.show",compact('user' , 'user_data'));
    }


    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Models\User  $user

     * @return \Illuminate\Http\Response

     */


    public function cvChangePassword(Request $request){

     $rules = [];
     $customMessages = [
        'confirm.same' => 'New password and confirm must be same',
        'new_password.min' => 'Password must be mnimum 6 characters'
    ];

    if($request->current_paseword != ''){   
        $rules['current_paseword'] = ['required', new MatchOldPassword];
        $rules['new_password'] = 'required|min:6';
        $rules['confirm'] = 'same:new_password';
    }

    $validator = Validator::make($request->all(), $rules ,$customMessages );

    if ($validator->fails()) {
        toast($validator->errors()->first(),'warning');   
        return redirect()->back();
    }

    if($request->current_paseword != ''){ 
        $user->update(['password'=> Hash::make($request->new_password) , 'name' => $main_data['name']]);
        toast('Your password updated successfully','success');
    }
}


public function update(Request $request, User $user){

        $rules = [
            'name' => 'required|regex:/^[a-zA-Z\\s]+$/u|min:5|max:255|unique:users,username,'.$user->id, 
           /* 'job' => 'required',
            'contry' => 'required',
            'city' => 'required', */
        ];


        $customMessages = [
            'name.required'     => 'The name field is required.',
            'name.regex' => 'Your full name must be just letters',
            'job.required'      => 'The job field is required.',
            'country_id.required'   => 'The country field is required.',
            'city.required'     => 'The city field is required.'
        ];

        $validator = Validator::make($request->all(), $rules ,$customMessages );
        if ($validator->fails()) {
             // $dataObject['errors'] = $validator->errors();
            toast($validator->errors()->first(),'warning');   
            return redirect()->back();
        }

        if($request->has('name'))
        $user->name = $request->name;
        if($request->has('website'))
        $user->website = $request->website;
        if($request->has('phone'))
        $user->phone = $request->key.$request->phone;
        // user profile update
        if($request->has('area'))
        $user->profile->area = $request->area;
        if($request->has('bio'))
        $user->profile->bio = $request->bio;
        if($request->has('city_id'))
        $user->profile->city_id  = $request->city_id ;
        if($request->has('country_id'))
        $user->profile->country_id = $request->country_id ;
        if($request->has('facebook'))
        $user->profile->facebook = $request->facebook;
        if($request->has('instagram'))
        $user->profile->instagrm = $request->instagram;
        if($request->has('job'))
        $user->profile->job_description = $request->job;
        if($request->has('linkedin'))
        $user->profile->linkedin = $request->linkedin;
        if($request->has('pinterest'))
        $user->profile->pinterest = $request->pinterest;
        if($request->has('street'))
        $user->profile->street = $request->street;
        if($request->has('tiktok'))
        $user->profile->tiktok = $request->tiktok;
        if($request->has('twiter'))
        $user->profile->twiter = $request->twiter;
        if($request->has('youtube'))
        $user->profile->youtube = $request->youtube;

        if(($user->isDirty()) || ($user->profile->isDirty())){
            //$user->update($main_data);
            $user->save();
            $user->profile()->save($user->profile);
            toast('Your profile updated successfully','success');
        }





        if($request->hasFile('image_user') && $request->file('image_user')->isValid()){

            $user->addMediaFromRequest('image_user')->toMediaCollection('thumbprofile');

        }



        return redirect()->back();



    }































    /**















     * Remove the specified resource from storage.















     *















     * @param  \App\Models\User  $user















     * @return \Illuminate\Http\Response















     */















    public function destroy(User $user)















    {















        //















    }































    public function user_profile(User $user){















        $user_data =  $user->profile;















        return view("user.show",compact('user' , 'user_data'));















    }































    public function educationStore(Request $request){















        $data = $request->all();















        if($request->has('ongoing')){















            $data['ongoing'] = 1;















        }else{















            $data['ongoing'] = 0;















        }















        EducationCv::create($data); 















        toast('You added new education successfully','success');















        return redirect()->back();















    }















    















    public function workExperienceStore(Request $request){















        $data = $request->all();















        if($request->has('ongoing')){















            $data['ongoing'] = 1;















        }else{















            $data['ongoing'] = 0;















        }















        WorkExperience::create($data);















        toast('You added new experience successfully','success');















        return redirect()->back();















    }















    















    public function certificateStore(Request $request){















        $certificate = CertificatesCv::create($request->all());















        toast('You added new Certificate successfully','success');















        if($request->hasFile('certificateimg2') && $request->file('certificateimg2')->isValid()){















            $certificate->addMediaFromRequest('certificateimg2')->toMediaCollection('images');




        } 

        return redirect()->back();

    }

    public function milestoneStore(Request $request){
        $milestone = Milestone::create($request->all());
        if($request->hasFile('certificateimg') && $request->file('certificateimg')->isValid()){
            $milestone->addMediaFromRequest('certificateimg')->toMediaCollection('certificateimg');

        }        

        toast('You added new milestone successfully','success');
        return redirect()->back();

    }


    public function educationUpdate($id , Request $request){

        $data = $request->all();
        if($request->has('ongoing')){
            $data['ongoing'] = 1;

        }else{
            $data['ongoing'] = 0;

        }


        EducationCv::where('id',$id)->update($data);     
        toast('Your education updated successfully','success');
        return redirect()->back();

    }


    public function workExperienceUpdate($id , Request $request){

        $data = $request->all();
        if($request->has('ongoing')){
            $data['ongoing'] = 1;
        }else{

            $data['ongoing'] = 0;
        }

        WorkExperience::where('id',$id)->update($data);
        toast('Your experience updated successfully','success');
        return redirect()->back();

    }


    public function certificateUpdate($id , Request $request){

        $certificates = CertificatesCv::where('id',$id)->update($request->all());
        if($request->hasFile('certificateimg2') && $request->file('certificateimg2')->isValid()){
          $certificates->clearMediaCollection('images');
          //$milestone->addMedia($request->photo)->toMediaCollection('user');

          $certificates->addMediaFromRequest('certificateimg2')->toMediaCollection('images');
        } 

        toast('Your certificate updated successfully','success');
        return redirect()->back();

    }


    public function milestoneUpdate($id , Request $request){

        $milestone = Milestone::where('id',$id)->update($request->all());
        if($request->hasFile('image_user') && $request->file('image_user')->isValid()){
            $milestone->addMediaFromRequest('certificateimg')->toMediaCollection('certificateimg');
        } 

        toast('Your milestone updated successfully','success');
        return redirect()->back();


    }

    public function educationDelete($id , Request $request){
        // soft delete
        EducationCv::find($id)->delete();
        toast('Your education deleted','success');
        return redirect()->back();
    }


    public function certificateDelete($id , Request $request){

        // soft delete
        CertificatesCv::find($id)->delete();
        toast('Your certificates deleted','success');
        return redirect()->back();

    }


    public function milestoneDelete($id , Request $request){

        // soft delete
        Milestone::find($id)->delete();
        toast('Your milestone deleted','success');
        return redirect()->back();

    }

    public function experienceDelete($id , Request $request){
        // soft delete
        WorkExperience::find($id)->delete();
        toast('Your work experience deleted','success');
        return redirect()->back();
    }


    public function settingNotificatiosUpdate(Request $request){
        $request->user()->SettingNotification()->update(['user_setting_notifications.status'=>'Disable']);
        foreach($request->notificatation_ids as $id){
            $request->user()->SettingNotification()->where('setting_notification_id',$id)->update(['user_setting_notifications.status'=> 'Enable']);
        }
     //  $request->user()->SettingNotification()->attach($request->notificatation_ids); 
        toast('Your setting updated successfully','success');
        return redirect()->back();
    }

    public function cvUpdate(Request $request){

        $rules ['phone'] = 'required|string|unique:users,phone,'.Auth::user()->id.'|min:10|max:10';
        $rules ['email'] = 'required|unique:users,email,'.Auth::user()->id.'|email';
        $customMessages = [
            'phone.required'    => 'The phone field is required and must be 10 numbers.',
            'phone.min'    => 'The phone field is required and must be 10 numbers.',
            'phone.max'    => 'The phone field is required and must be 10 numbers.',
            'email.required'    => 'The email field is required.',
            'email.unique'    => 'The email field is used by another account.',
            'phone.unique'    => 'The phone field is used by another user.'
        ];

        $validator = Validator::make($request->all(), $rules ,$customMessages );

        if ($validator->fails()) {
             // $dataObject['errors'] = $validator->errors();
            toast($validator->errors()->first(),'warning');   
            return redirect()->back();
        }       

        /*

        $data['email'] = $request->email;
        $data['website'] = $request->website;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;*/
        Auth::user()->update($request->all()); // update basic user info
        toast('Your CV general information updated successfully','success');
        return redirect()->back();


    }



    public function collectionStore(Request $request){

        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $data['user_id'] = auth::user()->id;

        if($request->has('private')){

            $data['private'] = 1;

        }else{

            $data['private'] = 0;

        }

        $collection = Collection::create($data);

        if($request->has('project_id')){
            // add project to collection
                Project::where('id', $request->project_id)->first()
                ->Collections()->attach([$collection->id => ['user_id'=> $data['user_id'],'followable_type'=>'App\Models\Project']]);    

                toast('Project added to new collection successfully','success');
                return redirect()->route('index');
        }
        toast('You added new collection successfully','success');
        return redirect()->back();
    }


    public function collectionUpdate(Request $request){


        $data['name'] = $request->name;
        $data['description'] = $request->description;
        if($request->has('private')){

            $data['private'] = 1;

        }else{

            $data['private'] = 0;

        }        

        Collection::where('id',$request->id)->update($data);     
        toast('Your collection updated successfully','success');
        return redirect()->back();



    }

    public function addProjecttoCollection(Request $request){
       Project::where('id', $request->project_id)->first()
                ->Collections()->attach([$request->collection_id => ['user_id'=> $request->user()->id ,'followable_type'=>'App\Models\Project']]); 
 
        toast('Project added to collection successfully','success');
        return redirect()->back();

    }

    public function deleteCollection($id , Request $request){

        // soft delete
        $id  = $request->id;
        Collection::find($id)->delete();
        toast('Your collection deleted','success');
        return redirect()->back();

    }


  // dropzone images upload & store and removed

    public function updatecover(Request $request){

        $image = $request->file('file');
        $fileInfo = $image->getClientOriginalName();
        $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
        $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
        $file_name= $filename.'-'.time().'.'.$extension;
        $file = $image->move(public_path('uploads/profile_cover/'.$request->user()->id),$file_name);
        $request->user()->clearMediaCollection('profile_cover');
         // $request->user()->addMedia($request->photo)->toMediaCollection('profile_cover');
        $imageUpload = $request->user()->addMedia($file)->toMediaCollection('profile_cover');
        return response()->json(['success'=>$imageUpload->id]);       

    }


  // RFQ apply

    public function applyrfq(Request $request){

        $image = $request->file('file');
        $fileInfo = $image->getClientOriginalName();
        $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
        $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
        $file_name= $filename.'-'.time().'.'.$extension;
        $file = $image->move(public_path('uploads/applyrfq/'.$request->user()->id),$file_name);
        $request->user()->clearMediaCollection('applyrfq');
         // $request->user()->addMedia($request->photo)->toMediaCollection('profile_cover');
        $imageUpload = $request->user()->addMedia($file)->toMediaCollection('applyrfq');
        return response()->json(['success'=>$imageUpload->id]);       


    }  




    public function applyrfqStore(Request $request){

        $request->user()-rfqApply()->attach($request->request_project->id);
        // send notification to request project owner
        toast('Your applyed to project','success');
        return redirect()->back();
    }



    public function Report(Request $request){

        if($request->item_type == 'user')
        $request->user()->Reported()->attach($request->report_reason_id, ['item_type' => 'user']);

        elseif($request->item_type == 'project')
        $request->user()->Reported()->attach($request->report_reason_id, ['item_type' => 'project' , 'project_id' => $request->projectid]);
        else
        $request->user()->Reported()->attach($request->report_reason_id, ['item_type' => 'business']);


        // send notification to admin
        toast('Your reported send to admin','success');
        return redirect()->back();

    }    

    public function hiddenProjectCard(Request $request){
        $project_id = $request->hiddenprojectid;
       // $hide_reason_id = $request->hide_reason_id;
        $hide_type = $request->hiddenitem_type;
        $user = User::find($request->hiddenuser_id);

        if($hide_type == 'project')
        $user->HiddenProjects()->attach($project_id , ['hidden_reason_id' => $request->hide_reasons_project ,'modelable_type' => 'App/Models/Project']);

 
        if($hide_type == 'bussinessprofile')
        $user->HiddenBusinessProfiles()->attach($project_id , ['hidden_reason_id' => $request->hide_reasons_bprofile ,'modelable_type' => 'App/Models/User']);

        if($hide_type == 'job')
        $user->HiddenProjects()->attach($project_id , ['hidden_reason_id' => $request->hide_reasons_job ,'modelable_type' => 'App/Models/Project']);

        if($hide_type == 'rfq')
        $user->HiddenProjects()->attach($project_id , ['hidden_reason_id' => $request->hide_reasons_rfq ,'modelable_type' => 'App/Models/Project']);

        toast('This card hidden successfully','success');
        return redirect()->back();

    }    











}















