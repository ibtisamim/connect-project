@extends('layouts.main')
@section('title', 'User Dashboard')
@section('content')
{{--@if(Route::is('users.index')) class="active" @endif--}}
<div class="row dashbord">
{{-- sidebar menu --}}
<div class="col-lg-2 d-none d-lg-block d-xl-block dashbord-links">
<ul class="sidebar_user">
<li><a href="#projects" data-section="projects">Projects</a></li>
<!--<li><a href="#calender" id="calender">My Calender</a></li> -->
<li><a href="#setting" data-section="setting" class="active">Settings</a></li>
<li><a href="#usercv" data-section="usercv">My CV</a></li>
<li><a href="#collections" data-section="collections">Collections</a></li>
<li><a href="#jobapply" data-section="jobapply">Jobs Apply</a></li>
<li><a href="#requestedproject" data-section="requestedproject">Requested Project</a></li>
<li><a href="#questions" data-section="questions">Questions</a></li>
<li><a href="#notificationssection" data-section="notificationssection">Notifications</a></li>
<li><a href="#chnagepassword" data-section="chnagepassword">Change Password</a></li>
</ul>
</div>
{{-- sidebar menu end --}}
<div class="col-lg-10 col-sx-12">
<div id="projects" class="sections">
<div class="project_part">
<div class="col-md-12">
<ol class="breadcrumb">
  <li><a href="/">Connect Home</a></li><i class="fa fa-angle-right" aria-hidden="true"></i>
  <li><a href="/dashboard">Settings</a></li><i class="fa fa-angle-right" aria-hidden="true"></i>
  <li><a href="/dashboard#projects">Projects</a></li>
</ol>
</div>
  <div class="header userdb">
    <div class="col-md-12">
    <h1>Projects</h1>
  </div>
  </div>
{{-- user projects list --}}
@if($user->projectsWorkedOn()->count() > 0)
<div class="row   d-lg-flex d-xl-flex" >
<div class="project" >
 <h2>Project has worked on </h2>    
<div class="owl-carousel front-end-page owl-theme">
@foreach($user->projectsWorkedOn()->get() as $project)  
    @include('card')
@endforeach            
</div>
</div>
</div>
{{-- end projects list --}}
@else
<div class="user_project_added">
<h3>No projects have been added</h3>
</div>
@endif
</div>
</div>{{-- end section projects list of user --}}


<div id="setting" class="sections">
<div class="general_setting">
<div class="col-md-12">
<ol class="breadcrumb">
  <li><a href="/">Connect Home</a></li><i class="fa fa-angle-right" aria-hidden="true"></i>
  <li><a href="/dashboard">Settings</a></li><i class="fa fa-angle-right" aria-hidden="true"></i>
  <li><a href="/dashboard#setting">General Settings</a></li>
</ol>
</div>
  <div class="header userdb">
    <div class="col-md-12">
   <h1>General Settings</h1>
  </div>
  </div>

            
            <form action="{{route('users.update',Auth::user())}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="user_img">
                 @if($user->photo)
                    @php $bg = $user->photo; @endphp
                 @else
                    @php $bg = "asset('img/user_image.png')"; @endphp
                  @endif

                <div class="user_profile_general">
                <div class="hexagon" style=" background-image: url('{{$bg}}'); ">
                  <div class="hexTop"></div>
                  <div class="hexBottom"></div>
                </div>
                </div>
                <input type="file" name="image_user" id="upload" hidden/>
                <label for="upload" class="btn btn-primary ">Upload a picture</label>
                <a href="{{route('deleteImageProfile',Auth::user())}}" class="btn btn_delete">Delete</a>
            </div>

            <div class="details_user">
                  <div class="row form-group">
                    <div class="col-md-12 col-sx-12 custom_flex-dashboard">
                      <label for="name" class="col-form-label">Name</label>
                      <input type="text" name="name" value="{{$user->name}}" id="name" class="form-control" placeholder="Full Name">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-12  col-sx-12 custom_flex-dashboard">   
                      <label for="job" class="col-form-label">Job / Designation</label>
                      <input type="text" name="job" value="{{isset($user_data->job_description) ? $user_data->job_description : ''}}" id="job" class="form-control" Placeholder="What is your job?">

                    </div>
                  </div>

                <div class="row form-group">
                  <div class="col-md-12  col-sx-12 custom_flex-dashboard">
                    <label for="website" class="col-form-label">Website</label>
                    <input type="text" name="website" value="{{isset($user->website) ? $user->website : ''}}" id="website" class="form-control">
                  </div>

                </div>







                <div class="row form-group">



                  <div class="col-md-12  col-sx-12">



                  <label for="bio" class="col-form-label">Bio</label>



                  </div>



                  <div class="col-md-12  col-sx-12">



                  <textarea type="text" name="bio"  id="bio" Placeholder="Bio" rows="5" class="form-control">{{isset($user_data->bio) ? $user_data->bio : ''}}</textarea>



                  </div>



                </div>







                



                <dvi class="row form-group"> {{-- start location --}}



                  <h1>Location</h1>



                  <div class="form-group">



                    <div class="row col-md-6 col-sx-12">



                        <div class="col-md-3  col-sx-12">



                      <label for="contry" class="col-form-label">Country</label>



                      </div>



                      <div class="col-md-9 col-sx-12">



    {{--                  <input type="text" name="contry" value="{{isset($user_data->contry) ? $user_data->contry : ''}}" id="contry" class="form-control" Placeholder="Country">

--}}

                       <select name="country_id"  class="form-control select_country" id="contry_id">



                        @foreach($countries as $country)



                        <option value="{{$country->id}}" @if($country->id == $user_data->country_id) selected @endif>



                            {{$country->country}}</option>



                        @endforeach



                    </select>





                      </div>



                    </div>







                    <div class="row col-md-6 col-sx-12">



                        <div class="col-md-3  col-sx-12">



                      <label for="area" class="col-form-label">Area</label>



                      </div>



                      <div class="col-md-9 col-sx-12">



                      <input type="text" name="area"  value="{{isset($user_data->area) ? $user_data->area : ''}}" id="area" class="form-control" placeholder="Area">







                      </div>



                    </div>



                  </div>{{-- end row --}}







                  <div class="form-group">

                    <div class="row col-md-6 col-sx-12">

                      <div class="col-md-3  col-sx-12">

                       <label for="city" class="col-form-label">City</label>

                      </div>



                      <div class="col-md-9 col-sx-12">

                        {{--

                      <input type="text" name="city" value="{{isset($user_data->city) ? $user_data->city : ''}}" id="city" class="form-control" placeholder="City"> --}}

                          <select class="city_select2 form-control"   name="city_id" >

                            @foreach($cities as $city)

                            <option value="{{$city->id}}" @if($city->id == $user_data->city_id) selected @endif>

                            {{$city->name}}</option>

                            @endforeach

                          </select>



                      </div>



                    </div>







                    <div class="row col-md-6 col-sx-12">



                        <div class="col-md-3  col-sx-12">



                      <label for="street" class="col-form-label">Street</label>



                       </div>



                      <div class="col-md-9 col-sx-12">



                      <input type="text" name="street" value="{{isset($user_data->street) ? $user_data->street : ''}}" id="street" class="form-control">



                      </div>



                    </div>



                  </div>



                </dvi>{{-- end location --}}















