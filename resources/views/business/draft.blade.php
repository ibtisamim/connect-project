@extends('layouts.home')

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
                            <h2>Draft</h2>
                        </div>

                        <div class="main_card_project">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="image_project">
                                        <img src="{{asset('img/img_project_cover.png')}}" alt="img">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card_project">
                                        <div class="project_info">
                                            <div class="left d-flex">
                                                <h3 class="mr-2">Project Name</h3>
                                                <div class="category">
                                                    <div class="category_name">
                                                        <span>Category</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="team_member">
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
                                            </div>
                                        </div>
                                        <div class="discription ">
                                            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit,ttesdo.." <a href="#">Read More</a></p>
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


                        <div class="main_card_project">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="image_project">
                                        <img src="{{asset('img/img_project_cover.png')}}" alt="img">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card_project">
                                        <div class="project_info">
                                            <div class="left d-flex">
                                                <h3 class="mr-2">Project Name</h3>
                                                <div class="category">
                                                    <div class="category_name">
                                                        <span>Category</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="team_member">
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
                                            </div>
                                        </div>
                                        <div class="discription ">
                                            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit,ttesdo.." <a href="#">Read More</a></p>
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
                    </div>
                </div>
            </div>
        </div>


        <!--start  model request project -->
        <div class="modal fade" id="request_project" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog request_project_dialog">
                <form action="{{route('request_project_ds')}}" method="POST">
                    @csrf
                    <div class="modal-content request_project_page1" id="request_project_page1">
                        <div class="modal-header">
                            <h5 class="modal-title request_project_page1_title" id="title">Request a Project</h5>
                            <a href="#">Project ID: 256 </a>
                        </div>
                        <div class="modal-body request_project_form">

                            <div class="form-group">
                                <label>What is it about?</label>
                                <input type="text" name="about" class="form-control"  placeholder="Start typing your title here" >
                            </div>
                            <div class="form-group">
                                <label>Give more details to the invitees</label>
                                <textarea class="form-control details_input" name="details_invitees" placeholder="Maximum 5000 characters. " rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Where is it located?</label>
                                <input type="text" class="form-control" name="located" placeholder="Type in a city, country, or coordinates.">
                            </div>
                            <div class="form-group">
                                <label>Define your requested project's category</label>
                                <br>
                                <div class="select_style">
                                    <select class="category_select form-control"  name="category">
                                        <option>Start typing your contractor name here</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->category_id}}">{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="toggle_circle d-flex justify-content-center">
                            <span class="toggle_page1 toggle_color"></span>
                            <span class="toggle_page2"></span>
                        </div>

                        <div class="modal-footer justify-content-center">
                            <button type="button" class="cancel_button" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="next_button" id="next_button">Next</button>
                        </div>

                    </div>

                    <div class="modal-content request_project_page2" style="display: none;" id="request_project_page2">
                        <div class="modal-header">
                            <h5 class="modal-title request_project_page2_title" id="title">Request a Project</h5>
                            <a href="#">Project ID: 256 </a>
                        </div>
                        <div class="modal-body body_page2">
                            <p>Request the project from our partners:</p>
                            <div class="group_card">
                                <div class="card">
                                    <img src="img/user_image.png" alt="">
                                    <h6>User1.6578 <img src="img/Verified Mark.png" alt="verified_mark"> </h6>
                                    <a href="#">category</a>
                                </div>
                                <div class="card">
                                    <img src="img/user_image.png" alt="">
                                    <h6>User1.6578 <img src="img/Verified Mark.png" alt="verified_mark"> </h6>
                                    <a href="#">category</a>
                                </div>
                                <div class="card">
                                    <img src="img/user_image.png" alt="">
                                    <h6>User1.6578 <img src="img/Verified Mark.png" alt="verified_mark"> </h6>
                                    <a href="#">category</a>
                                </div>
                            </div>
                            <div class="invite_parties">
                                <p>Or invite the required parties:</p>
                                <div class="group_invite">
                                    <div class="single_invite">
                                        <label>Architect(s)</label>
                                        <div class="select_style2">
                                            <select class="architect_select"  name="architects">
                                                <option>Start typing your contractor name here</option>
                                                @foreach($sub_categories as $sub_category)
                                                    <option value="{{$sub_category->id}}">{{$sub_category->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="single_invite">
                                        <label>Contractor(s)</label>
                                        <div class="select_style2">
                                            <select class="contractor_select"  name="contractors">
                                                <option>Start typing your contractor name here</option>
                                                @foreach($sub_categories as $sub_category)
                                                    <option value="{{$sub_category->id}}">{{$sub_category->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="single_invite">
                                        <label>Designer(s)</label>
                                        <div class="select_style2">
                                            <select class="designer_select"  name="designers">
                                                <option>Start typing your contractor name here</option>
                                                @foreach($sub_categories as $sub_category)
                                                    <option value="{{$sub_category->id}}">{{$sub_category->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="toggle_circle d-flex justify-content-center">
                            <span class="toggle_page1"></span>
                            <span class="toggle_page2"></span>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="back_button" id="back_button">Back</button>
                            <button type="submit" class="post_button">Post</button>
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
                            <a href="#">Project ID: 256 </a>
                        </div>

                        <div class="modal-body create_project_form body_page1">
                            <div class="form-group">
                                <label>What is it Called?</label>
                                <input type="text" name="called" class="form-control" placeholder="Start typing your title here">
                                <p id="called_error" class="text-danger"></p>
                            </div>
                            <div class="form-group">
                                <label>Give your project a description</label>
                                <textarea class="form-control details_input" name="description" placeholder="Maximum 5000 characters. " rows="4"></textarea>
                                <p id="description_error" class="text-danger"></p>
                            </div>
                            <div class="form-group">
                                <label>Where is it located?</label>
                                <input type="text" name="located" class="form-control" placeholder="Type in a city, country, or coordinates.">
                                <p id="located_error" class="text-danger"></p>
                            </div>

                            <div class="single_defined_role">
                                <label class="style_client">Client(s)</label>

                                <div class="select_style_create">
                                    <select class="client_select" multiple="multiple"  name="client[]">
                                        @foreach($users as $user)
                                            <option value="{{$user->user_id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('client')
                            <br>
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror


                            <div class="form-group tag_select">
                                <p>Select your project's category</p>
                                <div class="all_tag_create_project">
                                    @foreach($categories as $category)
                                        <label class="single_tag_create_project">
                                            <input type="radio" name="category[]"  value="{{$category->category_id}}" class="checked_input">
                                            <div class="checkbox_style">{{$category->title}}</div>
                                        </label>
                                    @endforeach
                                </div>
                                <span id="category_error" class="text-danger"></span>
                            </div>

                            <div class="project_status">
                                <P>Project Status</P>
                                <div class="form-group group_input_box">
                                    <div class="input_box">
                                        <input type="radio" id="status_1" name="project_status" value="1"> <label for="status_1">Completed</label>
                                    </div>
                                    <div class="input_box">
                                        <input type="radio"  id="status_2" name="project_status" value="2"> <label for="status_2">Ongoing</label>
                                    </div>
                                    <div class="input_box">
                                        <input type="radio" id="status_3" name="project_status" value="0"> <label for="status_3"> Uncoming</label>
                                    </div>
                                </div>
                                <span id="project_status_error" class="text-danger"></span>

                            </div>
                        </div>


                        <div class="modal-footer justify-content-center">
                            <button type="button" class="cancel_button" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="next_button" id="save_project">Save</button>
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

@endsection
