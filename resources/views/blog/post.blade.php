@extends('layouts.main')
@section('title')
{{'-'}} {{$post->title}}
@endsection
@section('meta')
<meta property="og:url" content="{{url(date_format($post->created_at,'Y/m/d').'/'.$post->slug)}}" />
<meta property="og:type" content="article" />
<meta property="og:title"   content=" {{$post->title}}" />
<meta property="og:description"    content="{!!Str::limit($post->body, $limit = 150, $end = '... ')!!}" />
@if (strpos($post->thumb, 'http') !== false)
<meta property="og:image"  content="{{$post->thumb}}" /> 
@else
<meta property="og:image"  content="{{$post->thumb}}" />
@endif
@endsection
@section('content')

<div class="background-home" style="margin-top:0px">
<article id="article">
<div class="col-md-12">
<ol class="breadcrumb">
  <li><a href="/">Connect Home</a></li><i class="fa fa-angle-right" aria-hidden="true"></i>
  <li><a href="/blog">Blog</a></li><i class="fa fa-angle-right" aria-hidden="true"></i>
  <li><a href="{{ url('/'.$post->slug) }}">{{$post->title}}</a></li>
</ol>



</div>



<div class="row col-md-12">



<p class="main-title"><a href="{{ url('/'.$post->slug) }}">{{ $post->title }}</a></p>



<p class="date-style">{{ $post->created_at->format('M d,Y \a\t h:i a') }} </p>



</div>







{!! $post->body !!}







{{-- gallery section --}}



@php $card_col = 'col-lg-12' ; @endphp



    @if(($post->has('gallery')) && ($post->Gallery()->count() > 0))



      <div class="col-lg-12 projectname_frontend_page">



        <div id="gallery_area_post">



        <h1>Gallery</h1>



        <div class="products_project">



          <div class="owl-carousel front-end-page owl-theme">



            @foreach($post->gallery as $gallery)



            <div>



                <img src="{{url("uploads/".$gallery->media()->first()->id.'/'.$gallery->media()->first()->file_name)}}" alt="{{$gallery->title}}" title="{{$gallery->title}}" style="max-height:300px">



            </div>



            @endforeach



          </div>



        </div>



       </div>



      </div>



@endif







{{-- info post section section --}}

<div id="post_summery_info">
  <div>{{$post->likes}} Likes</div>
  <div>35 Shares</div>
  <div>{{$post->comments()->count()}} Comments</div>
</div> 


<div style="position: relative;  ">
<div class="col-md-12 pt-3" id="post_shar_like_infooter">
<div class=" col-md-6 text-center">
  @if(Auth::user())
  @php $users_liked_ids =  Auth::user()->PostLike()->pluck('post_id')->toArray(); @endphp
  @if(in_array($post->id,$users_liked_ids)) 
   <a href="popstunlike/{{$post->id}}" class="btn postlikebtn">
  <img src="{{asset('css/assets/website-icons/Like.svg')}}" width='15' style="margin-right: 10px;"/>dislike</a>
  @else
 <a href="popstlike/{{$post->id}}" class="btn postlikebtn">
  <img src="{{asset('css/assets/website-icons/Like.svg')}}" width='15' style="margin-right: 10px;"/>Like</a>
  @endif
  @else
 <a href="" class="btn postlikebtn sign_in_popup" data-bs-toggle="modal" data-bs-target="#registerModal">
  <img src="{{asset('css/assets/website-icons/Like.svg')}}" width='15'/>Like</a>
  @endif
</div>
<div class=" col-md-6 text-center">
    <a href="#" class="btn sharebtn" data-bs-toggle="modal" data-bs-target="#sharemodel" data-link ='{{$post->sharelink}}'><img src="{{asset('css/assets/website-icons/share.svg')}}" width='15' style="margin-right: 10px;"/>Share</a>
</div>
</div>



</div>
</article>
{{-- comments section --}}
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
            <form action="{{route('postcomment.add')}}"  method="POST">
               @csrf 
               <input name="post_id" type="hidden" value="{{$post->id}}">
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

       @if($post->CommentsApproved()->count() > 0) 
        @foreach($post->commentsapproved as $comment)

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



            <p class="comment">{!!$comment->description !!}



            @if($comment->updated_at != NULL)



            <strong style="text-decoration: underline;">Edited</strong>



            @endif



            </p>



          </div> 



          @if(Auth::user())



          @if(Auth::user()->id == $comment->User()->first()->id)



           <div class="dropdown" style="position: absolute; right:0; top:1em;">



            <a href="#" class="infoUdots manage_btn_menu"><i class="fas fa-ellipsis-h"></i></a>



           <ul class="dropdown-menu style_drop_project" aria-labelledby="dropdownMenuButton1" style="right: 1em; top:1em">



              <li>



                <a href="#" type="button"  class="editcomment" data-bs-toggle="modal" data-bs-target="#edit_comment" data-object='{{$comment}}'>Edit</a>



              </li>



              <li><a href="/comment/delete/{{$comment->id}}" >Delete</a></li>



            </ul> 



          </div>



          @endif



          @endif



        </div>



        @endforeach



        @else



        <p>No comments in this post</p>



        @endif



      </div>



    </div>



</div>















{{-- start  edit comment --}}



<div class="modal fade" id="edit_comment" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">



<div class="modal-dialog modal-l">



<div class="modal-content">



<div class="modal-header">Edit Comment</div>



<div class="modal-body">



<form action="{{route('postcomment.edit')}}" method="POST" enctype="multipart/form-data">



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







{{-- start  model share --}}
<div class="modal fade" id="sharemodel" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-l">
<div class="modal-content">
<div class="modal-header"></div>
<div class="modal-body">
 <div class="sharediv"></div>                
</div>
<div class="modal-footer"></div>
</div>        
</div>
</div>

{{-- end model share --}}   







@endsection















@section('popup_script')







<script>                  



$('.sharebtn').click(function(){



    var object = $(this).data('link');



    $('.sharediv').html(object);



});











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











$(document).ready(function(){



$('.front-end-page').owlCarousel({



  loop:true,



  margin:20,



  nav:true,



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



});







</script>



@endsection   































