<div class="contact_info">



<h1>Contact Info</h1>



<div class="form-group">



  <div class="row col-md-6 col-sx-12">



      <div class="col-md-3  col-sx-12">



        <label for="email" class="col-form-label">Email</label>



      </div>



    <div class="col-md-9 col-sx-12">



    <input type="text" name="email" value="{{isset($user->email) ? $user->email :''}}" id="email" class="form-control" readonly>



    </div>



  </div>







  <div class="row col-md-6 col-sx-12">



      <div class="col-md-3  col-sx-12">



        <label for="street" class="col-form-label">Phone</label>



      </div>







    <div class="col-md-9 col-sx-12">



      <div class="row">



      <div class="col-md-5  col-sx-4">



                    <select name="key"  class="form-control " id="e1">



                        @foreach($countries as $country)



                        <option value="{{$country->code}}" data-name="{{$country->country}}">



                            {{$country->country}}</option>



                        @endforeach



                    </select>



      </div>



      <div class="col-md-7  col-sx-8">



            <input type="text" name="phone" value="{{isset($user->phone) ? $user->phone : ''}}" id="phone" class="form-control">



      </div>



      </div>



    </div>



  </div>



</div>



</div>







<dvi class="sociallink-profile">



  <h1>Social Links</h1>



  <div class="form-group">



    <div class="row col-md-6 col-sx-12">



    <div class="col-md-3  col-sx-12">



      <label for="facebook" class="col-form-label">Facebook</label>



       </div>



      <div class="col-md-9 col-sx-12">



      <input type="text" name="facebook" value="{{isset($user_data->facebook) ? $user_data->facebook : ''}}" id="facebook" class="form-control" placeholder="Facebook">



      </div>



    </div>



    <div class="row col-md-6 col-sx-12">



         <div class="col-md-3  col-sx-12">



      <label for="instagram" class="col-form-label">Instagram</label>



       </div>



      <div class="col-md-9 col-sx-12">



      <input type="text" name="instagram" value="{{isset($user_data->instagrm) ? $user_data->instagrm : ''}}" id="instagram" class="form-control">



      </div>



    </div>



  </div>







  <div class="form-group">



    <div class="row col-md-6 col-sx-12">



        <div class="col-md-3  col-sx-12">



      <label for="twiter" class="col-form-label">Twitter</label>



      </div>



      <div class="col-md-9 col-sx-12">



      <input type="text" name="twiter" value="{{isset($user_data->twiter) ? $user_data->twiter : ''}}" id=" twiter" class="form-control" placeholder="Twitter">



      </div>



    </div>







    







    <div class="row col-md-6 col-sx-12">



        <div class="col-md-3  col-sx-12">



      <label for="youtube" class="col-form-label">Youtube</label>



      </div>



      <div class="col-md-9 col-sx-12">



      <input type="text" name="youtube" value="{{isset($user_data->youtube) ? $user_data->youtube : ''}}" id="youtube" class="form-control" placeholder="Youtube">



      </div>



    </div>



  </div>











<div class="form-group">



  <div class="row col-md-6 col-sx-12">



  <div class="col-md-3  col-sx-12">



    <label for="linkedin" class="col-form-label">LinkedIn</label>



    </div>



    <div class="col-md-9 col-sx-12">



    <input type="text" name="linkedin" value="{{isset($user_data->linkedin) ? $user_data->linkedin : ''}}" id="linkedin" class="form-control" placeholder="LinkedIn">



  </div>



  </div>







  







  <div class="row col-md-6 col-sx-12">



  <div class="col-md-3  col-sx-12">



    <label for="tiktok" class="col-form-label">Tiktok</label>



    </div>



    <div class="col-md-9 col-sx-12">



    <input type="text" name="tiktok" value="{{isset($user_data->tiktok) ? $user_data->tiktok : ''}}" id="tiktok" class="form-control" placeholder="Tiktok">



    </div>



  </div>



</div>







                



<div class="form-group">



  <div class="row col-md-6 col-sx-12">



      <div class="col-md-3  col-sx-12">



    <label for="pinterest" class="col-form-label">Pinterest</label>



    </div>



    <div class="col-md-9 col-sx-12">



    <input type="text" name="pinterest" value="{{isset($user_data->pinterest) ? $user_data->pinterest : ''}}" id="pinterest" class="form-control" placeholder="Pinterest">



    </div>



  </div>







</div>







</dvi>







<div class="row form-group">



                  <div class="setting_page_btn">



                    <button class="btn btn-primary" type="submit">Apply Changes</button>



                    <input type="reset" class="btn cancel_btn" value="cancel">



                  </div>



</div>







</div>



</form>



</div>    







</div>{{-- end section setting of user profile --}}




<div id="usercv" class="sections">

        <div class="user_db_cv">
