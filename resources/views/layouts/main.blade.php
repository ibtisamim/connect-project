<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Connect @yield('title')</title>

  @yield('meta')  

  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  @yield('script')

  <link rel="stylesheet" href="{{asset('css/all.min.css')}}" />

  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

  <link rel="stylesheet" href="{{asset('css/chat.css')}}">

  <link rel="stylesheet" href="{{asset('css/custom-container.css')}}">

  <link rel="stylesheet" href="{{asset('css/main.css')}}">

  <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">

  <link rel="stylesheet" href="{{asset('css/select2.min.css')}}"/>

  <link rel="stylesheet" href="{{asset('css/style.css')}}">

  <link rel="stylesheet" href="{{asset('css/style_popUp.css')}}">

  <link rel="stylesheet" href="{{asset('flags-css/assets/docs.css')}}">

  <link rel="stylesheet" href="{{asset('flags-css/css/flag-icon.css')}}">

  {{-- must replaced --}}

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">

  @if(isset($canonical))

    <link rel="canonical" href="{{ $canonical }}" />

  @endif

</head>



@php $class = ''; $style =""; @endphp

@if ( Route::current())

@if  (Auth::guest())

@php $class = 'unregistered'; @endphp
@else
@php $style ="padding-top: 3em"; @endphp
@endif

@endif





<body class="{{$class}}" style="{{$style}}">  

@include('sweetalert::alert')

@include('layouts.nav-desktop')

@include('layouts.nav-mobile')  

@yield('cover') 

<div class="container" id="main_content">

@section('sidebar')

@show      

@yield('breadcrumbs')

@yield('content')

</div>



{{-- include modals file --}}

@include('layouts.all-modals')

<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>

<script src="{{asset('js/select2.min.js')}}"></script>

<script src="{{asset('js/jquery.fn.gantt.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 

<script src="{{asset('js/custom_pop_up.js')}}"></script>

<script src="{{asset('js/main.js')}}"></script>

<script src="{{asset('js/owl.carousel.min.js')}}"></script>

<script src="{{asset('flags-css/assets/docs.js')}}"></script>



<script>

$(document).ready(function() {



    $(".request_project_select").select2({

      dropdownParent: $('#request_project_main'),

      placeholder: "Select",

      allowClear: true,

      tags: true

    });

    $(".request_project_user_select").select2({

      dropdownParent: $('#users_invites'),

      placeholder: "Select",

      allowClear: true,

      tags: true

    });



    $(".category_project_select2").select2({

      dropdownParent: $('#create_project'),

      placeholder: "Select",

      maximumSelectionLength: 3,

      allowClear: true,

      tags: true

    });





    $(".category_select2").select2({

      dropdownParent: $('#job_offer'),

      placeholder: "Select a state",

      maximumSelectionLength: 2,

      allowClear: true,

      tags: true

    });





    $(".report_reason_select2").select2({

      dropdownParent: $('#report_reasonsModal'),

      placeholder: "Select a report reason",

      maximumSelectionLength: 1,

      allowClear: true,

    });





    $(".hidden_reason_select2").select2({

      dropdownParent: $('#hidden_reasonsModal'),

      placeholder: "Select a hide reason",

      maximumSelectionLength: 1,

      allowClear: true,

    });





    /*







    $(".main_select").each(function(){

      $(this).select2({

        dropdownParent: $('#create_project .modal-content .body_page1'),

        placeholder:  $(this).attr('data-place-holder'),

        allowClear: true,

      });

    });





    $(".main_select").each(function(){

      $(this).select2({

        dropdownParent: $('#custom_popup_wbs1 .modal-content .modal-body'),

        placeholder:  $(this).attr('data-place-holder'),

        allowClear: true,

      });





    });*/





    /*end  popup desktop create project select2 feild */



});





// add media to project request

