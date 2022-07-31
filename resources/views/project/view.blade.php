@extends('layouts.main')

@section('title', '- Project Details')
@section('meta')
<meta property="og:url" content="{{url(date_format($project->created_at,'Y/m/d').'/'.$project->slug)}}" />
<meta property="og:type" content="article" />
<meta property="og:title"   content=" {{$project->called}}" />
<meta property="og:description"    content="{!!Str::limit($project->description, $limit = 150, $end = '... ')!!}" />
@if (strpos($project->photo, 'http') !== false)
<meta property="og:image"  content="{{$project->photo}}" /> 
@else
<meta property="og:image"  content="{{url('img/project-cover-placeholder-8.png')}}" />
@endif
@endsection

@section('cover')

@if (($project->has('media')) && ($project->media()->first()))

{{-- {{$project->media()->first()}} --}}

<div class="cover" style="background-image:url('{{url("uploads/".$project->media()->first()->id.'/'.$project->media()->first()->file_name)}}')"> </div>

@else

<div class="cover" style="background-image:url('{{asset('img/no-cover.png')}}') ;     opacity: 0.1;"> </div>

@endif

@endsection

@section('content')

<div class="bg_front_end_page">

<div class="navbar_background">

    <div class="nav_page">

      <div class="content_nav_front_end">

        <h1>{{$project->called}}</h1>

        <div class="content_box">

            {{-- awards --}}

         @if ($project->has('awards')) 

         @foreach($project->awards as $award)

          <div class="box">

            <a href="{{$award->link}}" target="_blank">

            @if(($award->has('media')) && ($award->media()->first()))

            <img src="{{$award->photo}}" alt="{{$award->title}}">

            @endif

            <div class="info_user_box">

              <img src="{{asset('img/user_image.png')}}" alt="">

              <h6 class=" d-none d-lg-flex d-xl-flex">{{$award->title}} 

                 </h6>

            </div>







            </a>









          </div>







          @endforeach







          @endif







        </div>







        <a href="/follow/{{$project->id}}" class="style_follow_btn d-lg-none">Follow</a>


        <a href="#frontend_page">
        <svg class="arrows">

			<path class="a1" d="M0 0 L30 32 L60 0"></path>

			<path class="a2" d="M0 20 L30 52 L60 20"></path>

			<path class="a3" d="M0 40 L30 72 L60 40"></path>

		</svg>
  </a>






      </div>







    </div>























</div>















<div class="frontend_page" id="frontend_page">

<div class="row">

<div class="col-lg-12 projectname_frontend_page">

<div id="gallery_area" style="background: #ffffff69;">

<div class="projectname_dashbord_details">

<div class="projectname_dashbord_title">

<h2>{{$project->called}}</h2>

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

</div>



<div class="projectname_dashbord_button d-none d-lg-block d-xl-block">

@if(Auth::guest())

<a href="#" class="sign_in_popup" data-bs-toggle="modal" data-bs-target="#registerModal" id="followbtn"> Follow</a>

@else 

@php $following_projects_ids =  Auth::user()->following()->where('followable_type','app\Models\Project')->pluck('followable_id')->toArray();

@endphp

@if(in_array($project->id,$following_projects_ids))  

<a href="javascript:void(0)" class="btn btn-primary unfollowbtn" data-projectid = "{{$project->id}}" data-url="/unfollow/{{$project->id}}">Unfollow</a>

@else

<a href="javascript:void(0)" class="followbtn" data-projectid = "{{$project->id}}" data-url="/follow/{{$project->id}}" style="    float: inherit;"> Follow</a>

@endif

@endif

</div>

</div>



<div class="all_tage text-center   d-md-flex">

@foreach($project->categories as $cat)

<div class="tage">

<span> {{ \Illuminate\Support\Str::limit($cat->title, 200, $end='...') }} |</span>

</div>

@endforeach

</div>

@if($project->description != '')

<div class="projectname_frontend_page_description">

<p><span class="toogledescription" style=" font-size .25s,margin .25s,padding .25s,opacity .5s .25s">

{{ \Illuminate\Support\Str::limit($project->description, 420, $end='...') }}</span>



          @if(strlen($project->description) > 420)

            <span><a href="#" onclick="ShowFulldescription('{{$project->description}}'); return false;" class="fulldescription" >Show More</a></span>



            <span><a href="#" onclick="ShowShortdescription('{{ \Illuminate\Support\Str::limit($project->description, 420, $end='...') }}'); return false;" class="shortdescription">Show Less</a></span>

            @endif