<div class="col-md-12">
<ol class="breadcrumb">
  <li><a href="/">Connect Home</a></li><i class="fa fa-angle-right" aria-hidden="true"></i>
  <li><a href="/dashboard">Settings</a></li><i class="fa fa-angle-right" aria-hidden="true"></i>
  <li><a href="/dashboard#usercv">My CV</a></li>
</ol>
</div>

  <div class="header userdb">
    <div class="col-md-12">
    <h1>My CV</h1>
  </div>
  </div>

          <form action="{{route('users.cv.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @php $index = 0 ; @endphp 
            <div class="education">

              <div class="header">
                <h1>Education</h1>



                <a href="#" type="button" class="infoU" data-bs-toggle="modal" data-bs-target="#education_add_new" >+Add New</a>



              </div>



              <div class="accordion" id="accordionEducation">



              @foreach($user->educations as $education)



                <div class="accordion-item">



                  <h2 class="accordion-header" id="headingOne">



                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$index}}" aria-expanded="true" aria-controls="collapseOne">



                      {{ $education->education_feild }} - {{$education->education_degree}}



                    <a href="#" class="infoUdots manage_btn_menu"><i class="fas fa-ellipsis-h"></i></a>



                    <ul class="manage_menu"> 



                        <li class="title_menu"><a href="#" type="button" class="infoUinner" data-bs-toggle="modal" data-bs-target="#education_add_new" data-object="{{$education}}" data-route='/educationUpdate' >Edit</a></li>



                        <li><a href="/educationDelete/{{$education->id}}" type="button" class="item_delete">Delete</a></li>



                      </ul>



                    </button>



                  </h2>











                    <div id="collapse-{{$index}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionEducation">



                      <div class="accordion-body">



                          <p> <strong>Grade: </strong>{{$education->grade}}</p>



                          <p><strong>School: </strong>{{$education->school}}</p>



                          <p><strong>From: </strong>{{$education->starting_date}} <strong>To: </strong>{{$education->ending_date}}</p>



                          <p>{{ $education->description }}</p>



                      </div>



                    </div>







                  </div>







               @php $index ++ ; @endphp







               @endforeach







              </div>



            </div>







            <div class="work_experience">



              <div class="header">



                <h1>Work Experience</h1>



                <div class="add_work_experience">



                  <a href="#" type="button" class="infoU" data-bs-toggle="modal" data-bs-target="#experiance_add_new" >+Add New</a>



                </div>



              </div>



              <div class="accordion" id="accordionwork_experience">







              @foreach($user->workExperiences as $work_experience)







                <div class="accordion-item">



                  <h2 class="accordion-header" id="headingOne">



                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$index}}" aria-expanded="true" aria-controls="collapseOne">



                      {{ $work_experience->title }} 







                    <a href="#" class="infoUdots manage_btn_menu"><i class="fas fa-ellipsis-h"></i></a>



                    <ul class="manage_menu"> 



                        <li class="title_menu"><a href="#" type="button" class="infoUinner" data-bs-toggle="modal" data-bs-target="#experiance_add_new" data-object="{{$work_experience}}" data-route='/workExperienceUpdate' >Edit</a></li>



                        <li><a href="/experienceDelete/{{$work_experience->id}}" type="button" class="item_delete">Delete</a></li>



                      </ul>



                    </button>



                  </h2>







                    <div id="collapse-{{$index}}" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionwork_experience">



                      <div class="accordion-body">



                        {{ $work_experience->description }}



                      </div>



                    </div>







                  </div>







               @php $index ++ ; @endphp







               @endforeach



              </div>



            </div>











<div class="Certificates">



  <div class="header">



    <h1>Certificates</h1>



    <a href="#" type="button" class="infoU" data-bs-toggle="modal" data-bs-target="#certificate_add_new" >+Add New</a>



  </div>







  <div class="accordion" id="accordionCertificate">



  @foreach($user->certificates as $certificate)



    <div class="accordion-item">



      <h2 class="accordion-header" id="headingOne">



        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$index}}" aria-expanded="true" aria-controls="collapseOne">

          {{ $certificate->title }} - {{$certificate->certificate_date}}

        <a href="#" class="infoUdots manage_btn_menu"><i class="fas fa-ellipsis-h"></i></a>

        <ul class="manage_menu"> 



            <li class="title_menu"><a href="#" type="button" class="infoUinner" data-bs-toggle="modal" data-bs-target="#certificate_add_new" data-object="{{$certificate}}" data-route='/certificateUpdate' >Edit</a></li>



            <li><a href="/certificateDelete/{{$certificate->id}}" type="button" class="item_delete">Delete</a></li>



          </ul>



        </button>



      </h2>





    <div id="collapse-{{$index}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionCertificate">

      <div class="accordion-body">

        {{ $certificate->description }}

      </div>

    </div>

  </div>

  @php $index ++ ; @endphp

  @endforeach

</div>



</div>    



<div class="Certificates">

<div class="header">

  <h1>Milestone</h1>

  <a href="#" type="button" class="infoU" data-bs-toggle="modal" data-bs-target="#milestone_add_new" >+Add New</a>



</div>





<div class="accordion" id="accordionmilestone">

@foreach($user->milestones as $milestone)

  <div class="accordion-item">

    <h2 class="accordion-header" id="headingOne">

      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$index}}" aria-expanded="true" aria-controls="collapseOne">



        {{ $milestone->title }} 

      <a href="#" class="infoUdots manage_btn_menu"><i class="fas fa-ellipsis-h"></i></a>

      <ul class="manage_menu"> 

          <li class="title_menu"><a href="#" type="button" class="infoUinner" data-bs-toggle="modal" data-bs-target="#milestone_add_new" data-object="{{$milestone}}" data-route='/milestoneUpdate' >Edit</a></li>



          <li><a href="/milestoneDelete/{{$milestone->id}}" type="button" class="item_delete">Delete</a></li>

        </ul>

      </button>

    </h2>



      <div id="collapse-{{$index}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionmilestone">



        <div class="accordion-body">



          {{ $milestone->description }}



        </div>



      </div>



    </div>



 @php $index ++ ; @endphp



 @endforeach



</div>



</div>





