

@if($project->type === 'publication') {{-- {{$card_col}} --}}

<div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 {{$class}} animate fadeInUp" style='-webkit-animation-delay: {{$start}}s; -moz-animation-delay: {{$start}}s; animation-delay: {{$start}}s;' >



<a href="{{route('front_end_page',$project->id)}}">

<div class="single_category home_page_card">

@if($project->photo)



@php $covercard = $project->photo; @endphp

@else

@php $covercard = '/img/project-cover-placeholder-8.png'; @endphp

@endif







<div class="image_category" style="background-image:url('{{$covercard}}')"></div>

@if(Auth::user())                            

<div class="action_user" style="top:5px; right:5px; position: absolute; ">

{{-- dots --}}

<a href="#" class="manage_btn_menu_card_action" style="color: #fff; z-index: 9999999; position: relative; float: right; margin-right: 15px; margin-top: 10px;"><i class="fas fa-ellipsis-h"></i></a>

    <ul class="manage_menu_card_action" style="background: #f7f5f5; top: 25px; right: 0; padding:10px"> 

                <li class="title_menu">

                    <a href="#" type="button" class="infoUinner" id="cardreportbtn" style="display: inline-flex;" data-bs-toggle="modal" data-bs-target="#sharemodel" data-id="{{$project->user->id}}" data-link ='{{$project->sharelink}}' data-type="project">



                        <img src="{{asset('css/assets/website-icons/share.svg')}}" width="26" class="icon" />Report</a></li>





                <li class="title_menu">

                    <a href="#" id="cardhiddenbtn" type="button" data-bs-toggle="modal" data-bs-target="#hidden_reasonsModal" data-id="{{Auth::user()->id}}" data-projectid="{{$project->id}}" data-type="project" style="display: inline-flex;">

                        <img src="{{asset('css/assets/website-icons/hide.svg')}}" width="26" class="icon"  />Hide</a></li>

    </ul>

</div>

@endif







<div class="team_member">

@foreach($project->Members()->latest()->take(2)->get() as $member)

<a href="/user/{{$member->id}}" class="member">

     @if($member->photo)

     @php $bg = $member->photo; @endphp

     @else

        @php $bg = "asset('img/user_image.png')"; @endphp

     @endif



    <div class="hexagon" style=" background-image: url('{{$bg}}'); ">

      <div class="hexTop"></div>

      <div class="hexBottom"></div>

    </div>

</a>

@endforeach





@if($project->members()->count() > 2) 

<a href="#" type="button" class="employeeslist member" data-bs-toggle="modal" data-bs-target="#project_employees" data-id="{{$project->id}}">



<div class="hexagon" style=" background: #fff ; ">

<div class="hexTop"></div>

<div class="hexBottom"></div>

<span class="text-center">+2</span>

</div>

</a>

@endif 

</div>

<div class="info_category">

 <h2> {{ \Illuminate\Support\Str::limit($project->called, 21 , $end='...') }} </h2>

    <div class="all_tage text-center   d-md-flex">

        @php $index = 0; @endphp

         @foreach($project->categories()->latest()->take(2)->get() as $cat)

          <div class="tage">

            <span> {{ \Illuminate\Support\Str::limit($cat->title, 200, $end='...') }} </span>@if($index < 1 ){{'|'}} @endif

          </div>

          @php $index ++; @endphp

          @endforeach

    </div>





<div class="follow">



    @if(Auth::guest())

     <a href="#" class="sign_in_popup" data-bs-toggle="modal" data-bs-target="#registerModal" id="followbtn">Follow</a>

    @else 

    @php $following_projects_ids =  Auth::user()->projectFollowing()->pluck('followable_id')->toArray();

    @endphp

    @if(in_array($project->id,$following_projects_ids))  

    <a href="javascript:void(0)" class="btn unfollowbtn" data-projectid = "{{$project->id}}" data-url="/unfollow/{{$project->id}}">Unfollow</a>

    @else

    <a href="javascript:void(0)" class="followbtn" data-projectid = "{{$project->id}}" data-url="/follow/{{$project->id}}">Follow</a>

    @endif

    @endif



</div>



@if(Auth::guest())

<div class="share" style="float:right">

     <a href="#" class="sign_in_popup" data-bs-toggle="modal" data-bs-target="#registerModal" id="sharebtn">Share</a>

</div>

@else

<div class="share" style="float: right;">

    <a href="#" class="btn sharebtn_card" data-bs-toggle="modal" data-bs-target="#sharemodel_card" data-link ='{{$project->sharelink}}' data-object="{{$project}}" data-name="{{$project->called}}" data-description="{{$project->description}}">

        {{-- <img src="{{asset('css/assets/website-icons/share.svg')}}" width='15' style="margin-right: 10px; width: 15px; display: inherit;"/>
--}}
    Share</a>

    </div>

@endif



</div>

</div>

</a>

</div>

@endif         