</p>

</div>

@endif





<div class="projectname_frontend_page_feature">



  <div class="row">

    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-xm-12">

        <div class="up_div">

            <div class="qr_code ">

                   <img src="{{asset('generated/qr/'.$project->id.'_qrcode.png')}}" alt="">

            </div>

        </div>

    </div>



    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-xm-4">



            <div class="label_data">







                 <ul>







                   <li>Project ID:</li>







                   <li>Starting Date:</li>







                   <li>Ending Date:</li>







                   <li>Status:</li>







                   <li>Location:</li>







                 </ul>







               </div>







             </div>







             <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-xm-4">







               <div class="value_data">







                 <ul>







                   <li>{{$project->id}}</li>







                   <li>{{$project->start_date}}</li>







                   <li>{{$project->end_date}}</li>







                   <li>







                     @if($project->status == 0 )







                       Uncoming







                     @elseif($project->status == 1)







                       Completed







                     @elseif($project->status == 2)







                       Ongoing







                     @endif







                   </li>







                   <li>{{$project->located}}</li>







                 </ul>







               </div>







             </div>























              <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-xm-4">







               <div class="label_data">







                 <ul>







                   <li>Project ID:</li>







                   <li>Starting Date:</li>







                   <li>Ending Date:</li>







                   <li>Status:</li>







                   <li>Location:</li>







                 </ul>







               </div>







             </div>







            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xm-3">







               <div class="value_data">







                 <ul>







                   <li>{{$project->id}}</li>







                   <li>{{$project->start_date}}</li>







                   <li>{{$project->end_date}}</li>







                   <li>







                     @if($project->status == 0 )







                       Uncoming







                     @elseif($project->status == 1)







                       Completed







                     @elseif($project->status == 2)







                       Ongoing







                     @endif







                   </li>







                   <li>{{$project->located}}</li>







                 </ul>







               </div>







             </div>







           </div>







        </div>







      </div>







      </div>







    </div>







    @php $card_col = 'col-lg-12' ; @endphp







    @if(($project->has('gallery')) && ($project->Gallery()->count() > 0))







    <div class="row">







      <div class="col-lg-12 projectname_frontend_page">







        <div id="gallery_area">







        <h1>Gallery</h1>







        <div class="products_project">







          <div class="owl-carousel gallary-owl owl-theme">







            @foreach($project->gallery as $gallery)







            <div>







                <img src="{{url("uploads/".$gallery->media()->first()->id.'/'.$gallery->media()->first()->file_name)}}" alt="{{$gallery->title}}" title="{{$gallery->title}}" style="max-height:300px">







            </div>







            @endforeach







          </div>







        </div>







       </div>







      </div>







    </div>







  @endif







    <div class="row">







      <div class="col-lg-12 projectname_frontend_page">







        <div id="gallery_area">







        <h1 class="style_mobile_title">Similar Project</h1>







        <div class="products_project">







        <div class="owl-carousel front-end-page owl-theme">







        @if(count($similar_projects) > 0)







        @php $class = 'col-md-12 col-lg-12'; @endphp







         @foreach( $similar_projects as $project)    







          @include('card')







          @endforeach







         







         @else







         <p>Not found similar</p>







         @endif







        </div>

        </div>

        </div>

      </div>

    </div>









 {{-- comments section --}}

    <div class="row">



      <div class="col-lg-12 projectname_frontend_page">



        @if(Auth::user())



        <div class="comment_box d-lg-flex d-xl-flex" style="margin-bottom:30px">
          <div class="img_user">
                   @if(Auth::user()->photo)
                   @php $bg = Auth::user()->photo; @endphp
                   @else
                      @php $bg = "asset('img/user_image.png')"; @endphp
                    @endif
                  <div class="hexagon" style=" background-image: url('{{$bg}}'); ">
                    <div class="hexTop"></div>
                    <div class="hexBottom"></div>
                  </div>
          </div>
          <div class="input_comment">
            <form action="{{route('comment.add')}}"  method="POST">
               @csrf 
               <input name="create_project_id" type="hidden" value="{{$project->id}}">
               <input name="status" type="hidden" value="approved">
               <input name="approved" type="hidden" value="1">
               <input name="description" class="form-control" type="text" placeholder="Leave a comment">
               <input id="addcomment" type="submit" class="btn btn-primary" value="Send"/>
            </form>
          </div>
        </div>
        @endif
    <div class=" comments_section">



        <h1>Comments</h1>



        <div class="mobile_input_comment_user d-lg-none d-xl-none">



          <div class="form_comment">

            <img src="{{asset('img/user_image.png')}}" alt="user_imgae">

            <input type="text" class="form-control" placeholder="Leave a comment"/>

          </div>

        </div>





       @if($project->CommentsApproved()->count() > 0) 

        @foreach($project->commentsapproved as $comment)
        <div class="comment_details">
          <div class="img_user_comment">
                 @if($comment->User()->first()->photo)
                   @php $bg = $comment->User()->first()->photo; @endphp
                   @else
                      @php $bg = "asset('img/user_image.png')"; @endphp
                    @endif
                  <div class="hexagon" style=" background-image: url('{{$bg}}'); ">
                    <div class="hexTop"></div>
                    <div class="hexBottom"></div>
                  </div>
                 
          </div>

          <div class="comment_info">
            <div class="comment_info_details">
              @if($comment->user()->first())
              <p>{{$comment->user()->first()->name}}</p>
              @else
              <p>Guest User</p>
              @endif
              <span>
                @php
                    $prev = \Carbon\Carbon::now();
                    $now = $comment->created_at;
                    $diff = $prev->longAbsoluteDiffForHumans($now, 2);
                    echo $diff;
                @endphp
              </span>
            </div>

            <p class="comment">{{$comment->description}}
            @if($comment->updated_at != NULL)
            <strong style="text-decoration: underline;">Edited</strong>
            @endif
            </p>
          </div> 


          @if(Auth::user())
          @if(Auth::user()->id == $comment->User()->first()->id)



           <div class="dropdown" style="position: absolute; right:0; top:1em;">



            <a href="#" class="infoUdots manage_btn_menu">



              <i class="fas fa-ellipsis-h"></i>



            </a>







       <ul class="dropdown-menu style_drop_project" aria-labelledby="dropdownMenuButton1" style="right: 1em; top:1em">



          <li>



            <a href="#" type="button"  class="editcomment" data-bs-toggle="modal" data-bs-target="#edit_comment" data-object='{{$comment}}'>Edit</a>



          </li>



          <li>



            <a href="/comment/delete/{{$comment->id}}" >Delete</a>



          </li>



        </ul> 



      </div>



          @endif



          @endif



        </div>



        @endforeach



        @else



        <p>No comments in this project</p>



        @endif







      </div>



    </div>



  </div>



