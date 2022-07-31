<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Business;
use Auth;
use App\Models\Project;
use App\Models\User;
use App\Models\JobOffer;


use Illuminate\Support\Facades\Hash;





class BusinessController extends Controller{



    



    //businessDbSettingController



    public function index(){



        if ((Auth::user())  && (Auth::user()->role == 'business')){



             $user = Auth::user();



             $business_data = $user->profile()->first();



             return view('business.dashboard',compact('business_data' ,'user'));



        }else{



            return redirect()->route('index');           



        }



    }



    



    public function update(Request $request){







      $data = $request->validate([



        'name'=>'nullable',



        'pio'=>'nullable',



        'contry'=>'nullable',



        'area'=>'nullable',



        'city'=>'nullable',



        'street'=>'nullable',



        'facebook'=>'nullable',



        'instagram'=>'nullable',



        'twitter'=>'nullable',



        'youtube'=>'nullable',



        'linked_in'=>'nullable',



        'scope_work'=> "nullable",



        'portfolio' =>'mimes:jpeg,png,jpg,doc,docx,pdf|max:2048'  ,



        'commercial_register'=>'mimes:jpeg,png,jpg,doc,docx,pdf|max:2048' ,



        'awards'=>'mimes:jpeg,png,jpg,doc,docx,pdf|max:2048' ,



      ]);







      $businessDbSetting = Auth::user()->Business()->first();//Business::where('user_id',$id)->first();







      if($request->hasFile('image')){



        $businessDbSetting->addMedia($request->image)->toMediaCollection('images');



      }







      if($request->hasFile('portfolio')) {



        $businessDbSetting->addMedia($data['portfolio'])->toMediaCollection('portfolio');



      }







      if($request->hasFile('commercial_register')){



        $businessDbSetting->addMedia($data['commercial_register'])->toMediaCollection('commercial_register');



      }







      if($request->hasFile('awards')){



        $businessDbSetting->addMedia($data['awards'])->toMediaCollection('awards');



      }







      $businessDbSetting->update([



        'name'=>$data['name'],



        'pio'=>$data['pio'],



        'country'=>$data['contry'],



        'area'=>$data['area'],



        'city'=>$data['city'],



        'street'=>$data['street'],



        'facebook'=>$data['facebook'],



        'instagram'=>$data['instagram'],



        'twitter'=>$data['twitter'],



        'youtube'=>$data['youtube'],



        'scope_work'=> $data['scope_work'],



        'linked_in' => $data['linked_in'],



      ]);


      $user =  Auth::user();

      if(Hash::check($request->current_password , $user->password)){

        if($request->new_password == $request->confirm){

          $user->update([

            'password'=>Hash::make($request->new_password),

          ]);
        }

      }


        return redirect()->route('business.dashboard');



    }



    //../ end BusinessController



    // businessSignupSetting



    /**



     * Update the specified resource in storage.



     *



     * @param  \Illuminate\Http\Request  $request



     * @param  int  $id



     * @return \Illuminate\Http\Response



     */



     



    public function businessSignup(Request $request, $id){

      $data = $request->validate([
        'name'=>'required',
        'description'=>'required',
        'speciality'=>'required',
        'commercial'=>'required',
        'country'=>'required',
        'city'=>'required',
        'area'=>'required',
        'street'=>'required',
        'lat'=>'required',
        'long'=>'required',
      ]);



      $business_setting = Business::where('user_id',$id)->update([

            'name'=>$data['name'],
            'description'=>$data['description'],
            'speciality'=>$data['speciality'],
            'country_id'=>$data['country'],
            'city'=>$data['city'],
            'area'=>$data['area'],
            'street'=>$data['street'],
            'lat'=>$data['lat'],
            'long'=>$data['long'],
            'user_id'=>$id,

      ]);


      if($request->hasFile('commercial')){
        $business_setting->addMedia($request->commercial)->toMediaCollection('images');
      }


      return redirect()->route('business_feed');

    }



    



    public function businessProfile(){

        if ((Auth::user()) && (Auth::user()->role == 'business')){
        $user = Auth::user();
        $user_data =  $user->profile;

        return view("business.show",compact('user' , 'user_data')); 
        
/*
        $business_data =  Business::with('media')->where('user_id',Auth::user()->id)->first();
        $business_setting =  Business::where('user_id',Auth::user()->id)->first();


        $projects = Project::with(['user'=>function($q){
            $q->with(['Business'=>function($g){
              $g->with('media');
            }]);
          }])->get()->random(3);


        $all_categories = Category::where('lang','en')->get();
        return view("business.profile",compact('business_data','business_setting','projects','all_categories'));*/
        }else{
            return redirect()->route('index');  
        }

    }



    public function businessProfilePublic($id){

        $user = User::find($id);
        $user_data =  $user->profile;

        return view("business.show",compact('user' , 'user_data')); 

       // return view("business.show",compact('business_data','business_setting','projects','all_categories'));

    }


    public function addJobOffer(Request $request){

        $data = $request->all();

        if($request->has('posttofeed'))
            $data['posttofeed'] = 1;
        else
        $data['posttofeed'] = 0;

        $data['user_id'] = Auth::user()->id;


        JobOffer::create($data);
        toast('Job Offer Added successfully','success');
        return redirect()->back();

    }



    

    public function addJobfiles(Request $request){



    }


    public function applyJobOfferMedia(Request $request){
        //meida
        $images = $request->file('file');
        foreach ($images as $photo) {
            $imageUpload = Auth::user()->addMedia($photo)
            ->withCustomProperties(['job_id' => $request->job_apply_id])
            ->toMediaCollection('job_apply_media');
        }
        toast('Your application media added successfully','success');
      //  return response()->json(['success'=> 'done']); 
        return redirect()->back();
    }

    // apply user to job here
    public function applyJobOffer(Request $request){ 
        $job_id = $request->job_id;
        Auth::user()->JobApply()->attach(array($job_id =>['status'=>'pending']));  
      //  $job_apply_id = Auth::user()->JobApply()->where('status','pending')
      //  ->where('job_applies.job_offer_id',$job_id)->first(); 
        return $job_id;//$job_apply_id->pivot->id;

    }

    // un-apply user to job here
    public function unApplyJobOffer($id,Request $request){ 
        $job = JobOffer::find($id);
        Auth::user()->JobApply()->detach ($job);  
        toast('You un-apply for Job Offer successfully','success');
        return redirect()->back();

    }



    



    // un-apply user to job here



    public function jobDetails($id,Request $request){ 

        $job = JobOffer::find($id);
        return view('jobDetails',compact('job'));
    }    



    



    



    public function businessFollow($business_id , Request $request){



      Auth::user()->following()->attach(array($business_id =>[ 'followable_type'=>'App\Models\Business']));



 



       return redirect()->back();



    }



    



    public function businessUnFollow($business_id , Request $request){



      $Business = Business::find($business_id);



      Auth::user()->following()->detach($Business);   



       return redirect()->back();



    } 



    



}



