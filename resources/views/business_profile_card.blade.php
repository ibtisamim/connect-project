<div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 {{$class}} animate fadeInUp" style='-webkit-animation-delay: {{$start}}s; -moz-animation-delay: {{$start}}s; animation-delay: {{$start}}s; ' id="businesscard">



<a href="/businessDetails/{{$bussinessprofile->id}}">

<div class="single_category home_page_card" style="min-height: 100%; max-height: 100%;">

@if($bussinessprofile->profilecover)

@php $covercard = $bussinessprofile->profilecover; @endphp

@else

@php $covercard = '/img/project-cover-placeholder-8.png'; @endphp

@endif







<div class="image_category" style="background-image:url('{{$covercard}}'); min-height: 100px; max-height: 100px;"></div>

            @if(Auth::user())                            

            <div class="action_user" style="top:5px; right:5px; position: absolute; ">

            {{-- dots --}}

            <a href="#" class="manage_btn_menu_card_action" style="color: #fff; z-index: 9999999; position: relative; float: right; margin-right: 15px; margin-top: 10px;"><i class="fas fa-ellipsis-h"></i></a>

                <ul class="manage_menu_card_action" style="background: #f7f5f5; top: 25px; right: 0; padding:10px"> 

                    <li class="title_menu">
                        <a href="#" type="button" class="infoUinner" id="cardreportbtn" style="display: inline-flex;" data-bs-toggle="modal" data-bs-target="#report_reasonsModal" data-id="{{$bussinessprofile->id}}" data-projectid="{{$bussinessprofile->id}}" data-type="project">

                            <img src="{{asset('css/assets/website-icons/share.svg')}}" width="26" class="icon" />Report</a></li>


                    <li class="title_menu">
                    <a href="#" id="cardhiddenbtn" type="button" data-bs-toggle="modal" data-bs-target="#hidden_reasonsModal" data-id="{{Auth::user()->id}}" data-projectid="{{$bussinessprofile->id}}" data-type="bussinessprofile" style="display: inline-flex;">
                        <img src="{{asset('css/assets/website-icons/hide.svg')}}" width="26" class="icon"  />Hide</a></li>


                </ul>

            </div>{{-- end dots --}}

            @endif

{{-- class="team_member" --}}

        <div class="businessprofile info_category">

            <div  id="businessprofileimg">

                <a href="/user/{{$bussinessprofile->id}}">

                                 @if($bussinessprofile->photo)

                                 @php $bg = $bussinessprofile->photo; @endphp

                                 @else

                                    @php $bg = "asset('img/user_image.png')"; @endphp

                                  @endif

                                <div class="hexagon" style=" background-image: url('{{$bg}}'); ">

                                  <div class="hexTop"></div>

                                  <div class="hexBottom"></div>

                                </div>

                </a>

            </div>



            <h2 class="card-feed-title"> 

                {{ \Illuminate\Support\Str::limit($bussinessprofile->name, 21 , $end='...') }} </h2>



            <div class="all_tage text-center d-md-flex">



                    @php $index = 0; @endphp



                     @foreach($bussinessprofile->BusinessField()->latest()->take(1)->get() as $cat)



                      <div class="tage">

                        <span> {{ \Illuminate\Support\Str::limit($cat->title, 200, $end='...') }} </span>

                      </div>



                      @php $index ++; @endphp

                      @endforeach

            </div>





            <div class="follow">

            @if(Auth::guest())

            <a href="#" class="sign_in_popup" data-bs-toggle="modal" data-bs-target="#registerModal" id="followbtn">Follow</a>

            @else 



            @php $following_business_ids =  Auth::user()->businessFollowing()->pluck('followable_id')->toArray();



            @endphp



            @if(in_array($bussinessprofile->id,$following_business_ids))  



            <a href="/unfollowbusiness/{{$bussinessprofile->id}}" class="btn unfollowbtn2"> Unfollow</a>



            @else



            <a href="/followbusiness/{{$bussinessprofile->id}}" class="followbtn2"> Follow</a>



            @endif



            @endif



          </div>







          <div class="share" style="float:right">



                 <a href="#" class="sign_in_popup" data-bs-toggle="modal" data-bs-target="#registerModal" id="sharebtn">Share</a>



          </div>











        </div>



        </div>



        </a>







</div>















                    































