@auth


@php $class_searchform ="auth_searchform"; $menuclass="loginmetop"; @endphp

@else

@php $class_searchform =""; $menuclass=""; @endphp

@endauth

<div id="header_1">
<div class="container d-none d-md-block d-lg-block d-xl-block">


        <div class="row">


            <nav class="navbar navbar-expand-lg navbar-light style_nav_index">


                <a class="navbar-brand {{$class_searchform}}" href="{{route('index')}}">




                    @if(Auth::guest())

                    <img src="{{asset('img/connect-logo.png')}}" class="img-responsive" >


                    @else







                    <img src="{{asset('img/logo-icon.png')}}" class="img-responsive" style="width: 40px;">







                    @endif 







                </a>







                







                <form action="{{ route('search') }}" class="searchform {{$class_searchform}}" method="post" name="searchform" > {{ csrf_field() }}







                <div class="form-group  search-div">







                    <i class="fas fa-search icon-search"></i>







                







                    <input type="text" name="query" placeholder="Type in something" class="form-control search-input" name="query">







                    <button type="submit" class="searchbtn">







                        <img src="{{asset('css/assets/website-icons/right-arrow-search-bar.svg')}}" width="25" />







                    </button>







                </div>







                </form>







                















    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">







        <span class="navbar-icon">







            <i class="fas fa-bars"></i>







        </span>







    </button>















    







<div class="collapse navbar-collapse" id="navbarSupportedContent">







    <ul class="navbar-nav ms-auto mb-2 mb-lg-0" id="{{$menuclass}}" >







        @if(Auth::guest())







        <li class="nav-item">







            <a class="nav-link active" aria-current="page" href="{{ route('page.show',[15, 'about-connect'])}}">About Us</a>







        </li>







        







        <li class="nav-item">







            <a class="nav-link active" aria-current="page" href="/contact">Contact</a>







        </li>







        @endif                







@auth







                        







<li class="nav-item">







<div class="notification_dropDown">







    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" >







        <button type="button" id="read_notifications"  data-id="{{Auth::user()->id}}" style="box-shadow: none" class="btn   position-relative">







            @if( Auth::user()->unreadNotifications->count() > 0)







            <span class="count_notify position-absolute top-45 start-75 translate-middle badge rounded-pill bg-danger">







                <span>{{Auth::user()->unreadNotifications->count()}}</span>







            </span>







            @endif







        <img src="{{asset('css/assets/website-icons/notifications.svg')}}" width="25" />







        </button>







    </a>







    







    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">







        <li class="notification_item">







            <P>Notifications</P>







            <a href="#"><i class="fas fa-ellipsis-h"></i></a>







        </li>







        @foreach(Auth::user()->notifications->sortByDesc('created_at') as $notification)







        <li>







            <div class="details_notification">







                <img src="{{asset('img/user_image.png')}}" alt="">







                @if($notification->type =='App\Notifications\BlogNotification')







                <div class="description">







                    <p>{{$notification->data['body']}}</p>







                    <p><a href="{{ $notification->data['url'] }}">{{$notification->data['post_title']}}</a> </p>







                    <span>{{Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</span>







                </div>







                @else







                <div class="description">







                    <p>{{$notification->data['name_owner'] ." assign you to new project"}}</p>







                    <span>{{Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</span>







                </div>







                @endif







            </div>







        </li>







        @endforeach







    </ul>







</div>







</li>























<li class="nav-item">







<div class="notification_dropDown">







    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" >







<img src="{{asset('css/assets/website-icons/message.svg')}}" width="25" />







</a>







    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li class="notification_item">
            <P>Direct Messages</P>

            <a href="#"><i class="fas fa-ellipsis-h"></i></a>

        </li>
        <li>
            <div class="details_notification">

                @foreach(Auth::user()->inboxMegs()->latest()->take(10) as $msg)  

          @if($msg->fromUser()->first()->photo)
              @php $user_thumb = $msg->fromUser()->first()->photo; @endphp
          @else
          @php $user_thumb = 'https://ui-avatars.com/api/?background='.$bg_color.'&color=fff&name=ibtisam+m'; @endphp
          @endif   

<div class="hexagon-user-thumb-top" style=" background-image: url('{{$user_thumb}}'); ">
  <div class="hexTop"></div>
  <div class="hexBottom"></div>
</div>

                <div class="description">
                    <p>{{$msg->content}}</p>
                    <span> 
                    @php
                    $prev = \Carbon\Carbon::now();
                    $now = $msg->created_at;
                    $diff = $prev->longAbsoluteDiffForHumans($now, 2);
                    echo $diff;
                    @endphp
                    </span>
                </div>
                @endforeach
            </div>

            <a href="/view-all-messages" class="viewall">View all </a>
        </li>

    </ul>    
</div>

</li>


<li class="nav-item" style=" height: auto;">

<div class="person_dropdown">

<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" >


          @if(Auth::user()->photo)

              @php $user_thumb = Auth::user()->photo; @endphp

          @else

          @php $user_thumb = 'https://ui-avatars.com/api/?background='.$bg_color.'&color=fff&name=ibtisam+m'; @endphp

          @endif   



<div class="hexagon-user-thumb-top" style=" background-image: url('{{$user_thumb}}'); ">

  <div class="hexTop"></div>

  <div class="hexBottom"></div>

</div>



</a>







    <ul class="dropdown-menu profilemenu" aria-labelledby="navbarDropdown">







        @if(Auth::user()->role != 'business')







        <li><a  href="{{route('users.show', ['user' => Auth::user()])}}" id="myprofile"> My Profile</a></li>







        <li><a  href="{{route('users.dashboard')}}#setting" id="setting"> Settings</a></li>   







        @else







        <li><a  href="{{route('business_profile')}}" id="myprofile">My Profile</a></li>







        <li><a  href="{{route('business.dashboard')}}#setting" id="dashboard">  Dashboard</a></li> 







        <li>







        @endif







        <li>







        <a  href="{{ route('logout') }}" onclick="event.preventDefault();







                document.getElementById('logout-form').submit();" id="logout">







            







            Sign Out</a>







            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">







                @csrf







            </form>







        </li>







    </ul>







</div>







</li>                        







@else







<li class="nav-item d-none d-md-block d-lg-block  d-xl-block d-xxl-block">







    <button class="btn btn-primary login_button" data-bs-toggle="modal" data-bs-target="#registerModal" id="popUp_button">  Log In</button>







</li>







@endauth















</ul>







</div>















</nav>







</div>







</div>







</div>































@section('notification')







    <script>







        $(document).ready(function(){







            $('#navbarDropdown').on('show.bs.dropdown', function (){







            var user_id = $(this).find("#read_notifications").data('id');







            $.ajax({







                url : "{{route('change_status_notification')}}",







                type : "POST",







                data  : {'user_id':user_id , '_token' : "{{ csrf_token() }}"},







                success : function(res){







                    if(res == 0){







                        $('.count_notify').remove();







                    }







                },







                error : function(error){







                    console.log(error + "worning read notification");







                }







            });







        });







        });







    </script>







@endsection