$(document).ready(function () {

 var myDropzone = new Dropzone("#requestproject_dropzone", {   

    autoProcessQueue: false,   

    acceptedFiles: ".jpeg,.jpg,.png,.pdf", 

    uploadMultiple: true,

    parallelUploads: 5,

    maxFiles: 5,

    addRemoveLinks: true,

  //  dictDefaultMessage: "Put your custom message here",

    headers: {

        'X-CSRF-TOKEN': "{{csrf_token()}}"

    },

    url: '{{ route('requestproject.media') }}',

   // params  : {request_project_id:$('#request_project_id').val() },

    success: function (file, response) {

        console.log(response);

        $('#request_project_main').modal('hide');      

    }

}); 

 





$('#submitrequestproject').on("click", function (e) {

    e.preventDefault();

    e.stopPropagation();

    $.ajax({

        url : "{{route('request_project_ds')}}",

        type : "POST",

        data  : $('#request_project_popup').serialize(),

        success : function(request_project_id){

            $('#request_project_id').val(request_project_id);

        myDropzone.on("sending", function (file, xhr, formData) {

            formData.append("request_project_id", request_project_id);

        });

                if (myDropzone.getQueuedFiles().length > 0) {                        

                    myDropzone.processQueue();  

                } else {                       

                    myDropzone.uploadFiles([]); //send empty 

                }                                    

        },

        error : function(error){

            console.log(error + "worning read notification");

        }

    });           

});



});



// add media to question

$(document).ready(function () {

    $("#question_dropzone").dropzone({

      //  autoProcessQueue: false,

        uploadMultiple: true,

        parallelUploads: 5,

        maxFiles: 5,

        addRemoveLinks: true,

        headers: {

        'X-CSRF-TOKEN': "{{ csrf_token() }}"

        },

    url: '{{ route('question.media') }}',

    success: function (file, response) {  

      $('<input>').attr({

            type: 'hidden',

            id: 'questionmedia_files',

            name: 'questionmedia[]',

            value: response['success']

      }).appendTo('.questions_media_div');

    }

  });





 var myDropzone_jobapply = new Dropzone("#joboffer_dropzone", {   

    autoProcessQueue: false,   

    acceptedFiles: ".jpeg,.jpg,.png,.pdf", 

    uploadMultiple: true,

    parallelUploads: 5,

    maxFiles: 5,

 //   addRemoveLinks: true,

  //  dictDefaultMessage: "Put your custom message here",

    headers: {

        'X-CSRF-TOKEN': "{{csrf_token()}}"

    },

    url: '{{ route('job.offermedia') }}',

    success: function (file, response) {

        console.log(response);

        $('#job_apply_form').modal('hide');      

    }

}); 





$('#job-apply-submit-btn').on("click", function (e) {

    e.preventDefault();

    e.stopPropagation();

    $.ajax({

        url : "{{route('job.apply')}}",

        type : "POST",

        data  : $('#job_apply_form').serialize(),

        success : function(job_apply_id){

        myDropzone_jobapply.on("sending", function (file, xhr, formData) {

            formData.append("job_apply_id", job_apply_id);

        });

                if (myDropzone_jobapply.getQueuedFiles().length > 0) {                        

                    myDropzone_jobapply.processQueue();  

                } else {                       

                    myDropzone_jobapply.uploadFiles([]); //send empty 

                }                                    

        },

        error : function(error){

            console.log(error + "worning read notification");

        }

    });           

});



});



$(document).ready(function(){

    $('#navbarDropdown').on('show.bs.dropdown', function (){

        var user_id = $(this).find("#read_notifications").data('id');

        $.ajax({

            url : "{{route('change_status_notification')}}",

            type : "POST",

            data  : {'user_id':user_id , '_token' : "{{ csrf_token() }}"},

            success : function(res){

                if(res == 0){

                    $('.count_notify').remove();

                }

            },

            error : function(error){

                console.log(error + "worning read notification");

            }

        });



    });

});





