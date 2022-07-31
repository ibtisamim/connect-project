@foreach($project->members as $member)
<div class="card col-md-2">
<a href="/user/{{$member->id}}">
<div  class="card-img-top"><img  src="{{asset('img/Image.png')}}" alt=""></div>
<div class="card-body">
 <div class="info_user_box">
     @if($member->photo)
     <img src="{{$member->photo}}" alt="user_img">
     @else
     <img src="{{asset('img/user_image.png')}}" alt="user_img">
     @endif
     <h6 class=" d-none d-lg-flex d-xl-flex">{{$member->name}}</h6>
     <p class="card-text">{{$member->pivot->role}} @ {{$member->company}}</p>
   </div>
</div>
</a>  
</div>
@endforeach