<div class="row form-group">

  <div class="setting_page_btn">

    <button class="btn btn-primary" type="submit">Apply Changes</button>

    <button class="btn cancel_btn">cancel</button>

  </div>

</div>



</form>







</div>    



</div>{{-- end section user cv --}}



{{-- user jobs apply section -- jobapply --}}

<div id="jobapply" class="sections">

<div class="user_db_cv">

<div class="col-md-12">
<ol class="breadcrumb">
  <li><a href="/">Connect Home</a></li><i class="fa fa-angle-right" aria-hidden="true"></i>
  <li><a href="/dashboard">Settings</a></li><i class="fa fa-angle-right" aria-hidden="true"></i>
  <li><a href="/dashboard#jobapply">Jobs Apply</a></li>
</ol>
</div>
  <div class="header userdb">
    <div class="col-md-12">
    <h1>Jobs Apply</h1>
  </div>
  </div>

<div class="contact_info">

<div class="header">

<h1>My Applications </h1>

</div>

<div class="style_box">

 @php $index = 0 ; @endphp

              <div class="accordion" id="accordionJobApply">

               @foreach(Auth::user()->JobApply()->get() as $job)

                <div class="accordion-item">

                  <h2 class="accordion-header" id="headingOne">

 <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$index}}" aria-expanded="true" aria-controls="collapseOne">

                      {{$job->title}} 

                    </button></h2>

                    <div id="collapse-{{$index}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionJobApply">

                      <div class="accordion-body">

                          <p><span style="color:#00000080; font-size:14px">

                        {{$job->created_at}} ({{$job->pivot->status}})</span></p>

              

                         <div class="row">

                           <div class="col-md-2" style="color:#00000099">Applied for</div>

                           <div class="col-md-10">

                              <div class="jobdetails info_user">

                              <a href="/user/{{$job->user->id}}">



                            @if($job->user->photo)

                             @php $bg = $job->user->photo; @endphp

                             @else

                                @php $bg = "asset('img/user_image.png')"; @endphp

                              @endif

                              <div class="row">

                                <div class="col-md-3">

                            <div class="hexagon" style=" background-image: url('{{$bg}}'); ">

                              <div class="hexTop"></div>

                              <div class="hexBottom"></div>

                            </div>

                          </div>

                          <div class="col-md-9">

                              <div style="font-size:22px; flex-direction: column; justify-content: space-around; display: flex; color:#000000D9;     width: 300px;">

                              {{$job->user->name}}

                            <span style="color: #00000099; font-size: 16px;">38 Followers</span>

                            <span style="color: #00000099; font-size: 16px;">38 Projects</span>

                            </div>

                            </div>

                          </div>
                           </a>
                          </div>
                           </div>
                         </div>



                         <div class="row">

                           <div class="col-md-2" style="color:#00000099">Job Description</div>

                           <div class="col-md-10">{!! $job->description !!}</div>

                         </div>

                          <div class="row">

                           {{-- gallery --}}

                            @if($job->photo)

                                  <div class="col-lg-12 projectname_frontend_page">

                                    <div id="gallery_area_post">

                                    <h1>Gallery of uploaded media</h1>

                                    <div class="products_project">

                                      <div class="owl-carousel front-end-page owl-theme">

                                        @foreach($job->photo as $gallery)

                                        <div>

                                            <img src="{{$gallery}}"  style="max-height:300px">

                                        </div>

                                        @endforeach

                                      </div>

                                    </div>

                                   </div>

                                  </div>

                            @endif

                          </div>

                      </div>

                    </div>

                  </div>

               @php $index ++ ; @endphp

               @endforeach

              </div>

</div>
</div>
</div> 
</div>{{--end section jobs --}}





{{-- questions section --}}

<div id="questions" class="sections">

<div class="user_db_cv">
<div class="col-md-12">
<ol class="breadcrumb">
  <li><a href="/">Connect Home</a></li><i class="fa fa-angle-right" aria-hidden="true"></i>
  <li><a href="/dashboard">Settings</a></li><i class="fa fa-angle-right" aria-hidden="true"></i>
  <li><a href="/dashboard#questions">Questions</a></li>
</ol>
</div>
  <div class="header userdb">
    <div class="col-md-12">
    <h1>Questions</h1>
  </div>
  </div>

<div class="contact_info">

<div class="header">


<a href="#" type="button" class="infoU" data-bs-toggle="modal" data-bs-target="#new_question_modal" >+Add New</a>

</div>



<div class="style_box">

 @php $index = 0 ; @endphp

              <div class="accordion" id="accordionquestions">

               @foreach(Auth::user()->Question()->latest()->get() as $question)

                <div class="accordion-item">

                  <h2 class="accordion-header" id="headingOne">

                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$index}}" aria-expanded="true" aria-controls="collapseOne">

                      {{$question->title}}

                    <a href="#" class="infoUdots manage_btn_menu"><i class="fas fa-ellipsis-h"></i></a>

                    <ul class="manage_menu"> 

<li class="title_menu"><a href="#" type="button" class="infoUinner"  data-object="{{$question}}" data-route='/questionUpdate' data-bs-toggle="modal" data-bs-target="#question_add_new">Edit</a></li>

                        <li><a href="/deleteQuestion/{{$question->id}}" type="button" class="item_delete">Delete</a></li>

                      </ul>

                    </button>

                  </h2>

                    <div id="collapse-{{$index}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionquestions">

                      <div class="accordion-body">

                          <p>{{ $question->description }}</p>

              <p><a href="/questiondetails/{{$question->id}}">{{$question->Answer()->count()}} Answers</a></p>

                      </div>

                    </div>

                  </div>

               @php $index ++ ; @endphp

               @endforeach

              </div>



</div>

</div>

</div>

</div>



{{-- section -- request project --}}

<div id="requestedproject" class="sections">

<div class="user_db_cv">
<div class="col-md-12">
<ol class="breadcrumb">
  <li><a href="/">Connect Home</a></li><i class="fa fa-angle-right" aria-hidden="true"></i>
  <li><a href="/dashboard">Settings</a></li><i class="fa fa-angle-right" aria-hidden="true"></i>
  <li><a href="/dashboard#requestedproject">Requested Projects</a></li>
