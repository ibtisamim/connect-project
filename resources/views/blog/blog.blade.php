



@extends('layouts.main')



@section('title', '- Blog')



@section('content')



<div class="background-home" style="padding-top:0px; margin-top: 0;">



    @if (!$posts->count())



    There is no post till now. Login and write a new post now!!!



    @else



    <div class="contact_us_bg">



     {{-- <div class=" bg_content_contact firstcol">



        <div class="col-md-12 col-sm-12">



           @include('layouts.public_sidebar')



       </div>



   </div> --}}





   <div class="">



    <div class=" bg_content_contact justify-content-between p-3 col-md-12">



        <div class="row">



            <div class="col-md-12">



                <ol class="breadcrumb">



                    <li><a href="/">Connect Home</a></li><i class="fa fa-angle-right" aria-hidden="true"></i>



                    <li><a href="/blog">Blog</a></li>







                </ol>







            </div>







            <div class="col-md-12 row" style="padding-right: 0px;">



                <p class="main-title col-md-4 ">Our Blog</p>



                <p class="col-md-4"></p>



                <p class="followarea col-md-4">



                @if(Auth::guest())



                     <a href="#" class="btn btn-primary sign_in_popup" data-bs-toggle="modal" data-bs-target="#registerModal" >Follow</a>



                @else 



                    @php $following_ids =  Auth::user()->blogsFollowing()->pluck('followable_id')->toArray(); @endphp



                    @if(in_array($blog->id,$following_ids))  

                    <a href="{{route('blog.unfollow')}}" class="btn btn-primary sign_in_popup"> Unfollow</a>

                    @else 

                   <a href="{{route('blog.follow')}}" class="btn btn-primary sign_in_popup"> Follow</a>

                    @endif







                @endif



                </p>



            </div>



        </div>















        <div class="col-md-12 col-sm-12">



            <div class="content_info_contact">



              @foreach( $posts as $post )



              <div class="col-md-12 blog-post">



                <div class="row blog-post-inner">



                <div class="col-md-4">



                    @if($post->thumb)



                    <img src="{{$post->thumb}}" class="img-thumbnail">



                    @else



                    <img src="{{asset('img/no-cover.png')}}" class="img-thumbnail">



                    @endif



                </div>







                <div class="col-md-8">



                    <div class="row">



                      <h3><a href="{{ route('post.view',$post->slug) }}" class="main-title-post">{{ $post->title }}</a></h3>



                      <p class="p-date">{{ $post->created_at->format('M d,Y \a\t h:i a') }} 



                       <a href="#" class="btn sharebtn" data-bs-toggle="modal" data-bs-target="#sharemodel" data-link ='{{$post->sharelink}}'><img src="{{asset('css/assets/website-icons/share.svg')}}" width='15'/></a>



                      </p>



                    </div>











                  <div class="row">



                    <article>



                        {!! Str::limit($post->body, $limit = 250, $end = '... ')!!}



                        <a href="{{ route('post.view',$post->slug) }}" id="readmor-post-blog">Read More</a> 



                    </article>



                  </div>







            </div>



        </div>



    </div>







@endforeach



</div>



</div>



</div>



</div>



</div>







{!! $posts->render() !!}







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



@endif                



</div>



@endsection



@section('popup_script')



<script>                  



$('.sharebtn').click(function(){



    var object = $(this).data('link');



    $('.sharediv').html(object);



});



</script>



@stop



