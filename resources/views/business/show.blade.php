@extends('layouts.main')

@section('title', '- User Profile')

@section('content')

 <div class="background-home">
            <div class="col-lg-12  col-md-12 col-sm-12">
                <div class="profile_section">
                    <div class="image d-none d-lg-flex  d-xl-flex">

                        @if ((Auth::user()) && ($user->id == Auth::user()->id))
                        <a href="#" type="button" id="edit_cover" class="edit_cover" data-bs-toggle="modal" data-bs-target="#edit_cover_modal" >
                            <img src="{{asset('css/assets/website-icons/edit.svg')}}" class="pencil-edit"/>
                        </a>
                        @endif

                        @if($user->profilecover)
                            <div style="background:url('{{$user->profilecover}}')" class="userbg"></div>
                        @else
                        <div style="background:url('/img/cover-placeholder-8.png')" class="userbg"></div>
                        @endif

                    </div>


                    <div class="image d-lg-none d-xl-none">
                        <img src="/img/Image.png" alt="">
                    </div>



                    <div class="user">
                        <div class="left">
                            <div class="user_image">
                              @if($user->photo)
                              @php $user_thumb = $user->photo; @endphp
                              @else







                              @php $user_thumb = asset('/img/user_image.png'); @endphp







                              @endif







                              







                              <div class="hexagon_profile_img" style=" background-image: url('{{$user_thumb}}'); ">







                                  <div class="hexTop"></div>







                                  <div class="hexBottom"></div>







                              </div>















                            </div>







                            <div class="info_user">







                                <p class="col-md-4">{{isset($user->name) ? $user->name : 'User Name'}}</p>







                               {{-- <img src="/img/Verified Mark.png" alt="Verified"> --}}







                               <div class="row">







                                <div class="box ">







                                    <a href="#" type="button"  data-bs-toggle="modal" data-bs-target="#userFollowerslist" >







                                    <strong><label class="countno">{{$user->businessFollowing()->count()}}</label></strong>    







                                    <label>Following</label>



                                    </a>







                                </div>







                                <div class="box">







                                    <strong> <label class="countno">{{$user->projectsWorkedOn()->count()}}</label></strong>







                                    <label>Projects</label> 







                                   







                                </div>







                                </div>







                            







                            </div>







                        



                            @if ((Auth::user()) && ($user->id != Auth::user()->id))



                            <div class="action_user">



                                @if($user->role == 'business')



                                     <a href="javascript:void(0);" class="chat-toggle btn btn-primary" data-id="{{$user->id}}" >Follow</a>



                                @else







                                    <a href="javascript:void(0);" class="chat-toggle btn btn-primary" data-id="{{$user->id}}" data-user="{{$user->name}}" data-avatar="{{$user->photo ? $user->photo : asset('/img/user_image.png')}}">Message</a>







                                @endif



                                {{-- dots --}}



                                   <a href="#" class="manage_btn_menu_user_action"><i class="fas fa-ellipsis-h"></i></a>



                                    <ul class="manage_menu_user_action"> 







                                        <li class="title_menu">







                                            <a href="#" type="button" class="infoUinner" id="userreportbtn" data-bs-toggle="modal" data-bs-target="#report_reasonsModal" data-id="{{$user->id}}" data-type="user">







                                                <img src="{{asset('css/assets/website-icons/share.svg')}}" width="26" class="icon" />Report</a></li>







                                        <li><a href="#" type="button" ><img src="{{asset('css/assets/website-icons/share.svg')}}" width="26" class="icon" />Share</a></li>







                                    </ul>







                            </div>







                            @endif







                    <div>







                    







                  {{--  <div class="contact_info1">







                       







                        







                        @auth















                        @endauth







                    </div> --}}







                    















                    







                    </div>







                    







                        </div>







                        <div class="right d-none d-lg-block d-xl-none">







                            <a href="#" class="edit_profile_btn">Edit Profile</a>







                            <a href="#" class="toggle_btn"><i class="fas fa-ellipsis-h"></i></a>







                        </div>







                    </div>







                   







                    <div class="bio">







                        <p> {{isset($user_data->bio) ? $user_data->bio : ''}}</p>







                    </div>







                    <div class="location">







                        <p class="d-none d-lg-flex  d-xl-flex">   {{isset($user_data->city_id) ? $user_data->City()->first()->name : ''}}, {{isset($user_data->country_id) ? $user_data->Country()->first()->country : ''}}







                         </p>







                        <a href="{{$user->website}}" target="_blank">{{$user->website}}</a>







                    <div class="social_media">







                        <a href="@if($user->profile){{$user->profile->facebook}}@endif" target="_blank"><i class="fab fa-facebook-square"></i></a>







                        <a href="@if($user->profile){{$user->profile->linkedin}}@endif" target="_blank"><i class="fab fa-linkedin"></i></a>







                        <a href="@if($user->profile){{$user->profile->pinterest}}@endif" target="_blank"><i class="fab fa-pinterest"></i></a>







                        <a href="@if($user->profile){{$user->profile->instagrm}}@endif" target="_blank"><i class="fab fa-instagram-square"></i></a>







                        <a href="@if($user->profile){{$user->profile->twiter}}@endif" target="_blank"><i class="fab fa-twitter-square"></i></a>







                        <a href="@if($user->profile){{$user->profile->youtube}}@endif" target="_blank"><i class="fab fa-youtube"></i></a>







                        <a href="@if($user->profile){{$user->profile->tiktok}}@endif" target="_blank"><i class="fab fa-tiktok"></i></a>







                    </div>                   







                    </div>







                    















                    







                </div>







            </div>







        </div>















    {{-- User CV --}}







    @if(($user->educations()->count() > 0) || ($user->certificates()->count() > 0) || ($user->workExperiences()->count() > 0) || ($user->milestones()->count() > 0))







        <div class="row cirruculum_vitae_style">







           







           <div class="cirruculum_vitae">







                <h1>Cirruculum Vitae </h1>







                







             <div class="graybg" style="border-radius:5px">







               @php $index = 0 ; @endphp 







               @if ($user->educations()->count() > 0)







                <p class="title">Education</p>







           







              <div class="accordion" id="accordionEducation">







              @foreach($user->educations as $education)







                <div class="accordion-item">







                  <h2 class="accordion-header" id="headingOne">







                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$index}}" aria-expanded="true" aria-controls="collapseOne">







                      {{ $education->education_feild }} - {{$education->education_degree}}







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







              @endif







              







              @if ($user->certificates()->count() > 0)







              <p class="title">Certificates</p> 







              <div class="accordion" id="accordionCertificate">







              @foreach($user->certificates as $certificate)







                <div class="accordion-item">







                  <h2 class="accordion-header" id="headingOne">







                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$index}}" aria-expanded="true" aria-controls="collapseOne">







                      {{ $certificate->title }} - {{$certificate->certificate_date}}







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







             @endif







             @if ($user->workExperiences()->count() > 0) 







              <p class="title">Work Experience</p> 







              <div class="accordion" id="accordionwork_experience">







              @foreach($user->workExperiences as $work_experience)







                <div class="accordion-item">







                  <h2 class="accordion-header" id="headingOne">







                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$index}}" aria-expanded="true" aria-controls="collapseOne">







                      {{ $work_experience->title }} - {{$certificate->certificate_date}}







                    </button>







                  </h2>