</ol>
</div>
  <div class="header userdb">
    <div class="col-md-12">
    <h1>Requested Projects</h1>
  </div>
  </div>

<div class="contact_info">
<div class="header">
<a href="#" type="button" class="infoU" data-bs-toggle="modal" data-bs-target="#request_project_main" >+Add New</a>

</div>



<div class="style_box">

 @php $index = 0 ; @endphp

              <div class="accordion" id="accordionrequestproject">

               @foreach(Auth::user()->RequestProjects()->latest()->get() as $request_project)

                <div class="accordion-item">

                  <h2 class="accordion-header" id="headingOne">

 <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$index}}" aria-expanded="true" aria-controls="collapseOne">

                      {{$request_project->title}} 

<a href="#" class="infoUdots manage_btn_menu"><i class="fas fa-ellipsis-h"></i></a>

                    <ul class="manage_menu"> 



 <li class="title_menu"><a href="#" type="button" class="infoUinner" data-bs-toggle="modal" data-bs-target="#requestproject_add_new" data-object="{{$request_project}}" data-route='/requestprojectupdate' >Edit</a></li>

                        <li><a href="/deleterequestproject/{{$request_project->id}}" type="button" class="item_delete">Delete</a></li>

                      </ul>



                    </button>

                  </h2>

                    <div id="collapse-{{$index}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionrequestproject">

                      <div class="accordion-body">

                          <p><span style="color:#00000080; font-size:14px">

                        {{$request_project->created_at}} </span></p>

              

                         <div class="row">

                           <div class="col-md-2" style="color:#00000099">Applied for</div>

                           <div class="col-md-10">

                              <div class="jobdetails info_user">

                              <a href="/user/{{$request_project->user->id}}">

                            @if($request_project->user->photo)

                             @php $bg = $request_project->user->photo; @endphp

                             @else

                                @php $bg = "asset('img/user_image.png')"; @endphp

                              @endif

                              <div class="row">

                                <div class="col-md-3">

                            <div class="hexagon" style=" background-image: url('{{$bg}}'); ">

                              <div class="hexTop"></div>

                              <div class="hexBottom"></div>

                            </div>

                          </div>

                            <div class="col-md-9">

                              <div style="font-size:22px; flex-direction: column; justify-content: space-around; display: flex; color:#000000D9;     width: 300px;">

                                  {{$request_project->user->name}}

                            <span style="color: #00000099; font-size: 16px;">38 Followers</span>

                            <span style="color: #00000099; font-size: 16px;">38 Projects</span>

                              </div>

                            </div>

                          </div>

                           </a>

                          </div>

                           </div>

                         </div>



                         <div class="row">

                           <div class="col-md-2" style="color:#00000099">Description</div>

                           <div class="col-md-10">{!! $request_project->description !!}</div>

                         </div>

                          <div class="row">

                           {{-- gallery --}}

                            @if($request_project->gallary)

                                  <div class="col-lg-12 projectname_frontend_page">

                                    <div id="gallery_area_post">

                                    <h1>Gallery of uploaded media</h1>

                                    <div class="products_project">

                                      <div class="owl-carousel front-end-page owl-theme">



                                        @foreach($request_project->gallary as $gallery)

                                        <div>

                                            <img src="{{$gallery['file']}}"  style="max-height:300px">

                                        </div>



                                        @endforeach

                                      </div>



                                    </div>

                                   </div>

                                  </div>



                            @endif

                          </div>



                      </div>

                    </div>

                  </div>

               @php $index ++ ; @endphp

               @endforeach

              </div>

</div>



</div>



 </div> 



</div>{{--end section jobs --}}







{{-- change password section--}}

<div id="chnagepassword" class="sections">
<div class="user_db_cv">
<div class="col-md-12">
<ol class="breadcrumb">
  <li><a href="/">Connect Home</a></li><i class="fa fa-angle-right" aria-hidden="true"></i>
  <li><a href="/dashboard">Settings</a></li><i class="fa fa-angle-right" aria-hidden="true"></i>
  <li><a href="/dashboard#chnagepassword">Change Password</a></li>
</ol>
</div>
  <div class="header userdb">
    <div class="col-md-12">
    <h1>Change Password</h1>
  </div>
  </div>


<div class="contact_info">
<div class="style_box">
<form action="{{route('users.cv.changepassword')}}" method="POST" >
    @csrf
  <div class="row form-group">
    <h1>Password</h1>
    <div class="password_section">
      <label for="current_pass">Current Password</label>
      <input type="password" name="current_paseword" id="current_pass" class="form-control" placeholder="Leave it empty if you don't want to change your current password.">
    </div>

    <div class="password_section">
      <label for="new_pass">New Password</label>
      <input type="password" name="new_password" id="new_pass"  class="form-control" placeholder="New Password">
    </div>

    <div class="password_section">
      <label for="confirm_pass">Confirm New Password</label>
      <input type="password" name="confirm" id="confirm_pass" class="form-control" placeholder="Confirm New Password">
    </div>
  </div>
</form>
</div>
</div>
</div> 
</div> 

{{-- end change password section --}}

{{-- notifications section --}}

<div id="notificationssection" class="sections">
<div class="user_db_cv">

<div class="col-md-12">
<ol class="breadcrumb">
  <li><a href="/">Connect Home</a></li><i class="fa fa-angle-right" aria-hidden="true"></i>
  <li><a href="/dashboard">Settings</a></li><i class="fa fa-angle-right" aria-hidden="true"></i>
  <li><a href="/dashboard#notificationssection">Notifications</a></li>
</ol>
</div>
  <div class="header userdb">
    <div class="col-md-12">
    <h1>Notifications</h1>
  </div>
  </div>

<div class="contact_info">

<div class="style_box">

<form action="/settingNotificatiosUpdate" method="POST" id="" >  
  @csrf
<div class="row form-group">
@php $listnotifications = Auth::user()->SettingNotification()->get(); @endphp
 @foreach ($listnotifications as  $value) 
    <div class="description">
      <p style="float: left;">{{$value->title}}</p>
      <div class="icon_notification" style="float: right;">

