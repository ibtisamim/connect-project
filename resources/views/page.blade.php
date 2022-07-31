@extends('layouts.main')

@section('title')

{{'-'}} {{$page->title}}

@endsection



@section('content')



<div class="term_and_condition_bg">



    <div class=" bg_content_contact firstcol">



        <div class="col-md-12 col-sm-12">



         @include('layouts.public_sidebar')



        </div>



    </div>



            



    <div class="row">



        <div class="bg_content_contact justify-content-between p-3 col-md-12">



        <div class="col-md-12">

        <ol class="breadcrumb">

            <li><a href="/">Connect Home</a></li><i class="fa fa-angle-right" aria-hidden="true"></i>

            <li><a class="breadcrumb_sub-page" href="{{$page->url}}">{{$page->title}}</a></li>

        </ol>

        </div>



        <h1><strong>{{$page->title}}</strong></h1>



            <div class="col-lg-12">



                <div class="term_condition">



                   {!! $page->description !!}



                    @if($page->id == 15)



                    <div class="row justify-content-center section_three">



                      <div class="col-lg-12">



                            <div class="our_partner_title">



                             Browse our suite of services



                            </div>



                      </div>



                      <div class="col-lg-12 section_three_partner">



                        <div class="owl-one owl-carousel  owl-theme">



                            



                            @foreach( $partners as $partner)   



                            <div class="item">



                                <div class="partner">



                                    <a href="{{$partner->link}}" title="{{$partner->title}}" ><img src="{{url($partner->image)}}" alt="{{$partner->title}}"></a>



                                </div>



                            </div>



                            @endforeach



                        </div>



                      </div>



                  </div>



                  @endif



      



                </div>



            </div>



        </div>



    </div>



</div>



@endsection











@section('popup_script')



<script>



 $(document).ready(function(){



    $('.owl-one').owlCarousel({



      loop:true,



      margin:5,



      nav:false,



      responsive:{



        0:{



          items:1



        },



        600:{



          items:2



        },



        1000:{



          items:7



        }



      }



    });



  });



</script>







@endsection















