@extends('layouts.main')
@section('title')
{{'-'}} {{$job->title}}
@endsection
@section('meta')
<meta property="og:url" content="{{url('jobdetails/'.$job->id)}}" />
<meta property="og:type" content="article" />
<meta property="og:title"   content=" {{$job->title}}" />
<meta property="og:description"    content="{!!Str::limit($job->description, $limit = 150, $end = '... ')!!}" />
<meta property="og:image"  content="/img/logo-icon.png" /> 
@endsection



@section('content')
<div class="background-home" style="padding-top:0px; margin-top:0px">
<article id="article">



<div class="col-md-12">



<ol class="breadcrumb">



  <li><a href="/">Connect Home</a></li><i class="fa fa-angle-right" aria-hidden="true"></i>



  <li><a href="{{ url('jobdetails/'.$job->id) }}">Job Post</a></li>



</ol>



</div>







<div class="row col-md-12">
    <div class="col-md-6">
        <p class="main-title">{{ $job->title }}</p>
<p class="date-style">{{ $job->created_at->format('M d,Y \a\t h:i a') }} </p>
<div class="jobdetails descripton">{!! $job->description !!}</div>

    </div>
    <div class="aboutcompany">
        <h1>About the Company</h1>
        <div class="jobdetails info_user">
            <a href="/user/{{$job->user->id}}">

          @if($job->user->photo)
           @php $bg = $job->user->photo; @endphp
           @else
              @php $bg = "asset('img/user_image.png')"; @endphp
            @endif
          <div class="hexagon" style=" background-image: url('{{$bg}}'); ">
            <div class="hexTop"></div>
            <div class="hexBottom"></div>
          </div>
          <p class="date">{{$job->user->name}}</p>
          <span class="date">38 Followers</span>
          <span class="date">38 Projects</span>
         </a>
        </div>
        <p>

            @if($job->User()->first()->profile()->first())
        
                {!!Str::limit($job->User()->first()->profile()->first()->job_description, $limit = 150, $end = '... ')!!}

            @endif

        </p>
    </div>

</div>


{{-- gallery section --}}



@php $card_col = 'col-lg-12' ; @endphp

@if($job->photo)
      <div class="col-lg-12 projectname_frontend_page">
        <div id="gallery_area_post">
        <h1>Gallery</h1>
        <div class="products_project">
          <div class="owl-carousel front-end-page owl-theme">

            @foreach($job->photo as $gallery)
            <div>
                <img src="{{$gallery}}"  style="max-height:300px">
            </div>

            @endforeach
          </div>

        </div>
       </div>
      </div>

@endif







{{-- info post section section --}}







<div id="post_summery_info">



  <div>65 Applicants</div>



  <div>35 Shares</div>



</div> 











<div style="position: relative;">



<div class="col-md-12 pt-3" id="post_shar_like_infooter">



  



   



<div class=" col-md-6 text-center">



 <a href="#" class="btn postlikebtn" data-id='{{$job->id}}' data-bs-toggle="modal" data-bs-target="#job_apply">



  <img src="{{asset('css/assets/website-icons/apply.svg')}}" width='15'/>Apply</a>



</div>







<div class=" col-md-6 text-center">



    <a href="#" class="btn sharebtn" data-bs-toggle="modal" data-bs-target="#sharemodel" data-link ='{{$job->sharelink}}'><img src="{{asset('css/assets/website-icons/share.svg')}}" width='15'/>Share</a>



</div>







</div>



</div>







</article>















</div>























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































