@if($value->pivot->status == 'Enable')
<input type="checkbox" name="notificatation_ids[]" id="cb{{$value->id}}" value="{{$value->id}}" checked />
@else
<input type="checkbox" name="notificatation_ids[]" id="cb{{$value->id}}"  value="{{$value->id}}" />
@endif

    <label for="cb{{$value->id}}">
        @if($value->alert_type =='direct_messages')
        <i class="far fa-envelope"></i>
        @endif

        @if($value->alert_type =='alert_notification')
        <i class="fas fa-globe"></i>
        @endif

        @if($value->alert_type =='both')
        <i class="far fa-envelope"></i>
        <i class="fas fa-globe"></i>
        @endif
</label>
      </div>
    </div>
@endforeach
</div> {{-- end notifications --}}
<button class="apply_change" type="submit">Save</button>
</form>
</div>
</div>
</div> 
</div>
{{-- end notifications section --}}

<div id="collections" class="sections">
<div class="user_db_cv">
<div class="col-md-12">
<ol class="breadcrumb">
  <li><a href="/">Connect Home</a></li><i class="fa fa-angle-right" aria-hidden="true"></i>
  <li><a href="/dashboard">Settings</a></li><i class="fa fa-angle-right" aria-hidden="true"></i>
  <li><a href="/dashboard#collections">Collections</a></li>
</ol>
</div>

<div class="contact_info">
<div class="header userdb">
<h1>Collections</h1>

<a href="#" type="button" class="infoU" data-bs-toggle="modal" data-bs-target="#collection_add_new" data-route='/collectionStore' >+Add New</a>

</div>



<div class="style_box">

@foreach($user->collections as $collection)

<div class="single_category home_page_card " title="Click to view projects in this collection" style="padding: 5px;" >



<div class="image_category_project">

  <a href="#" type="button"  class="collection_project_list_btn" data-bs-toggle="modal" data-bs-target="#collection_project_list"  data-id='{{$collection->id}}'>



    @foreach($collection->projects as $collectionroject)

    @if($collectionroject->photo)

    <img src="{{$collectionroject->photo}}" class="collection_project_img">

    @else

    <img src="{{url('img/project-cover-placeholder-8.png')}}" class="collection_project_img">

    @endif

    @endforeach 

  </a>

</div>





<div class="info_category">

    <div>

        <h2><strong>{{$collection->name}}</strong>

        (@if($collection->private == 0) 'Private' @else 'Public' @endif)

        </h2>

        <p>{{$collection->description}}</p>

    </div>

</div>

<a href="#" class="infoU manage_btn_menu"><i class="fas fa-ellipsis-h"></i></a>

<ul class="manage_menu"> 

    <li class="title_menu"><a href="#" type="button" class="infoUinner" data-bs-toggle="modal" data-bs-target="#collection_add_new" data-object="{{$collection}}" data-route='/collectionUpdate' >Edit</a></li>

    <li><a href="/collectionDelete/{{$collection->id}}" type="button" class="item_delete" data-id="{{$collection->id}}" data-itemtype="collection" >Delete</a></li>

  </ul>

</div> 



@endforeach 



</div>
</div>
</div>
</div>{{--end section collections --}}
</div>







{{-- modal collection add new --}}



<div class="modal fade" id="collection_add_new" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

<div class="modal-dialog modal-l">

    <div class="modal-content">

        <div class="modal-header">Create/Edit Collection</div>

<div class="modal-body">

<form action="{{route('collection.store')}}" method="POST" id="collection_add_new_form" enctype="multipart/form-data">

<div class="box_content">

@csrf 



<div class="form-group">

  <label for="title">Title</label>

  <input type="text" name="name" id="collection_title" class="form-control">

</div>



<div class="form-group">

  <label for="description">Description</label>

  <input type="text" name="description" id="collection_desc" class="form-control">



</div>





<div class="row form-group">

  <label for="private">Privacy</label>

  <input type="checkbox" name="private" id="collection_private">

</div>



<input type="hidden" name="user_id" value="{{$user->id}}" /> 

<input type="hidden" name="id" id="collection_id" value="" /> 

<div class="row form-group">

<div class="setting_page_btn">

<button class="apply_change" type="submit">Save</button>

</div>

</div>

</div>

</form>                

</div>

<div class="modal-footer"></div>

</div>        

</div>

</div>

{{-- end add new collection --}}







      





{{-- start  model Question --}}

<div class="modal fade" id="question_add_new" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

<div class="modal-dialog modal-l">

    <div class="modal-content">

        <div class="modal-header">

           Create/Edit Question

        </div>

<div class="modal-body">

 <form action="{{route('questionweb.update')}}" method="POST" enctype="multipart/form-data">

  @csrf 

<div class="box_content">

<div class="row form-group">

<div class="education_feild">

  <label for="feild">Title</label>

  <input type="text" name="qtitle" class="form-control">

</div>

</div>

<div class="row form-group">

<div class="education_feild">

  <label for="feild">Description</label>

  <textarea name="qdescription" class="form-control" style="height: 300px;"></textarea>

</div>

</div>           

<div class="row form-group">

  <div class="setting_page_btn">

    <button class="apply_change" type="submit">Save</button>

  </div>

</div>

<input type="hidden" name="question_id" id="question_id" value="" />             

</div>

</form>                

</div>

<div class="modal-footer"></div>

</div>        

</div>

</div>

{{-- end model Question --}}  

{{-- start  model education --}}

<div class="modal fade" id="education_add_new" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

<div class="modal-dialog modal-l">

    <div class="modal-content">

        <div class="modal-header">

           Create/Edit Education

        </div>

<div class="modal-body">

 <form action="{{route('education.store')}}" method="POST" enctype="multipart/form-data">

  @csrf 

<div class="box_content">

<div class="row form-group">

<div class="education_feild">

  <label for="degree">School</label>

  <input type="text" name="school" class="form-control">

</div>

</div>



<div class="row form-group">

<div class="education_feild">

  <label for="degree">Degree</label>

  <input type="text" name="education_degree" class="form-control">

</div>

</div>