{{--@if($index==0)  show @endif--}}







                    <div id="collapse-{{$index}}" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionwork_experience">







                      <div class="accordion-body">







                        {{ $work_experience->description }}







                      </div>







                    </div>







                  </div>







               @php $index ++ ; @endphp







               @endforeach







              </div>







              @endif







              







              @if ($user->milestones()->count() > 0)







              <p class="title">Milestones</p> 







              <div class="accordion" id="accordionmilestone">







              @foreach($user->milestones as $milestone)







                <div class="accordion-item">







                  <h2 class="accordion-header" id="headingOne">







                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$index}}" aria-expanded="true" aria-controls="collapseOne">







                      {{ $milestone->title }} 







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







              @endif







               







               </div>







           </div>







        </div>







        







        @endif















@php $start = 0.0 ;  $card_col="col-lg-12"; $class="col-md-12"; @endphp



@php $class = 'col-md-12 col-lg-12'; @endphp



      {{-- user projects --}}







@if($user->projectsWorkedOn()->count() > 0)







        <div class="col-md-12" >



            <div class="project" id="user_public_profile">



             <h1>Project has worked on </h1>  



            <div class="owl-carousel front-end-page owl-theme">



                    @foreach($user->projectsWorkedOn()->get() as $project)



                         @include('card')



                    @endforeach            



            </div>



            </div>



        </div>



 @endif







 







 @if($user->collections()->count() > 0)







        <div class="col-md-12" style="margin-top: 1em;">







            <div class="project">







                <h1>Project You Follow </h1>







            <div class="owl-carousel front-end-page owl-theme">







                        @foreach($user->collections as $collection)







                        <a href="#" type="button"  class="collection_project_list_btn" data-bs-toggle="modal" data-bs-target="#collection_project_list" data-object='{{$collection}}' data-id='{{$collection->id}}'>







                            







                        <div class="single_category home_page_card" style="padding: 5px;">







                        <div class="image_category_project">







                            @foreach($collection->projects as $collectionroject)







                            







                            @if($collectionroject->photo)







                            <img src="{{$collectionroject->photo}}" class="collection_project_img">







                            @else







                            <img src="/img/logo-black.svg" class="collection_project_img">







                            @endif







                            @endforeach 







                        </div>







                        <div class="info_category">







                            <div>







                                <h2 style="font-size:18px">{{$collection->name}}</h2>







                                <p>{{$collection->description}}</p>







                            </div>















                            







                        </div>







                    </div>







                    </a>







                   







                    @endforeach            







            







            </div> 







            </div>







        </div>







  @endif  







