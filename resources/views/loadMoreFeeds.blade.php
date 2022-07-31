@php $start = 0.4 ;  @endphp      

@foreach($projects as $project)

@include('card')

@php $start = $start + 0.2 ; @endphp

@endforeach



@foreach($bussinessprofiles as $bussinessprofile)

@include('business_profile_card')

@php $start = $start + 0.2 ; @endphp

@endforeach

@foreach($rss_feeds_news as $rssfeed)

@php $channel_link = $rssfeed['channel_link']; @endphp
@foreach($rssfeed['items'] as $item)
@include('news_card')
@php $start = $start + 0.2 ; @endphp
@endforeach

@endforeach

{{-- request projects list --}}
@if(Auth::user()->role == 'business')

@foreach($request_projects as $requestproject)



<div class="col-sm-6 col-lg-4 mb-4  animate fadeInUp" style='-webkit-animation-delay: {{$start}}s; -moz-animation-delay: {{$start}}s; animation-delay: {{$start}}s;' >


  <a href="/requestprojectdetails/{{$requestproject->id}}">

        <div class="apply_card">
          <div class="info_user">
            <img src="img/user_image.png" alt="user_img">
            <h6>{{$requestproject->user->name}} </h6>
          </div>


          <div class="details">
            <p class="title_request">Project Request</p>
            <p class="description_request">{{$requestproject->title}}</p>

            <div class="project_details">
              <div class="tage">
                @if($requestproject->Category())
                <span>{{$requestproject->Category()->first()->title}}</span>
                @else
                <span>Not Found</span>



                @endif



              </div>



            </div>



            <p class="description">



             {{ \Illuminate\Support\Str::limit($requestproject->description, 85, $end='...') }}</p>

          </div>

          <div class="more_details">
            <p><span class="location">Location : </span> {{$requestproject->location}}</p>
            <p><span class="deadline">Duration : </span>{{$requestproject->deadline}}</p>
            <p><span class="deadline">Budget : </span>${{$requestproject->budget}}</p>
          </div>

          <div class="apply_button">
          <h3>
            <a href="#" type="button" class="request_project" data-bs-toggle="modal" data-bs-target="#rfq">
            <img src="{{asset('img/apply.png')}}" alt="apply">Apply</a>
            <a href="#" type="button" class="request_project">Share</a>
          </h3>
          </div>
        </div>
        </a>
      </div>


@php $start = $start + 0.2 ; @endphp
@endforeach
@endif
{{-- end request projects list --}}
{{-- questions card --}}

@foreach($questions as $question)

<div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 {{$class}} animate fadeInUp" style='-webkit-animation-delay: {{$start}}s; -moz-animation-delay: {{$start}}s; animation-delay: {{$start}}s;'>

 <a href="/questiondetails/{{$question->id}}">
        <div class="apply_card question">
          <div class="info_user">

                   @if($question->user->photo)

                   @php $bg = $question->user->photo; @endphp

                   @else

                      @php $bg = "asset('img/user_image.png')"; @endphp

                    @endif

                  <div class="hexagon" style=" background-image: url('{{$bg}}'); ">
                    <div class="hexTop"></div>
                    <div class="hexBottom"></div>
                  </div>



            <h6>{{$question->user->name}} </h6>

              <span class="date">

                @php

                    $prev = \Carbon\Carbon::now();

                    $now = $question->created_at;

                    $diff = $prev->longAbsoluteDiffForHumans($now, 2);

                    echo $diff;

                @endphp

              </span>

          </div>





          <div class="details">

            <div class="row col-md-12"><span class="card-type">Ask Question</span></div>

            <p class="description_request">{{$question->title}}</p>

            <p class="description">

             {!! \Illuminate\Support\Str::limit($question->description, 85, $end='...') !!}

            </p>



          </div>



          <div class="apply_button">

            <div class="jobapplylink" >

            <a href="#" type="button" class="answerbtn" data-id='{{$question->id}}' data-bs-toggle="modal" data-bs-target="#answer_quetions">

            Answer</a>

             </div>

          

         

            <div class="share" >

                 <a href="#" class="sign_in_popup" data-bs-toggle="modal" data-bs-target="#registerModal" id="sharebtn">Share</a>

            </div>



          </div>

        </div></a>

      </div>

@php $start = $start + 0.2 ; @endphp





@endforeach

{{-- end questions cards --}}

{{-- jobs offers just for users --}}

@if ((Auth::user()->role == 'employee') || (Auth::user()->role == 'normal') || (Auth::user()->role == 'member'))

@foreach($jobs as $job)



<div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 {{$class}} animate fadeInUp" style='-webkit-animation-delay: {{$start}}s; -moz-animation-delay: {{$start}}s; animation-delay: {{$start}}s;'>



 <a href="/jobdetails/{{$job->id}}">

        <div class="apply_card">

         

          <div class="info_user">

                   @if($job->user->photo)

                   @php $bg = $job->user->photo; @endphp

                   @else

                      @php $bg = "asset('img/user_image.png')"; @endphp

                    @endif

                  <div class="hexagon" style=" background-image: url('{{$bg}}'); ">

                    <div class="hexTop"></div>

                    <div class="hexBottom"></div>

                  </div>

            <h6>{{$job->user->name}} </h6>

              <span class="date">

                @php

                    $prev = \Carbon\Carbon::now();

                    $now = $job->created_at;

                    $diff = $prev->longAbsoluteDiffForHumans($now, 2);

                    echo $diff;

                @endphp

              </span>

          </div>





          <div class="details">

            <div class="row col-md-12"><span class="card-type">Vacancy/ RFQ</span></div>

            <p class="description_request">{{$job->title}}</p>

            <p class="title_request">{{$job->category->title}}</p>

            <p class="description">

             {{ \Illuminate\Support\Str::limit($job->description, 85, $end='...') }}

            </p>



          </div>





          <div class="more_details">

            <p><span class="location">Location : </span> {{$job->location}}</p>

            <p><span class="deadline">Deadline : </span> {{$job->deadline}}</p>



          </div> 







          <div class="apply_button">

         

            @php $applying_jobs_ids =  Auth::user()->JobApply()->pluck('job_offers.id')->toArray();

            @endphp

            @if(in_array($job->id,$applying_jobs_ids))  

            <button class="applybtn" disabled >Applyed</button>

            @else

            <div class="jobapplylink" >

            <a href="#" type="button" class="applybtn" data-id='{{$job->id}}' data-bs-toggle="modal" data-bs-target="#job_apply">

            Apply</a>

             </div>

            @endif

         

            <div class="share" >

                 <a href="#" class="sign_in_popup" data-bs-toggle="modal" data-bs-target="#registerModal" id="sharebtn">Share</a>

            </div>



          </div>

        </div></a>

      </div>

@php $start = $start + 0.2 ; @endphp



@endforeach    





@endif































































 