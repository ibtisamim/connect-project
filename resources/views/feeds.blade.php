@extends('layouts.main')

@section('title', '- Feeds')





@section('content')

{{--data-masonry='{"percentPosition": true }'--}}



<div class="row"  id="new_feeds" data-masonry='{"percentPosition": true  }'></div>
<div class="container mt-5" style="max-width: 550px">        
        <!-- Data Loader -->
{{--
        <button id="loadmore">Load More</button> --}}
        <div class="auto-load text-center">
            <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">

                <path fill="#000"
                    d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                    <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                        from="0 50 50" to="360 50 50" repeatCount="indefinite" />

                </path>
            </svg>
        </div>
</div>


{{-- start model apply job --}}

<div class="modal fade" id="rfq" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog ">
<div class="modal-content">







    <div class="modal-header">







       <h1>Apply for RFQ</h1>







    </div>







<div class="modal-body">







    @if(Auth::user()->WorkExperiences()->count() > 0)







<form action="{{ route('user.applyrfq') }}" method="POST"  enctype="multipart/form-data"  >    







@csrf







 <div class="info_user">







  <img src="/img/user_image.png" alt="user_img">







  <h6>{{Auth::user()->name}}  <br/>







  @if(Auth::user()->WorkExperiences()->count() > 0)







  <span>{{Auth::user()->WorkExperiences()->where('ongoing','1') ? Auth::user()->WorkExperiences()->where('ongoing','1')->first()->title : ''}} @ {{Auth::user()->WorkExperiences()->where('ongoing','1') ? Auth::user()->WorkExperiences()->where('ongoing','1')->first()->company : ''}}</span>







  @else







  <p>Please insert atleast one of your experiance</p>







  @endif







  </h6>







</div>







            <p>Please attach any relevent document here.</p>















<div class="edit_cover_div">







<h3>Drag and drop media files here.</h3>







<p>or Browse to choose from device</p>







<br/><br/><br/>







<p>Supported formats: .JPG, .PNG, .MP3, .MP4</p>







<div class="dropzone" id="id_dropzone2" ></div>







<div class="rfq_user_uoloades" ></div>







</div>







<br/>







<p>Send your company profile and attachment to the poster of this RFQ by clicking continue below.</p>







<center>







<button class="btn btn-primary" type="submit">Continue</button>   







</center>







</form>







@else







<p>Please insert atleast one of your experiance</p>







@endif







</div>







</div>        







</div>







</div>







{{-- end model apply job  --}}















@endsection





@section('popup_script')



<script>





$('.rfq_user_uoloades').hide();









$(document).on('click','.answerbtn',function () {



    $('input[name="question_id"]').val($(this).data('id'));

});





$(document).on('click','.applybtn',function () {







    $('input[name="job_id"]').val($(this).data('id'));







});







$(document).ready(function () {







    $("#id_dropzone2").dropzone({







        maxFilesize: 8,







        headers: {







        'X-CSRF-TOKEN': "{{ csrf_token() }}"







        },







        url: '{{ route('user.applyrfq') }}',







        success: function (file, response) {







            console.log(response);







            







        $('<input>').attr({







                    type: 'file',







                    id: 'rfq_user_uploade_file',







                    name: 'rfq_user_uploade_file[]',







                    value:response['success']







              }).appendTo('.rfq_user_uoloades');







      







        }







    });







    







});















        







</script>







<script>







var ENDPOINT = "{{ url('/') }}";







var page = 1;















$(document).ready(function () {







        infinteLoadMore(page);







});







        







     







$(document).on('click','#loadmore', (function(e){







     page++;







     infinteLoadMore(page);







}));























$(window).scroll(function () {







    if ($(window).scrollTop() + $(window).height() >= $(document).height())  {







        page++;







        infinteLoadMore(page);







    }







});























function infinteLoadMore(page) {







    $.ajax({







            url: ENDPOINT + "/index?page=" + page,







            datatype: "html",







            type: "get",







            beforeSend: function () {







                $('.auto-load').show();







            }







        })







        .done(function (response) {







            console.log(page);







            if (response.length == 0) {







                $('.auto-load').html("We don't have more data to display :(");







                return;







            }







            $('.auto-load').hide();







            $("#new_feeds").append(response);







        })







        .fail(function (jqXHR, ajaxOptions, thrownError) {







            console.log('Server error occured');







        });







}







        































</script>















   







@stop