{{-- start model edit cover --}}







<div class="modal fade" id="edit_cover_modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">







<div class="modal-dialog modal-xl">







<div class="modal-content">







    <div class="modal-header">







       <h1>Edit Cover</h1>







    </div>







<div class="modal-body">







<form action="{{ route('user.updatecover') }}" method="POST"  enctype="multipart/form-data"  >    







@csrf







<div class="edit_cover_div">







<h3>Drag and drop media files here.</h3>







<p>or Browse to choose from device</p>







<br/><br/><br/>







<p>Supported formats: .JPG, .PNG, .MP3, .MP4</p>







<div class="dropzone" id="id_dropzone" ></div>







</div>







<h2>Drag to reposition image</h2>















</form>







</div>















</div>        







</div>







</div>







{{-- end model edit cover --}}















{{-- start  model user Followers list --}}







<div class="modal fade" id="userFollowerslist" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">



<div class="modal-dialog">



<div class="modal-content">  



    <div class="modal-header">Following</div>







<div class="modal-body">



       @foreach($user->businessFollowing()->get() as $follow)



       <div class="row" style="display: inline-flex; max-width: 100% ; flex-wrap: nowrap;  align-items: center; flex-direction: row; width:240px">



          @if($follow)



           <div class="generalinfo" id="followinglisthexagon">







            <a href="/user/{{$follow->id}}" class="member">



                @if($follow->photo)



                @php $bg = $follow->photo; @endphp



                @else



                @php $bg = "asset('img/user_image.png')"; @endphp



                @endif







                <div class="hexagon" style=" background-image: url('{{$bg}}'); ">



                <div class="hexTop"></div>



                <div class="hexBottom"></div>



                </div>



            </a>



              <h6 class=" d-none d-lg-flex d-xl-flex">{{$follow->name}}</h6>



           </div>



           @endif



           



           <div style="text-align: right;">



            <div class="follow">



                @if(Auth::guest())



                 <a href="#" class="sign_in_popup" data-bs-toggle="modal" data-bs-target="#registerModal" id="followbtn"> Follow</a>



                @else 



                @php $following_projects_ids =  Auth::user()->following()->where('followable_type','App\Models\Project')->pluck('followable_id')->toArray();



                @endphp



                @if(in_array($follow->followable_id,$following_projects_ids))  



                <a href="javascript:void(0)" class="btn btn-primary unfollowbtn" data-projectid = "{{$follow->followable_id}}" data-url="/unfollow/{{$follow->followable_id}}">Unfollow</a>



                @else



                <a href="javascript:void(0)" class="followbtn" data-projectid = "{{$follow->followable_id}}" data-url="/follow/{{$follow->followable_id}}"> Follow</a>



                @endif



                @endif



            </div>



           </div>



       </div>



       @endforeach







</div>







</div>        







</div>







</div>







{{-- end model user Followers list  --}}























@endsection















@section('popup_script')







<script>



$('.owl-item div').removeClass('animate');



$('.owl-item div').removeClass('fadeInUp');







$(document).on('click','#userreportbtn',function(){







    var item_id = $(this).data('id');







    var item_type = $(this).data('type');







    $("input[name='item_id']").val(item_id);







    $("input[name='item_type']").val(item_type);







});















$(document).ready(function () {







    $("#id_dropzone").dropzone({







        maxFilesize: 8,







        headers: {







        'X-CSRF-TOKEN': "{{ csrf_token() }}"







        },







        url: '{{ route('user.updatecover') }}',







        success: function (file, response) {







            console.log(response);







        }







    });







});







           /* $('.front-end-page').owlCarousel({







                loop:true,







                margin:10,







                nav:false,







                responsive:{







                    0:{







                        items:1







                    },







                    600:{







                        items:1







                    },







                    1000:{







                        items:3







                    }







                }







            }) */







            







$(".nav-tabs a").click(function(){







     $(this).tab('show');







     $(".nav-tabs li").removeClass('active');







     $(this).parent().addClass('active');







 });







 







$('.manage_menu_user_action').hide(); 







 $(".manage_btn_menu_user_action").on("click",function(event){







    event.preventDefault();







    $('.manage_menu_user_action').toggle();







});















</script>







@endsection























