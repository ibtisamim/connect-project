


<ul>
  <li><a href="{{route('overview',$project->id)}}"  @if(Route::is('overview')) class="active" @endif>Overview</a></li>
 
 <!-- <li><a href="{{route('update_project.index',$project->id)}}" @if(Route::is('update_project.index')) class="active" @endif>Updates</a></li>
  
  <li><a href="{{route('analytics.index',$project->id)}}" @if(Route::is('analytics.index')) class="active" @endif>Analytics</a></li> -->
  <li><a href="{{route('setting_project.index',$project->id)}}"  @if(Route::is('setting_project.index')) class="active" @endif>Setting</a></li>
  

  
</ul>