$('#save_project').on('click',function(e){

    console.log('save_project');

    $('#project_save_type').val('1');

    $('#create_project_popup').submit();

});







$('#draft_project').on('click',function(e){



    $('#project_save_type').val('0');

    $('#create_project_popup').submit();

});







$('.search-input').keypress(function (e) {







  if (e.which == 13) {







    $('.searchform').submit();







  }















});























$('#form_login').on('click',function(e){







   e.preventDefault();







   form_data =  $('#login').serialize();







   $.ajax({







       url : '/login',







       data: form_data,







       type: "POST",







       success : function(res){







          location.href = "/index";







       },







       error : function(err){







        $('#login_error_message').text('');







        if(err.status === 422){







            var err = eval("(" + err.responseText + ")"); //err.errors.email







            $('#login_error_message').text('Invalid username or password');







        }







       }







   });







});























/* load employees list by project */  







$(document).on('click','.employeeslist', (function(e){

    $currID = $(this).attr("data-id");

    $.post("{{route('employees.list')}}", {"id": $currID , "_token": "{{ csrf_token() }}"}, function (data){

       $('#user-data').html(data);

       $('.employeespobup').owlCarousel({

            loop:false,

            margin:20,

            nav:true,

                responsive:{

                0:{  items:1 },



                600:{

                        items:1

                    },

                    1000:{

                        items:3

                    }

                }

            });



    });



}));







/* load collection projects list */  







$(document).on('click','.collection_project_list_btn', (function(e){



    $currID = $(this).attr("data-id");

    $.post("{{route('collectionProjects.list')}}", {"id": $currID , "_token": "{{ csrf_token() }}"}, function (data) {

        $('.collection_project_list').html(data);



        $(".collection_project_list").owlCarousel();



      });

}));







































// use with collections of user slider







$('.front-end-page').owlCarousel({

    loop:false,

    margin:10,

    nav:false,

    responsive:{



        0:{

            items:1

        },



        600:{

            items:1

        },



        1000:{

            items:3

        }

    }

});





$('.front-end-page-collection').owlCarousel({

    loop:true,

    margin:10,

    nav:false,

    responsive:{



        0:{

            items:1

        },



        600:{

            items:1

        },



        1000:{

            items:3

        }

    }

});









//$('.followbtn').click(function(e){





$(document).on('click','.add_new_collection_link', (function(e){

  e.preventDefault();

  $('#add_collection_after_follow_project').modal('hide');

  $('#add_collection_after_follow_project').modal('hide');

  return false;

}));



$(document).on('click','.manage_btn_menu_card_action', (function(e){

  e.preventDefault();

  $(this).next('ul.manage_menu_card_action').toggle();

  return false;

}));















$(document).on('click','.followbtn', (function(e){







    e.preventDefault();







    console.log("Project  Followed Successfully!!");







    var project_id = $(this).data('projectid');







    var url = $(this).data('url');







    var obj = $(this);







    obj.html('<i class="fa fa-spinner" aria-hidden="true"></i>');







    $.ajax({







    type: 'GET',







    url: url,







    data: { "_token": "{{ csrf_token() }}" },







    cache: false,







    dataType: "json",







    success: function (data){







        console.log("Project "+project_id+" Followed Successfully!!");







        obj.attr('data-url','/unfollow/'+project_id);







        obj.addClass('btn');







        obj.addClass('btn-primary');







        obj.addClass('unfollowbtn');







        obj.html('Unfollow');







        obj.removeClass('followbtn');





        $('.projectidtocollection').val(project_id);

        $('#add_collection_after_follow_project').modal('toggle');







    }});







   return false;







}));















