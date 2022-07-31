@extends('layouts.home')

@section('content')

<div class="navbar_backend_overview">
    @include('layouts.nav-mobile-business')

    <div class="container">
        @include('layouts.nav-desktop')
    </div>
</div>

<div class="background_dashbord_overview">
    <div class="container">
        <div class="row dashbord_backend_overview">
            <div class="col-lg-3 d-none d-lg-block d-xl-block">
                <h4>Dashboard</h4>
                @include('layouts.project-sidebar')
            </div>
            <div class="col-lg-9 col-sm-12 col-md-12 recent_update">
                <div class="recent_update_title">
                    <h2>Recent Updates</h2>
                    <div class="btn_div_style">
                        <a href="#" class="add_new_btn" data-bs-toggle="modal" data-bs-target="#add_update">Add New</a>
                    </div>
                </div>


                <div class="main_card_project">
                <div class="row">
                        <div class="col-lg-4">
                            <div class="image_project">
                                <img src="{{asset('img/img_project.png')}}" alt="img">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card_project">
                                <div class="user">
                                    <img src="{{asset('img/user_image.png')}}" alt="user">
                                    <span>User1.6578 <img src="{{asset('img/Verified Mark.png')}}" alt="verified_mark"></span>
                                </div>
                                <div class="discription">
                                    <p>"Lorem ipsum dolor sit amet,   quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor. id est laborum."</p>
                                </div>
                                <div class="category">
                                    <div class="category_name">
                                        <span>Tag</span>
                                    </div>
                                    <div class="category_name">
                                        <span>Tag</span>
                                    </div>
                                    <div class="category_name">
                                        <span>Tag</span>
                                    </div>
                                    <div class="category_name">
                                        <span>Tag</span>
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
                                <img src="{{asset('img/img_project.png')}}" alt="img">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card_project">
                                <div class="user">
                                    <img src="{{asset('img/user_image.png')}}" alt="user">
                                    <span>User1.6578 <img src="{{asset('img/Verified Mark.png')}}" alt="verified_mark"></span>
                                </div>
                                <div class="discription">
                                    <p>"Lorem ipsum dolor sit amet,   quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor. id est laborum."</p>
                                </div>
                                <div class="category">
                                    <div class="category_name">
                                        <span>Tag</span>
                                    </div>
                                    <div class="category_name">
                                        <span>Tag</span>
                                    </div>
                                    <div class="category_name">
                                        <span>Tag</span>
                                    </div>
                                    <div class="category_name">
                                        <span>Tag</span>
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
                                <img src="{{asset('img/img_project.png')}}" alt="img">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card_project">
                                <div class="user">
                                    <img src="{{asset('img/user_image.png')}}" alt="user">
                                    <span>User1.6578 <img src="{{asset('img/Verified Mark.png')}}" alt="verified_mark"></span>
                                </div>
                                <div class="discription">
                                    <p>"Lorem ipsum dolor sit amet,   quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor. id est laborum."</p>
                                </div>
                                <div class="category">
                                    <div class="category_name">
                                        <span>Tag</span>
                                    </div>
                                    <div class="category_name">
                                        <span>Tag</span>
                                    </div>
                                    <div class="category_name">
                                        <span>Tag</span>
                                    </div>
                                    <div class="category_name">
                                        <span>Tag</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="load_more text-center">
                    <span>Load More</span>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade " id="add_update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog add_update_dialog">

            <div class="modal-content add_update_content">
                <div class="modal-header add_update_header">
                    <h5 class="modal-title add_update_content_title" id="title">Add an Update</h5>
                    <div class="add_update_info_user">
                        <span>By</span>
                        <img src="img/user_image.png" alt="user_img">
                        <h6>User1.6578   </h6>
                    </div>
                </div>
                <div class="modal-body form_add_update">
                    <div class="left_side">
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="title" class="form-control" placeholder="2020-01-01" >
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <textarea class="form-control details_input" name="details" placeholder="100 Characters max" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" placeholder="Maximum 5000 characters.">
                        </div>
                        <div class="radio_group_style">
                            <label>Privacy</label>
                            <div class="form-group">
                                <input type="radio" name="privacy" value="private"><span>Private</span>
                            </div>
                            <div class="form-group">
                                <input type="radio" name="privacy" value="public"><span>Public</span>
                            </div>
                        </div>
                        <div class="form-group checkbox_style_update_popup">
                            <input type="checkbox" name="update_story"><span>Add Update to the project's story</span>
                        </div>
                    </div>
                    <div class="right-side">
                        <form action="#" method="POST" class="dropzone style_dropzone_form">
                            <input name="file" type="file" multiple />
                        </form>
                    </div>
                </div>

                <div class="modal-footer justify-content-center">
                    <button type="submit" class="cancel_button" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="add_button" id="add_button">Add</button>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row comment_box d-none d-lg-flex d-xl-flex">
            <div class="col-lg-12">
                <div class="comment_box_content">
                    <div class="img_person_comment">
                        <img src="img/user_image.png" alt="">
                    </div>

                    <div class="form_comment">
                        <form>
                            <input type="text" placeholder="leave comment" class="form-control">
                        </form>
                        <div class="person_see_comment">
                            <p>Who can see this comment?</p>
                            <div class="info_user">
                                <img src="img/user_image.png" alt="user_img">
                                <h6>User1.6578 <img src="img/Verified Mark.png" alt="verified_mark"> </h6>
                            </div>
                            <div class="info_user">
                                <img src="img/user_image.png" alt="user_img">
                                <h6>User1.6578 <img src="img/Verified Mark.png" alt="verified_mark"> </h6>
                            </div>
                            <div class="info_user">
                                <img src="img/user_image.png" alt="user_img">
                                <h6>User1.6578 <img src="img/Verified Mark.png" alt="verified_mark"> </h6>
                            </div>
                            <div class="info_user">
                                <img src="img/user_image.png" alt="user_img">
                                <h6>User1.6578 <img src="img/Verified Mark.png" alt="verified_mark"> </h6>
                            </div>
                            <div class="info_user">
                                <img src="img/user_image.png" alt="user_img">
                                <h6>User1.6578 <img src="img/Verified Mark.png" alt="verified_mark"> </h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row comments_section">
            <div class="col-lg-12">
                <h2>Comments</h2>
                <div class="mobile_input_comment_user d-lg-none d-xl-none">
                    <div class="form_comment">
                        <img src="img/user_image.png" alt="user_imgae">
                        <input type="text" class="form-control" placeholder="Leave a comment"/>
                    </div>
                    <div class="user_commenter">
                        <p>Who can see this comment?</p>
                        <div class="user">
                            <img src="img/user_image.png" alt="user1">
                            <img src="img/user_image.png" alt="user2">
                            <img src="img/user_image.png" alt="user3">
                            <img src="img/user_image.png" alt="user4">
                            <img src="img/user_image.png" alt="user5">
                        </div>
                    </div>
                </div>
                <div class="comment_details">
                    <div class="img_user_comment">
                        <img src="img/user_image.png" alt="">
                    </div>
                    <div class="comment_info">
                        <div class="comment_info_details">
                            <p>user.name</p>
                            <span>3 hours ago</span>
                        </div>
                        <p class="comment">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet,
                            consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                    </div>
                </div>
                <div class="comment_details">
                    <div class="img_user_comment">
                        <img src="img/user_image.png" alt="">
                    </div>
                    <div class="comment_info">
                        <div class="comment_info_details">
                            <p>user.name</p>
                            <span>3 hours ago</span>
                        </div>
                        <p class="comment">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet,
                            consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                    </div>
                </div>
                <div class="comment_details">
                    <div class="img_user_comment">
                        <img src="img/user_image.png" alt="">
                    </div>
                    <div class="comment_info">
                        <div class="comment_info_details">
                            <p>user.name</p>
                            <span>3 hours ago</span>
                        </div>
                        <p class="comment">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet,
                            consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                    </div>
                </div>
                <div class="comment_details">
                    <div class="img_user_comment">
                        <img src="img/user_image.png" alt="">
                    </div>
                    <div class="comment_info">
                        <div class="comment_info_details">
                            <p>user.name</p>
                            <span>3 hours ago</span>
                        </div>
                        <p class="comment">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet,
                            consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                    </div>
                </div>
                <div class="comment_details">
                    <div class="img_user_comment">
                        <img src="img/user_image.png" alt="">
                    </div>
                    <div class="comment_info">
                        <div class="comment_info_details">
                            <p>user.name</p>
                            <span>3 hours ago</span>
                        </div>
                        <p class="comment">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet,
                            consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include("layouts.footer-desktop")

    @include('layouts.button_menu_project')

    @include("layouts.footer-mobile")

</div>

@endsection