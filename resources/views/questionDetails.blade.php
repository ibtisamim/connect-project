@extends('layouts.main')
@section('title')
{{'-'}} {{$question->title}}
@endsection
@section('meta')
<meta property="og:url" content="{{url(date_format($question->created_at,'Y/m/d').'/'.$question->id)}}" />
<meta property="og:type" content="article" />
<meta property="og:title"   content=" {{$question->title}}" />
<meta property="og:description"    content="{!!Str::limit($question->description, $limit = 150, $end = '... ')!!}" />
<meta property="og:image"  content="/img/logo-icon.png" /> 


@endsection



@section('content')

<div class="background-home" style="margin-top:0px">
<article id="article">
<div class="col-md-12">
<ol class="breadcrumb">
  <li><a href="/">Connect Home</a></li><i class="fa fa-angle-right" aria-hidden="true"></i>
  <li><a href="#">{{$question->title}}</a></li>
</ol>
</div>

<div class="row col-md-12">
<p class="main-title">{{ $question->title }}</p>
<p class="date-style">{{ $question->created_at->format('M d,Y \a\t h:i a') }} </p>
</div>

{!! $question->description !!}
{{-- gallery section --}}
@php $card_col = 'col-lg-12' ; @endphp
    
      <div class="col-lg-12 projectname_frontend_page">
        <div id="gallery_area_post">
        <h1>Gallery</h1>
        <div class="products_project">
          <div class="owl-carousel front-end-page owl-theme">
            @php $ids = explode('-',$question->gallery_ids); 
              @endphp


            @foreach($question->User()->first()->getMedia('questiongallary')->whereIn('id',$ids) as $img)
            <div style="max-height:300px; overflow:hidden">
               {{$img}}
            </div>
            @endforeach
          </div>
        </div>
       </div>
      </div>



{{-- info section --}}

<div id="post_summery_info">
  <div>35 Shares</div>
  <div>{{$question->Answer()->count()}} Answer</div>
</div> 



<div style="position: relative;  ">
<div class="col-md-12 pt-3" id="post_shar_like_infooter">


<div class=" col-md-6 text-center">

 <a href="#" class="btn postlikebtn">

  <img src="{{asset('css/assets/website-icons/Like.svg')}}" width='15'/>Answer</a>
</div>

<div class=" col-md-6 text-center">
    <a href="#" class="btn sharebtn" data-bs-toggle="modal" data-bs-target="#sharemodel" data-link ='{{$question->sharelink}}'><img src="{{asset('css/assets/website-icons/share.svg')}}" width='15'/>Share</a>

</div>

</div>

</div>
</article>

 {{-- answers section --}}
      <div class="col-lg-12 projectname_frontend_page">
        @if(Auth::user())
        <div class="comment_box d-lg-flex d-xl-flex" style="margin-bottom:30px">
          <div class="img_user">
            @if(Auth::user())
            <div style="background:url('{{Auth::user()->photo}}')" class="user_profile_menu"></div>
            @else
            <div style="background:url('{{asset('img/user_image.png')}}')" class="user_profile_menu"></div>
            @endif   
          </div>

          <div class="input_comment">

            <form action="{{route('questionweb.Answer')}}"  method="POST">
               @csrf 

               <input name="question_id" type="hidden" value="{{$question->id}}">
               <input name="answer_text" class="form-control" type="text" placeholder="Leave a answer">

               <input id="addcomment" type="submit" class="btn btn-primary" value="Send"/>
            </form>
          </div>
        </div>
        @endif


    <div class=" comments_section">
        <h1>Answers</h1>
       @if($question->Answer()->count() > 0) 
        @foreach($question->Answer()->get() as $answer)
        <div class="comment_details">
          <div class="img_user_comment">
                 @if($answer->User()->first()->photo)
                  <img src="{{$answer->User()->first()->photo}}" alt="user_img">
                  @else
                  <img src="{{asset('/img/user_image.png')}}" alt="">
                  @endif
          </div>


          <div class="comment_info">
            <div class="comment_info_details">

              @if($answer->user()->first())



              <p>{{$answer->user()->first()->name}}</p>



              @else



              <p>Guest User</p>



              @endif



              <span>



                @php



                    $prev = \Carbon\Carbon::now();



                    $now = $answer->created_at;



                    $diff = $prev->longAbsoluteDiffForHumans($now, 2);



                    echo $diff;



                @endphp



              </span>



            </div>



            <p class="comment">{!!$answer->answer_text !!}



            @if($answer->updated_at != NULL)



            <strong style="text-decoration: underline;">Edited</strong>



            @endif



            </p>



          </div> 



          @if(Auth::user())



          @if(Auth::user()->id == $answer->User()->first()->id)



           <div class="dropdown" style="position: absolute; right:0; top:1em;">



            <a href="#" class="infoUdots manage_btn_menu"><i class="fas fa-ellipsis-h"></i></a>



           <ul class="dropdown-menu style_drop_project" aria-labelledby="dropdownMenuButton1" style="right: 1em; top:1em">



              <li>



                <a href="#" type="button"  class="editanswer" data-bs-toggle="modal" data-bs-target="#edit_comment" data-object='{{$answer}}'>Edit</a>



              </li>



              <li><a href="/deleteanswer/{{$answer->id}}" >Delete</a></li>



            </ul> 



          </div>



          @endif



          @endif



        </div>



        @endforeach



        @else



        <p>No answers in this questions</p>



        @endif



      </div>



    </div>



</div>

{{-- start  edit answer --}}

<div class="modal fade" id="edit_comment" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-l">
<div class="modal-content">
<div class="modal-header">Edit Answer</div>
<div class="modal-body">
<form action="{{route('answerweb.edit')}}" method="POST" enctype="multipart/form-data">
@csrf 
<div class="box_content">
<div class="row form-group">
<div class="description_feild">
  <input type="text" name="answer_text" class="form-control">
</div>
</div>
<input type="hidden" name="answer_id" id="comment_id" value="" />             
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

{{-- end model edit answer --}}  




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




$('.editanswer').click(function(){

    var object = $(this).data('object');
    $("input[name='answer_text']").val(object.answer_text);
    $("input[name='answer_id']").val(object.id);
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