</div>



</div>















{{-- start  edit comment --}}







<div class="modal fade" id="edit_comment" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">



<div class="modal-dialog modal-l">



<div class="modal-content">



<div class="modal-header">Edit Comment</div>







<div class="modal-body">



 <form action="{{route('comment.edit')}}" method="POST" enctype="multipart/form-data">



@csrf 







<div class="box_content">



<div class="row form-group">



<div class="description_feild">



  <input type="text" name="descriptionedit" class="form-control">



</div>



</div>



<input type="hidden" name="comment_id" id="comment_id" value="" />             



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



{{-- end model edit comment --}}  



@endsection











@section('popup_script')



<script>



$('.editcomment').click(function(){



    var object = $(this).data('object');



    $("input[name='descriptionedit']").val(object.description);



    $("input[name='comment_id']").val(object.id);







});











$('.manage_menu').hide();



$(".infoUdots").on("click",function(event){



    event.preventDefault();



    $(this).next().toggle();



});















$(".infoU.manage_btn_menu").on("click",function(event){







    event.preventDefault();



    $('.manage_menu').toggle();







});















$('.shortdescription').hide();







function ShowFulldescription($description){







    $(".toogledescription").css('opacity' , '0');







    $(".toogledescription").text($description);







    setTimeout(function(){ $(".toogledescription").css('opacity' , '1'); }, 300);







  







    $('.shortdescription').show();







    $('.fulldescription').hide();







    return false;







}















function ShowShortdescription($description){







    $(".toogledescription").css('opacity' , '0');







    $(".toogledescription").text($description);







    setTimeout(function(){ $(".toogledescription").css('opacity' , '1'); }, 300);







    $('.shortdescription').hide();







    $('.fulldescription').show();







    return false;







}















$(document).ready(function(){







$('.front-end-page').owlCarousel({



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



      items:3



    }



  }







});







$('.gallary-owl').owlCarousel({



    loop:false,



    margin:10,



    nav:true,



    dots:false,



    responsive:{



        0:{



            items:1



        },







        600:{



            items:1



        },







        1000:{



            items:2



        }



    }



});











});







  







</script>















@endsection