$(document).on('click','.unfollowbtn', (function(e){







  e.preventDefault();







  var project_id = $(this).data('projectid');







  var url = $(this).data('url');







  var obj = $(this);







  obj.html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');







   $.ajax({







    type: 'GET',







    url: url,







    data: { "_token": "{{ csrf_token() }}"},







    cache: false,







    dataType: "json",







    success: function (data){







        console.log("Project "+project_id+" un-Followed Successfully!!");







        obj.attr('data-url','/follow/'+project_id);







        obj.removeClass('btn');







        obj.removeClass('btn-primary');







        obj.addClass('followbtn');







        obj.html('Follow');    







        obj.removeClass('unfollowbtn');







    }







  });







  return false;







}));























</script>















<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/masonary.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>



@yield('employee_script')
@yield('notification')

<footer>

<div class="container">
  <div class="style_footer">
      <div class="row">
          <div class="col-md-3 col-sx-12 link" id="footer_block">

              <h3>Connect</h3>
              <a href="{{ route('page.show',[15, 'about-connect'])}}">About Connect</a>







              <a href="{{route('contact')}}">Contact Us</a>







              <p id="lang"><a href="#" class="active">EN</a> | <a href="#">AR</a> </p>







          </div>







          <div class="col-md-3 col-sx-12 link" id="footer_block">







              <h3>Learn</h3>







              <a href="/blog">Blog</a>







              <a href="{{route('support')}}">FAQ's</a>







              <a href="{{ route('page.show',[17, 'help-center'])}}">Help Center</a>







          </div>







          <div class="col-md-3 col-sx-12 link " id="footer_block">







              <h3>Legal</h3>







              <a href="{{ route('page.show',[12, 'privacy-policy'])}}">Privacy Policy</a>







              <a href="{{ route('page.show',[18, 'terms-conditions'])}}">Terms of Use</a>







          </div>







          <div class="col-md-3 col-offset-3 col-sx-12 lastfooterdiv">







              <div class="logo">







                  <a href="{{route('index')}}"><img src="{{asset('img/connect-logo.png')}}" class="img-responsive"></a>







                   @foreach($settings as $setting)







                      @if($setting->key == 'email' && $setting->value)







                      <a href="mailto:{{$setting->value}}">{{$setting->value}}</a>







                      @endif







                  @endforeach















                   @foreach($settings as $setting)







                      @if($setting->key == 'mobile' && $setting->value)







                      <a href="tel:{{$setting->value}}">{{$setting->value}}</a>







                      @endif







                  @endforeach















              </div>















          <div class="social_media">







              @foreach($settings as $setting)







               @if($setting->key == 'facebook' && $setting->value)







               <a href="{{$setting->value}}" class="me-2" target="_blank"><i class="fab fa-facebook-f icon-footer"></i></a>







               @endif















               @if($setting->key == 'instagram' && $setting->value)







               <a href="{{$setting->value}}" class="me-2" target="_blank"><i class="fab fa-instagram icon-footer"></i></a>







               @endif















               







               @if($setting->key == 'twitter' && $setting->value)







               <a href="{{$setting->value}}" class="me-2" target="_blank"><i class="fab fa-twitter icon-footer"></i></a>







               @endif















               @if($setting->key == 'pinterest' && $setting->value)







               <a href="{{$setting->value}}" class="me-2" target="_blank"><i class="fab fa-pinterest-p icon-footer"></i></a>







               @endif















               @if($setting->key == 'youtub' && $setting->value)







               <a href="{{$setting->value}}" class="me-2" target="_blank"><i class="fab fa-youtube icon-footer"></i></a>







               @endif















               @if($setting->key == 'linkedin' && $setting->value)







               <a href="{{$setting->value}}" class="me-2" target="_blank"><i class="fab fa-linkedin-in icon-footer"></i></a>







               @endif







              @endforeach







          </div>







        </div>







      </div>















      <div class="row done_footer">







          <div class="col-md-3 col-sx-12">







              <p><span style="float:left">Develop By <a href="https://www.josequal.com/" target="_blank">josequal</a></span></p>







          </div>















          <div class="col-md-6 col-sx-12"></div>







          <div class="col-md-3 col-sx-12">







             <p id="footercopyright">© 2021 Connect.com, Inc</p>







          </div>







      </div>







