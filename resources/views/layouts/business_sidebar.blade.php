<ul class="sidebar_business">
  <li><a href="{{route('business.dashboard')}}" @if(Route::is('business_setting.index')) class="active" @endif>Settings</a></li>
 
  <li><a href="{{route('all_project.index')}}" @if(Route::is('all_project.index')) class="active" @endif>All Projects</a></li>
  
  <!--<li><a href="{{route('overview_project.index')}}" @if(Route::is('overview_project.index')) class="active" @endif>Overview</a></li> -->

  <li><a href="{{route('employees')}}" @if(Route::is('employees')) class="active"  @endif>Employees</a></li>
  
  {{-- <li><a href="#" >Calender</a></li> --}}

</ul>
