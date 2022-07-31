@extends('layouts.main')
@section('title', '- Business Overview')
@section('content')

    @include('layouts.nav-mobile-business')
    <div class="navbar_backend_overview">
        @include('layouts.nav-desktop')
    </div>

    <div class="background_business_db">
        <div class="container">
            <div class="row dashbord_backend_overview">
                <div class="col-lg-3 d-none d-lg-block d-xl-block">
                    <h4>Dashboard</h4>
                    @include('layouts.business_sidebar')
                </div>
                <div class="col-lg-9 db_all">
                    <div class="project_part">
                        <div class="header">
                            <h2>My Project</h2>

                            <div class="group_btn d-none .d-lg-block .d-xl-block d-xxl-block">

                                <div class="dropdown">
                                    <a class="dropdown-toggle style_dots"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </a>
                                    <ul class="dropdown-menu style_drop_project" aria-labelledby="dropdownMenuButton1">
                                        <li>
                                            <a href="#" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#request_project">Request a Project</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#create_project">Create a Project</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                            <div class="group_btn d-lg-none d-xl-none d-xxl-none">
                                <a href="{{route('request_project_mb')}}" class="request_btn">Request a Project</a>
                                <a href="{{route('create_project_mb')}}" class="create_btn">Create a Project</a>
                            </div>

                        </div>

                        <!--card website-->
                        <div class="project_card d-none d-lg-flex d-xl-flex">
                            <div class="card">
                                <img src="img/panner_image.png" class="card_img" alt="">
                                <h6>Project Name</h6>
                                <div class="team_member">
                                    <h3>Team Members</h3>
                                    <div class="all_member">
                                        <div class="member">
                                            <img src="img/member2.png" alt="img_member_one">
                                        </div>
                                        <div class="member">
                                            <img src="img/member2.png" alt="img_member_two">
                                        </div>
                                        <div class="member">
                                            <img src="img/member3.png" alt="img_member_three">
                                        </div>
                                        <div class="member">
                                            <img src="img/member2.png" alt="img_member_for">
                                        </div>
                                        <div class="member">
                                            <span class="text-center">+12</span>
                                        </div>
                                    </div>
                                </div>
                               {{-- <div class="progress_completion">
                                    <div class="progress_data">
                                        <h3>Project Completion</h3>
                                        <span>32%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 42%" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="card">
                                <img src="img/panner_image.png" class="card_img" alt="">
                                <h6>Project Name</h6>
                                <div class="team_member">
                                    <h3>Team Members</h3>
                                    <div class="all_member">
                                        <div class="member">
                                            <img src="img/member2.png" alt="img_member_one">
                                        </div>
                                        <div class="member">
                                            <img src="img/member2.png" alt="img_member_two">
                                        </div>
                                        <div class="member">
                                            <img src="img/member3.png" alt="img_member_three">
                                        </div>
                                        <div class="member">
                                            <img src="img/member2.png" alt="img_member_for">
                                        </div>
                                        <div class="member">
                                            <span class="text-center">+12</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress_completion">
                                    <div class="progress_data">
                                        <h3>Project Completion</h3>
                                        <span>32%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 42%" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <img src="img/panner_image.png" class="card_img" alt="">
                                <h6>Project Name</h6>
                                <div class="team_member">
                                    <h3>Team Members</h3>
                                    <div class="all_member">
                                        <div class="member">
                                            <img src="img/member2.png" alt="img_member_one">
                                        </div>
                                        <div class="member">
                                            <img src="img/member2.png" alt="img_member_two">
                                        </div>
                                        <div class="member">
                                            <img src="img/member3.png" alt="img_member_three">
                                        </div>
                                        <div class="member">
                                            <img src="img/member2.png" alt="img_member_for">
                                        </div>
                                        <div class="member">
                                            <span class="text-center">+12</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress_completion">
                                    <div class="progress_data">
                                        <h3>Project Completion</h3>
                                        <span>32%</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 42%" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card website-->

                        <!--card mobile -->
                        <div class="project_card d-lg-none">
                            <div class="owl-carousel owl-theme d-lg-none">
                                <div class="item item_coursole_style">
                                    <div class="card">
                                        <img src="img/panner_image.png" class="card_img" alt="">
                                        <h6>Project Name</h6>
                                        <div class="team_member">
                                            <h3>Team Members</h3>
                                            <div class="all_member">
                                                <div class="member">
                                                    <img src="img/member2.png" alt="img_member_one">
                                                </div>
                                                <div class="member">
                                                    <img src="img/member2.png" alt="img_member_two">
                                                </div>
                                                <div class="member">
                                                    <img src="img/member3.png" alt="img_member_three">
                                                </div>
                                                <div class="member">
                                                    <img src="img/member2.png" alt="img_member_for">
                                                </div>
                                                <div class="member">
                                                    <span class="text-center">+12</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress_completion">
                                            <div class="progress_data">
                                                <h3>Project Completion</h3>
                                                <span>32%</span>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 42%" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item item_coursole_style">
                                    <div class="card">
                                        <img src="img/panner_image.png" class="card_img" alt="">
                                        <h6>Project Name</h6>
                                        <div class="team_member">
                                            <h3>Team Members</h3>
                                            <div class="all_member">
                                                <div class="member">
                                                    <img src="img/member2.png" alt="img_member_one">
                                                </div>
                                                <div class="member">
                                                    <img src="img/member2.png" alt="img_member_two">
                                                </div>
                                                <div class="member">
                                                    <img src="img/member3.png" alt="img_member_three">
                                                </div>
                                                <div class="member">
                                                    <img src="img/member2.png" alt="img_member_for">
                                                </div>
                                                <div class="member">
                                                    <span class="text-center">+12</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress_completion">
                                            <div class="progress_data">
                                                <h3>Project Completion</h3>
                                                <span>32%</span>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 42%" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item item_coursole_style">
                                    <div class="card">
                                        <img src="img/panner_image.png" class="card_img" alt="">
                                        <h6>Project Name</h6>
                                        <div class="team_member">
                                            <h3>Team Members</h3>
                                            <div class="all_member">
                                                <div class="member">
                                                    <img src="img/member2.png" alt="img_member_one">
                                                </div>
                                                <div class="member">
                                                    <img src="img/member2.png" alt="img_member_two">
                                                </div>
                                                <div class="member">
                                                    <img src="img/member3.png" alt="img_member_three">
                                                </div>
                                                <div class="member">
                                                    <img src="img/member2.png" alt="img_member_for">
                                                </div>
                                                <div class="member">
                                                    <span class="text-center">+12</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress_completion">
                                            <div class="progress_data">
                                                <h3>Project Completion</h3>
                                                <span>32%</span>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 42%" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card mobile -->

                        <div class="recent_project 	d-none d-lg-block d-xl-block">
                            <div class="row_header">
                                <div class="col_project">
                                    <span>RECENT PROJECTS</span>
                                </div>
                                <div class="col_project">
                                    <span>CREATED</span>
                                </div>
                                <div class="col_project">
                                    <span>REPORTER</span>
                                </div>
                                <div class="col_project">
                                    <span>DUE</span>
                                </div>
                                <div class="col_project">
                                    <span>STATS</span>
                                </div>
                            </div>
                            <div class="row_content">
                                <div class="col_content">
                                    <img src="img/project.png" alt="">
                                    <span>Collabee Private Co.</span>
                                </div>
                                <div class="col_content">
                                    <span>Thu, 26 Oct</span>
                                </div>
                                <div class="col_content">
                                    <span>Christian Matthews</span>
                                </div>
                                <div class="col_content">
                                    <span>Thu, 26 Oct</span>
                                </div>
                                <div class="col_content">
                                    <span class="pending">IN PROGRESS</span>
                                </div>
                            </div>
                            <div class="row_content">
                                <div class="col_content">
                                    <img src="img/project4.png" alt="">
                                    <span>Cambr Card</span>

                                </div>
                                <div class="col_content">
                                    <span>Thu, 26 Oct</span>
                                </div>
                                <div class="col_content">
                                    <span>Arthur Cook</span>
                                </div>
                                <div class="col_content">
                                    <span>Thu, 26 Oct</span>
                                </div>
                                <div class="col_content">
                                    <span class="in_progress">Pending</span>
                                </div>
                            </div>
                            <div class="row_content">
                                <div class="col_content">
                                    <img src="img/project3.png" alt="">
                                    <span>Target</span>
                                </div>
                                <div class="col_content">
                                    <span>Thu, 26 Oct</span>
                                </div>
                                <div class="col_content">
                                    <span>Evelyn Tucker</span>
                                </div>
                                <div class="col_content">
                                    <span>Thu, 26 Oct</span>
                                </div>
                                <div class="col_content">
                                    <span class="pending">IN PROGRESS</span>
                                </div>
                            </div>
                            <div class="row_content">
                                <div class="col_content">
                                    <img src="img/project2.png" alt="">
                                    <span>Gramma Limited</span>
                                </div>
                                <div class="col_content">
                                    <span>Wed, 25 Oct</span>
                                </div>
                                <div class="col_content">
                                    <span>Donald Curtis</span>
                                </div>
                                <div class="col_content">
                                    <span>Thu, 26 Oct</span>
                                </div>
                                <div class="col_content">
                                    <span class="in_progress">Pending</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div id='calendar'></div>
                            </div>
                        </div>

                        <!-- end card  -->

                    </div>
                </div>
            </div>
        </div>


        <!--start  model request project -->
        <div class="modal fade" id="request_project" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog request_project_dialog">
                <form action="{{route('request_project_ds')}}" method="POST" id="request_project_popup">
                    @csrf
                    <div class="modal-content request_project_page1" id="request_project_page1">
                        <div class="modal-header">
                            <h5 class="modal-title request_project_page1_title  body_page1" id="title">Request a Project</h5>
                            <div class="close_popup" data-bs-dismiss="modal">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <div class="modal-body request_project_form">

                            <div class="form-group popUp_field">
                                <div class="left">
                                    <label>Title</label>
                                </div>
                                <div class="right">
                                    <input type="text" name="title" class="form-control"  placeholder="Start typing your title here" >
                                </div>
                                <p id="title_error_request" class="text-danger"></p>
                            </div>


                            <div class="form-group popUp_field">
                                <div class="left">
                                    <label>Description</label>
                                </div>
                                <div class="right">
                                    <textarea class="form-control details_input" name="description" placeholder="Maximum 5000 characters. " rows="4"></textarea>
                                </div>
                                <p id="description_error_request" class="text-danger"></p>
                            </div>


                            <div class="form-group popUp_field">
                                <div class="left">
                                    <label>Location</label>
                                </div>
                                <div class="right">
                                    <input type="text" class="form-control" name="location" placeholder="Type in a city, country, or coordinates.">
                                </div>
                                <p id="location_error_request" class="text-danger"></p>
                            </div>

                            <div class="single_defined_role">
                                <div class="form-group popUp_field">
                                    <div class="left">
                                        <label class="style_category">Category</label>
                                    </div>
                                    <div class="right">
                                        <div class="select_style_create">
                                            <select class="request_project_select"  data-place-holder="select invitees"  name="category">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->category_id}}">{{$category->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <p id="category_error_request" class="text-danger"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="single_defined_role">
                                <div class="form-group popUp_field">
                                    <div class="left">
                                        <label class="style_category">Invitees</label>
                                    </div>
                                    <div class="right">
                                        <div class="select_style_create">
                                            <select class="request_project_select"  data-place-holder="select invitees"  name="invitees">
                                                @foreach($users as $user)
                                                    <option value="{{$user->user_id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <p id="invitees_error_request" class="text-danger"></p>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group popUp_field">
                                <div class="left">
                                    <label class="deadline">Deadline</label>
                                </div>
                                <div class="right">
                                    <input type="date" name="deadline" id="deadline" class="form-control">
                                    <p id="deadline_error_request" class="text-danger"></p>
                                </div>
                            </div>

                        </div>


                        <div class="modal-footer justify-content-center">
                            <button type="button" class="next_button" id="next_button">Next</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--end model request project -->

        <!-- start model create project -->
        <div class="modal fade" id="create_project" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog create_project_dialog">
                <form action="{{route('create_project_ds')}}" method="POST" id="create_project_popup">
                    @csrf
                    <div class="modal-content create_project_page1" id="create_project_page1">
                        <div class="modal-header">
                            <h5 class="modal-title create_project_page1_title" id="title">Create a Project</h5>
                            <div class="close_popup" data-bs-dismiss="modal">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>

                        <div class="modal-body create_project_form body_page1">
                            <div class="form-group popUp_field">
                                <div class="left">
                                    <label class="title">Title</label>
                                </div>
                                <div class="right">
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Start typing your title here">
                                    <p id="title_error" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="form-group popUp_field">
                                <div class="left">
                                    <label>Description</label>
                                </div>
                                <div class="right">
                                    <textarea class="form-control details_input" id="description" name="description" placeholder="Maximum 5000 characters. " rows="4"></textarea>
                                    <p id="description_error" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="form-group popUp_field">
                                <div class="left">
                                    <label>Location</label>
                                </div>
                                <div class="right">
                                    <input type="text" name="location" id="location" class="form-control" placeholder="Type in a city, country, or coordinates.">
                                    <p id="located_error" class="text-danger"></p>
                                </div>
                            </div>

                            <div class="single_defined_role">
                                <div class="form-group popUp_field">
                                    <div class="left">
                                        <label class="style_category">Category</label>
                                    </div>
                                    <div class="right">
                                        <div class="select_style_create">
                                            <select class="category_select2"   name="category">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->category_id}}">{{$category->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <p id="category_error" class="text-danger"></p>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group popUp_field">
                                <div class="left">
                                    <label class="start_date">Start Date</label>
                                </div>
                                <div class="right">
                                    <input type="date" name="start_date" id="start_date" class="form-control">
                                    <p id="start_date_error" class="text-danger"></p>
                                </div>
                            </div>

                            <div class="form-group popUp_field">
                                <div class="left">
                                    <label class="end_date">End Date</label>
                                </div>
                                <div class="right">
                                    <input type="date" name="end_date" id="end_date" class="form-control">
                                    <p id="end_date_error" class="text-danger"></p>
                                </div>
                            </div>

                            <div class="form-group popUp_field">
                                <div class="left">
                                    <label for="privacy">Privacy</label>
                                </div>
                                <div class="right types">
                                    <div class="d-flex">
                                        <div class="type">
                                            <input type="radio" name="privacy" id="private" value="1"><label for="private" class="style_privacy_label">Private</label>
                                        </div>
                                        <div class="type">
                                            <input type="radio" name="privacy" id="public" value="0"><label for="public" class="style_privacy_label">Public</label>
                                        </div>
                                    </div>
                                    <p id="privacy_error" class="text-danger"></p>
                                </div>

                            </div>
                        </div>


                        <div class="modal-footer justify-content-center">
                            <button type="button" class="next_button" id="save_project">Start</button>
                            <button type="button" class="cancel_button" >Save Draft</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- end model create project -->

        @include("layouts.footer-desktop")
    </div>
    @include("layouts.footer-mobile")

    @include('layouts.button_menu_business')