<div class="row form-group">

<div class="education_feild">

  <label for="feild">Feild of Study</label>

  <input type="text" name="education_feild" class="form-control">

</div>

</div>



<div class="row form-group">

<div class="education_date">

  <label for="start_date">Starting Date</label>

  <input type="date" name="starting_date" class="form-control">

  <label for="end_date">Ending Date</label>

  <input type="date" name="ending_date" class="form-control">

  <input type="checkbox" class="ongoing_class" name="ongoing" >Ongoing

</div>

</div>



<div class="row form-group">

<div class="education_feild">

  <label for="feild">Grade</label>

  <input type="text" name="grade" class="form-control">

</div>

</div>



<div class="row form-group">

<div class="education_feild">

  <label for="feild">Description</label>

  <input type="text" name="description" class="form-control">

</div>

</div>



<input type="hidden" name="user_id" value="{{Auth::user()->id}}" />                  

<div class="row form-group">

  <div class="setting_page_btn">

    <button class="apply_change" type="submit">Save</button>

  </div>

</div>

<input type="hidden" name="id" id="education_id" value="" />             

</div>

</form>                

</div>

<div class="modal-footer"></div>

</div>        

</div>

</div>

{{-- end model education --}}      







   















 {{-- start  model certificate --}}







<div class="modal fade" id="certificate_add_new" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">







<div class="modal-dialog modal-l">







    <div class="modal-content">







        <div class="modal-header">







           Create/Edit Certificate







        </div>







<div class="modal-body">

<form action="{{route('certificate.store')}}" method="POST" enctype="multipart/form-data">

            @csrf

<div class="box_content">







                  <div class="row form-group">

                    <div class="education_feild">

                      <label for="company">Title</label>

                      <input type="text" name="title" class="form-control">

                    </div>

                  </div>

                  <div class="row form-group">

                    <div class="education_feild">

                      <label for="feild">Description</label>

                      <input type="text" name="description" class="form-control">

                    </div>

                  </div>

                  <div class="row form-group">







                    <div class="education_date">







                      <label for="date">Date</label>







                      <input type="date" name="certification_date" class="form-control">







                    </div>







                  </div>







                  <div class="row form-group">

                    <div class="user_db_cv_upload_group ">

                      <div class="profile_portfolio">

                        <h6 class="main_span_porto">Upload Portfolio</h6>

                        <div>

                          <label for="portfolio">Upload</label>

                          <input type="file" name="certificateimg2" id="portfolio" hidden="">

                          <span>(less than 60 mgb)</span>

                        </div>

                      </div>

                    </div>

                  </div>

                </div>







                







<input type="hidden" name="user_id" value="{{Auth::user()->id}}" />   







<input type="hidden" name="certificate_id" value="" />   







<div class="row form-group">







  <div class="setting_page_btn">







    <button class="apply_change" type="submit">Save</button>







  </div>



</div>



</form>



</div>







<div class="modal-footer"></div>







</div>        







</div>







</div>







{{-- end model certificate --}} 























{{-- start  model milestone --}}







<div class="modal fade" id="milestone_add_new" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">







<div class="modal-dialog modal-l">



    <div class="modal-content">



        <div class="modal-header">



           Create/Edit Milestone



        </div>



<div class="modal-body">

<form action="{{route('milestone.store')}}" method="POST" enctype="multipart/form-data">

@csrf

<div class="box_content">

  <div class="row form-group">

    <div class="education_feild">

      <label for="company">Title</label>

      <input type="text" name="title" class="form-control">

    </div>

  </div>



  <div class="row form-group">

    <div class="education_feild">

      <label for="feild">Description</label>

      <input type="text" name="description" class="form-control">

    </div>

  </div>



  <div class="row form-group">

    <div class="education_date">

      <label for="date">Date</label>

      <input type="date" name="created_at" class="form-control">

    </div>

  </div>



  <div class="row form-group">

    <div class="user_db_cv_upload_group ">

      <div class="profile_portfolio">

        <h6 class="main_span_porto">Certificate</h6>

        <div>

          <label for="portfolio">Upload</label>

          <input type="file" name="certificateimg" id="portfolio" hidden="">

          <span>(less than 60 mgb)</span>

        </div>

      </div>

    </div>

  </div>

</div>            



<input type="hidden" name="user_id" value="{{Auth::user()->id}}" />  

<input type="hidden" name="milestone_id" value="" />  

<input type="hidden" name="approved" value="1" />  

<div class="row form-group">

  <div class="setting_page_btn">

    <button class="apply_change" type="submit">Save</button>

  </div>

</div>

</form>

</div>

<div class="modal-footer"></div>

</div>        

</div>

</div>

{{-- end model milestone --}} 





{{-- start  model work experiance --}}

<div class="modal fade" id="experiance_add_new" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

<div class="modal-dialog modal-l">

<div class="modal-content">

<div class="modal-header">Create/Edit Work Experiance</div>

<div class="modal-body">

<form action="{{route('experience.store')}}" method="POST" enctype="multipart/form-data">

@csrf 

<div class="box_content">

<div class="row form-group">

<div class="education_feild">

  <label for="degree">title</label>

  <input type="text" name="title" class="form-control">

</div>

</div>





<div class="row form-group">

<div class="education_feild">

  <label for="degree">Employement Type</label>

   <select name="employee_type" class="form-control">

      <option value="full_time">Full Time</option>

      <option value="part_time">Part Time</option>

      <option value="remotly">Remotly</option>

  </select> 

</div>

</div>



<div class="row form-group">

<div class="education_feild">

  <label for="feild">Company Name</label>

  <input type="text" name="company" class="form-control">

</div>

</div>

<div class="row form-group">

<div class="education_feild">

  <label for="feild">Location</label>

  <input type="text" name="location" class="form-control">

</div>

</div>



<div class="row form-group">

<div class="education_date">

  <label for="start_date">Starting Date</label>

  <input type="date" name="starting_date" class="form-control">

  <label for="end_date">Ending Date</label>

  <input type="date" name="ending_date" class="form-control">

    <input type="checkbox" class="ongoing_class" name="ongoing" >Ongoing

