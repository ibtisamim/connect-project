  {{-- navabar  --}}
@php $admin = Auth::guard('admin')->user(); @endphp
<div class="header-navbar-shadow"></div>
<nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu
@if(isset($configData['navbarType'])){{$configData['navbarClass']}} @endif"
data-bgcolor="@if(isset($configData['navbarBgColor'])){{$configData['navbarBgColor']}}@endif">
  <div class="navbar-wrapper">
    <div class="navbar-container content">
      <div class="navbar-collapse" id="navbar-mobile">
       <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center"></div> 
        
        <ul class="nav navbar-nav float-right">
          @if($admin)
          <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon bx bx-bell bx-tada bx-flip-horizontal"></i>
         
          <span class="badge badge-pill badge-danger badge-up"> {{ $admin->unreadNotifications->count()  }}</span></a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
              <li class="dropdown-menu-header">
                <div class="dropdown-header px-1 py-75 d-flex justify-content-between"><span class="notification-title"> {{ $admin->unreadNotifications->count()  }} new Notification</span><span class="text-bold-400 cursor-pointer">Mark all as read</span></div>
              </li>
              <li class="scrollable-container media-list">
                  @foreach($admin->unreadNotifications as $notification)
                  <a class="d-flex justify-content-between" href="javascript:void(0)">
                  <div class="media d-flex align-items-center">
                    <div class="media-left pr-0">
                      <div class="avatar mr-1 m-0"><img src="{{asset('images/portrait/small/avatar-s-11.jpg')}}" alt="avatar" height="39" width="39"></div>
                    </div>
                    <div class="media-body">
                      <h6 class="media-heading">{{$notification->body}}</h6><small class="notification-text">Mar 15 12:32pm</small>
                    </div>
                  </div></a>
                @endforeach
              </li>
              <li class="dropdown-menu-footer"><a class="dropdown-item p-50 text-primary justify-content-center" href="javascript:void(0)">Read all notifications</a></li>
            </ul>
          </li>
          
          
       
          <li class="dropdown dropdown-user nav-item">
            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
              <div class="user-nav d-sm-flex d-none">
                <span class="user-name">{{$admin->name}}</span>
                {{--
              <span class="user-status text-muted">Available</span> --}}
            </div>
                @if($admin->has('media'))
                 <span><img class="round" src="{{$admin->photo}}" alt="avatar" height="40" width="40"></span>
                 @endif
           </a>
           
            <div class="dropdown-menu dropdown-menu-right pb-0">
             <a class="dropdown-item" href="{{route('profile',$admin->id)}}">
               <i class="bx bx-user mr-50"></i> Edit Profile
             </a>
            
             <a class="dropdown-item" href="#"><i class="bx bx-message mr-50"></i> Chats</a>
              <div class="dropdown-divider mb-0"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="bx bx-power-off mr-50"></i>Sign Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>

            </div>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </div>
</nav>