@section('popup_script')

    <script>

        $(document).on('click','#save_project',function(e){
            e.preventDefault();

            $.ajax({
                url : "{{route('create_project_ds')}}",
                data : $('#create_project_popup').serialize(),
                type : "POST",
                success : function(res){

                    if(res.project_status == 1){
                        window.location.href = res.business_feeds;
                    }else{
                        window.location.href = res.wbs_step_1;
                    }

                },
                error : function(err){

                    var err = eval("(" + err.responseText + ")");
                    $("#title_error").text(err.errors.title);
                    $("#description_error").text(err.errors.description);
                    $("#located_error").text(err.errors.location);
                    $("#start_date_error").text(err.errors.start_date);
                    $("#end_date_error").text(err.errors.end_date);
                    if(err.errors.privacy_error){
                        $("#privacy_error").text("must select privacy");
                    }
                    if(err.errors.category){
                        $("#category_error").text("must select category");
                    }

                }
            });
        });

    </script>

    <script>

        $(document).on('click','#next_button',function(e){
            e.preventDefault();

            $.ajax({
                url : "{{route('request_project_ds')}}",
                data : $('#request_project_popup').serialize(),
                type : "POST",
                success : function(res){

                    if(res.message == "done"){
                        window.location.href = res.page;
                    }

                },
                error : function(err){
                    var err = eval("(" + err.responseText + ")");
                    $("#title_error_request").text(err.errors.title);
                    $("#description_error_request").text(err.errors.description);
                    $("#location_error_request").text(err.errors.location);
                    $("#category_error_request").text(err.errors.category);
                    $("#invitees_error_request").text(err.errors.invitees);
                    $("#deadline_error_request").text(err.errors.deadline);
                }
            });
        });


    </script>

    <script>

        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:5
                }
            }
        })


        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'resourceTimeGridTwoDay',
                initialDate: '2020-09-07',
                editable: true,
                selectable: true,
                dayMaxEvents: true, // allow "more" link when too many events
                dayMinWidth: 200,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'resourceTimeGridDay,resourceTimeGridTwoDay,resourceTimeGridWeek,dayGridMonth'
                },
                views: {
                    resourceTimeGridTwoDay: {
                        type: 'resourceTimeGrid',
                        duration: { days:1 },
                        buttonText: '2 days',
                    }
                },

                //// uncomment this line to hide the all-day slot
                allDaySlot: false,

                resources: [

                    { id: 'b', title: 'Room C', eventColor: '#F0F0FF' },

                ],
                events: [

                    { id: '2', resourceId: 'b', start: '2020-09-07T09:00:00', end: '2020-09-07T10:00:00', title: 'event 2' },

                ],

                select: function(arg) {
                    console.log(
                        'select',
                        arg.startStr,
                        arg.endStr,
                        arg.resource ? arg.resource.id : '(no resource)'
                    );
                },
                dateClick: function(arg) {
                    console.log(
                        'dateClick',
                        arg.date,
                        arg.resource ? arg.resource.id : '(no resource)'
                    );
                }
            });

            calendar.render();
        });

    </script>

<script>

$(document).on('click','#save_project',function(e){
  e.preventDefault();

  $.ajax({
    url : "{{route('create_project_ds')}}",
    data : $('#create_project_popup').serialize(),
    type : "POST",
    success : function(res){

      if(res.project_status == 1){
        window.location.href = res.business_feeds;
      }else{
        window.location.href = res.wbs_step_1;
      }

    },
    error : function(err){

      var err = eval("(" + err.responseText + ")");
      $("#title_error").text(err.errors.title);
      $("#description_error").text(err.errors.description);
      $("#located_error").text(err.errors.location);
      $("#start_date_error").text(err.errors.start_date);
      $("#end_date_error").text(err.errors.end_date);
      if(err.errors.privacy_error){
        $("#privacy_error").text("must select privacy");
      }
      if(err.errors.category){
        $("#category_error").text("must select category");
      }

    }
  });
});

</script>

@endsection
@endsection