</div>







{{-- plus button scoope --}}



@if(Route::current())

@if((( Route::current()->getName() == 'index') && (Auth::user())) || (( Route::current()->getName() == 'home') && (Auth::user())))

<div class="button_menu2">

<a href="#" id="click_button" class="close"><i class="fas fa-plus"></i></a> 

<ul class="botton_menu_toggle"> 



@if(Auth::user()->profile()->first() != null)

@if(Auth::user()->role == 'business')

<li class="title_menu"><a href="#" type="button" class="create_project" data-bs-toggle="modal" data-bs-target="#create_project"><img src="{{asset('css/assets/website-icons/new-project.svg')}}" width="15" />Create Project</a></li>

<li><a href="#" type="button" class="request_project" data-bs-toggle="modal" data-bs-target="#job_offer">

<img src="{{asset('css/assets/website-icons/new-job.svg')}}" width="15" />Job Offers</a></li> 

@endif

<li><a href="#" type="button" class="request_project" data-bs-toggle="modal" data-bs-target="#request_project_main"><img src="{{asset('css/assets/website-icons/new-project.svg')}}" width="15" />Request Project</a></li>



<li><a href="#" type="button" class="request_project" data-bs-toggle="modal" data-bs-target="#new_question_modal"><img src="{{asset('css/assets/website-icons/new-project.svg')}}" width="15" />Ask Question</a></li>





@else  

@if(Auth::user()->role == 'business')



<li class="title_menu"><a href="#" type="button" data-toggle="tooltip" title="Please, complete your profile.">

<img src="{{asset('css/assets/website-icons/new-project.svg')}}" width="15" />Create Project</a></li>

<li><a href="#" type="button"  data-toggle="tooltip" title="Please, complete your profile." >

<img src="{{asset('css/assets/website-icons/new-job.svg')}}" width="15" />Job Offers</a></li>  

@endif







<li><a href="#" type="button" data-toggle="tooltip" ><img src="{{asset('css/assets/website-icons/new-project.svg')}}" width="15" />Request Project</a></li>







@endif {{-- check user profile --}}







</ul>







</div>







@endif 







@endif {{-- end of route current --}}







{{-- ../ end plus button scoope --}}







</div>







</footer>















<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>















<script>















$(document).ready(function(){







  $('[data-toggle="tooltip"]').tooltip();   







});















Dropzone.autoDiscover = false;







$(document).ready(function () {







  $("#file_dropzone").dropzone({







    maxFilesize: 8,







    headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },







    url: '{{ route('file.store') }}',







    acceptedFiles: ".jpeg,.jpg,.png,.gif",







    addRemoveLinks: true,







    maxFilesize: 8,







    headers: {







    'X-CSRF-TOKEN': "{{ csrf_token() }}"







    },















    removedfile: function(file , response){







      var name = file.upload.filename;







      var gallery_id = response['success'];







      $.ajax({







        type: 'POST',







        url: '{{ route('file.remove') }}',







        data: { "_token": "{{ csrf_token() }}", name: name , gallery_id:gallery_id},















        success: function (data){







            console.log("File has been successfully removed!!");







        },















        error: function(e) {







            console.log(e);







        }});







        var fileRef;







        return (fileRef = file.previewElement) != null ?







        fileRef.parentNode.removeChild(file.previewElement) : void 0;







    },







    success: function (file, response) {







      $('<input>').attr({







            type: 'hidden',







            id: 'galleries',







            name: 'galleries[]',







            value:response['success']







      }).appendTo('.project_gallery_div');







    },







  });







});















// drop zone for project gallary