</div>

</div>

<div class="row form-group">

<div class="education_feild">

  <label for="feild">Industry</label>

  <input type="text" name="industry" class="form-control">

</div>

</div>



<div class="row form-group">

<div class="education_feild">

  <label for="feild">Description</label>

  <input type="text" name="description" class="form-control">

</div>

</div>

<input type="hidden" name="user_id" value="{{Auth::user()->id}}" />

<input type="hidden" name="experiance_id" value="" />   

</div>





<div class="row form-group">

              <div class="setting_page_btn">

                <button class="apply_change" type="submit">Save</button>

              </div>

            </div>

</form> 

</div>







<div class="modal-footer"></div>

</div>        

</div>

</div>



{{-- end model experiance --}} 





</div>



@endsection









@section('popup_script')

<script>

$('.sections').hide();

$('.manage_menu').hide();

$('#setting.sections').show();

$(".ongoing_class").attr('checked','checked');





$(".infoUdots").on("click",function(event){

    event.preventDefault();

    $(this).next().toggle();

});



$(".ongoing_class").on("click",function(event){

   if($(this).prop("checked") == true){

        $(this).prev().attr('disabled' , 'disabled');

    }else{ 

      if($(this).prop("checked") == false){

        $(this).prev().removeAttr('disabled');

    }

  }

});





$(".infoU.manage_btn_menu").on("click",function(event){

    event.preventDefault();

    $(this).next('.manage_menu').toggle();

});



$('.infoUinner').click(function(){

var object = $(this).data('object');

var route = $(this).data('route');

var form_id = $(this).attr('data-bs-target');

$(form_id+'_form').attr('action', route);





if(form_id == '#requestproject_add_new'){

    $("input[name='qtitle']").val(object.title);

    $("textarea[name='qdescription']").val(object.description);

    $("input[name='question_id']").val(object.id);

    return true;

}



if(form_id == '#question_add_new'){

    $("input[name='qtitle']").val(object.title);

    $("textarea[name='qdescription']").val(object.description);

    $("input[name='question_id']").val(object.id);

    return true;

}



if(form_id == '#collection_add_new'){

    $('#collection_title').val(object.name);

    $('#collection_desc').val(object.description);

    if(object.private == '1')

      $( "#collection_private" ).prop( "checked", true );



    $('#collection_id').val(object.id);

    return true;

}

if(form_id == '#education_add_new'){

    $("input[name='school']").val(object.school);

    $("input[name='education_degree']").val(object.education_degree);

    $("input[name='education_feild']").val(object.education_feild);

    $("input[name='starting_date']").val(object.starting_date);

    $("input[name='ending_date']").val(object.ending_date);

    $("input[name='ongoing']").val(object.ongoing);

    $("input[name='grade']").val(object.grade);

    $("input[name='description']").val(object.description);

    $("input[name='education_id']").val(object.id);

    return true;

}



if(form_id == '#experiance_add_new'){

    $("input[name='title']").val(object.title);

    $("input[name='employee_type']").val(object.employee_type);

    $("input[name='company']").val(object.company);

    $("input[name='location']").val(object.location);

    $("input[name='starting_date']").val(object.starting_date);

    $("input[name='ending_date']").val(object.ending_date);

    $("input[name='ongoing']").val(object.ongoing);

    $("input[name='industry']").val(object.industry);

    $("input[name='description']").val(object.description);

    $("input[name='experiance_id']").val(object.id);

    return true;

}



if(form_id == '#certificate_add_new'){

    $("input[name='title']").val(object.title);

    $("input[name='description']").val(object.description);

    $("input[name='certification_date']").val(object.certification_date);

    $("input[name='certificateimg2']").val(object.certificateimg2);

    $("input[name='certificate_id']").val(object.id);

    return true;

}

if(form_id == '#milestone_add_new'){

  $("input[name='title']").val(object.title);

  $("input[name='description']").val(object.description);

  $("input[name='created_at']").val(object.created_at);

  $("input[name='certificateimg']").val(object.photo);

  $("input[name='milestone_id']").val(object.id);

  return true;

}    

});











$('.item_delete').click(function(){

    var href = $(this).prop('href');

    window.location.href = href;

});





(function ($) {

$(".item_delete").click(function (e) {

$currID = $(this).attr("data-id");

$currTYPE = $(this).attr("data-itemtype");

$.post("{{route('user.cvinfodelete')}}", {"id": $currID , "type":$currTYPE , "_token": "{{ csrf_token() }}"}, function (data) {



    });

});

})(jQuery);



$('.user_project').owlCarousel({

loop:true,

margin:20,

nav:false,

responsive:{

  0:{

    items:1

  },



  600:{

    items:2

  },

  1000:{

    items:2

  }

}

});





$('.sidebar_user li a').click(function(){

    $('.sidebar_user li a').removeClass('active');

    $(this).addClass('active');

    var section = $(this).data('section');

    $('.sections').hide();

    $('#'+section+'.sections').show();

});



</script>



<script>



function format(item, state) {



  if (!item.id) {

    return item.text;

  }



  var countryUrl = "{{asset('flags-css/flags/4x3')}}";

  var url =  countryUrl;

  var img = $("<img>", {

    class: "img-flag",

    width: 24,

    src: url+'/' + item.element.value.toLowerCase() + ".svg"

  });



  var span = $("<span>", {

    text: " " + item.text

  });

  span.prepend(img);

  return span;

}



$(document).ready(function() {

  $("#e1").select2({

    templateResult: function(item) {

      return format(item, false);

    }

  });



$(".select_country").select2();

$(".city_select2").select2({

    placeholder: "Select a City",

    allowClear: true

});

  



});



$(document).on('change', ".select_country", function(e){

data = $(this).select2('data');

var country_id = data[0].id;

console.log(country_id);

//$('.select_country').val(country_id);

$('.city_select2').select2({

  ajax: {

    url: '/get_citiesby_country_id/'+country_id,

    processResults: function (data) { console.log(data);

      // Transforms the top-level key of the response object from 'items' to 'results'

      return {

        results: data

      };

  }



}



});



}); 



    </script>

@endsection