$(document).ready(function () {







  $("#job_offer").dropzone({







        maxFilesize: 8,







        headers: {







        'X-CSRF-TOKEN': "{{ csrf_token() }}"







        },







        url: '{{ route('jobfile.store') }}',







        acceptedFiles: ".jpeg,.jpg,.png,.gif",







        addRemoveLinks: true,







        maxFilesize: 8,







        headers: {







        'X-CSRF-TOKEN': "{{ csrf_token() }}"







        },















      removedfile: function(file , response){







        var name = file.upload.filename;







        var gallery_id = response['success'];















        $.ajax({







          type: 'POST',







          url: '{{ route('file.remove') }}',







          data: { "_token": "{{ csrf_token() }}", name: name , gallery_id:gallery_id},







          success: function (data){







              console.log("File has been successfully removed!!");







          },















          error: function(e) {







              console.log(e);







          }});







          var fileRef;







          return (fileRef = file.previewElement) != null ?







          fileRef.parentNode.removeChild(file.previewElement) : void 0;







      },















      success: function (file, response) {







        $('<input>').attr({







              type: 'hidden',







              id: 'galleries',







              name: 'galleries[]',







              value:response['success']







        }).appendTo('.project_gallery_div');







      },







  });







});















// drop zone for project gallary







$('.manage_menu_card_action').hide(); 







$(".manage_btn_menu_card_action").on("click",function(event){







    event.preventDefault();







     $(this).next('ul').toggle();







});























$(document).on('click','#cardreportbtn',function(){

    var item_id = $(this).data('id');

    var item_type = $(this).data('type');

    var projectid = $(this).data('projectid');

    $("input[name='item_id']").val(item_id);

    $("input[name='item_type']").val(item_type);

    $("input[name='projectid']").val(projectid);



});





$(document).on('click','#cardhiddenbtn',function(){

    $("#hide_reasons_project_div").hide();

    $("#hide_reasons_bprofile_div").hide();

    $("#hide_reasons_job_div").hide();

    $("#hide_reasons_rfq_div").hide();



    var item_id = $(this).data('id');

    var hidde_item_type = $(this).data('type');

    var projectid = $(this).data('projectid');

    $('.hidden_reason_select2').hide();

    $("input[name='hiddenuser_id']").val(item_id);

    $("input[name='hiddenitem_type']").val(hidde_item_type);

    $("input[name='hiddenprojectid']").val(projectid);



    if(hidde_item_type == 'project')

    $("#hide_reasons_project_div").show();



    if(hidde_item_type == 'bussinessprofile')

    $("#hide_reasons_bprofile_div").show();



    if(hidde_item_type == 'job')

    $("#hide_reasons_job_div").show();





    if(hidde_item_type == 'rfq')

    $("#hide_reasons_rfq_div").show();



});



$(document).on('click','.sharebtn_card',function () {

    var card_object = $(this).data('object');

    var description = $(this).data('description');

    var name = $(this).data('name');

$('head').append('<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />');

    $("head").append('<meta property="og:url" content="project_info/'+card_object.id+'">');

    $("head").append('<meta property="og:type" content="article">');

    $("head").append('<meta property="og:title" content="'+name+'">');

    $("head").append('<meta property="og:description" content="'+description+'">');

    $("head").append('<meta property="og:image" content="'+card_object.photo+'">');

    var object = $(this).data('link');

    $('.sharemodel_card').html(object);

});



</script>















@auth















<input type="hidden" id="current_user" value="{{ Auth::user()->id }}" />







<input type="hidden" id="pusher_app_key" value="{{ env('PUSHER_APP_KEY') }}" />







<input type="hidden" id="pusher_cluster" value="{{ env('PUSHER_APP_CLUSTER')}}"/>







<audio class="d-none" id="chat-alert-sound">







<source src="{{ asset('sound/facebook_chat.mp3') }}" type="audio/mpeg">







Your browser does not support the audio element.







</audio>







@include('layouts.chat-box')







<script src="https://js.pusher.com/7.0/pusher.min.js"></script>







<script src="{{ asset('js/chat.js') }}"></script> 















@endauth







@include('layouts.auth-modals')







@yield('popup_script')







</body>







</html>















