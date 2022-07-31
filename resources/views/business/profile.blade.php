@extends('layouts.main')
@section('title', '- Business Profile')
@section('content')


<div class="navbar_background">


  <div class="content_nav_front_end">
    <h1>{{$business_data->name}}</h1>
    <p>97% Completion Rate</p>
    <div class="content_box">
      <div class="box">
        <img src="img/nav_content_box.png" alt="nav_content_box">
        <div class="info_user_box">
          <a href="#" class="follow_btn">Follow</a>
        </div>
      </div>
      <div class="box">
        <img src="img/nav_content_box.png" alt="nav_content_box">
        <div class="info_user_box">
          <a href="#" class="message_btn">Message</a>
        </div>
      </div>
    </div>
    <i class="fas fa-arrow-down"></i>
  </div>
</div>

<div class="business_acount_profile">
      <div class="col-lg-12 col-sm-12  col-xs-12 col-md-12">
        <div class="profile_business">
          <div class="user_info">
            <div class="left">
              <img src="{{ isset($business_data->media[0]) ? url('uploads/'.$business_data->media[0]->id.'/'.$business_data->media[0]->file_name) : ''}}" alt="user_image">
              <h6>{{$business_setting->name}}</h6>
            </div>
            <div class="right d-none d-sm-none d-lg-flex">
              <a href="{{route('business.dashboard')}}" class="edit_profile_btn">Edit Profile</a>
              <a href="#" class="toggle_btn"><i class="fas fa-ellipsis-h"></i></a>
            </div>
          </div>
          <div class="statistic">
            <div class="likes">
              <label>Likes</label>
              <span>13K</span>
            </div>
            <div class="comments">
              <label>Comments</label>
              <span>134K</span>
            </div>
            <div class="connections">
              <label>Connections</label>
              <span>564</span>
            </div>
          </div>
          <div class="bio">
            <p>SHORT BIO: {{$business_data->pio}}</p>
          </div>
          <div class="location">
            <a href="{{$business_setting->url_website}}">{{$business_setting->url_website}}</a>
          </div>
          <!-- <div class="tag_box d-sm-none d-none d-lg-flex">
            <p class="tag">Tag</p>
            <p class="tag">Tag</p>
            <p class="tag">Tag</p>
            <p class="tag">Tag</p>
            <p class="tag">Tag</p>
            <p class="tag">Tag</p>
            <p class="tag">Tag</p>
            <p class="tag">Tag</p>
          </div>
          <div class="tag_box d-lg-none">
            <p class="tag">Tag</p>
            <p class="tag">Tag</p>
            <p class="tag">Tag</p>
          </div> -->
          <div class="partners">
            <p>Partners</p>
            <div class="all_partners">
              <div class="partner">
                <img src="img/member2.png" alt="img_member_one">
              </div>
              <div class="partner">
                <img src="img/member2.png" alt="img_member_two">
              </div>
              <div class="partner">
                <img src="img/member3.png" alt="img_member_three">
              </div>
              <div class="partner">
                <img src="img/member2.png" alt="img_member_for">
              </div>
              <div class="partner">
                <span class="text-center">+12</span>
              </div>
            </div>
          </div>
          <div class="employees">
            <p>Employees</p>
            <div class="all_employees">
              <div class="employee">
                <img src="img/member2.png" alt="img_member_one">
              </div>
              
              
              
            </div>
          </div>
          <div class="social_media">
            @if(isset($business_data->facebook))
            <a href="{{$business_data->facebook}}"><i class="fab fa-facebook-square"></i></a>
            @endif

            @if(isset($business_data->linked_in))
            <a href="{{$business_data->linked_in}}"><i class="fab fa-linkedin"></i></a>
            @endif
            <!-- <a href="#"><i class="fab fa-pinterest"></i></a> -->
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
        <div class="about_section">
          <h2>About Lorem ipsum<a href="#" class="link_hidden">See More</a></h2>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
          </p>
          <p>Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim </p>
        </div>
      </div>
    </div>


    <div class="row project  d-lg-flex d-xl-flex">
      <h2>Project <a href="#" class="link_hidden">See All</a></h2>
        @foreach($projects as $project)
                        <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12">
                           <div class="single_category home_page_card">
                        <div class="image_category">
                            <img src="img/Image.png" alt="image_category_one">
                        </div>
                        <div class="info_category">
                            <div class="project_info">
                                <h2>{{$project->called}}</h2>
                                 <div class="team_member">
                                    <div class="all_member">
                                        @foreach($project->members as $member)
                                        <div class="member">
                                             @if($member->photo)
                                              <img src="{{$member->photo}}" alt="user_img">
                                              @else
                                              <img src="{{asset('img/user_image.png')}}" alt="user_img">
                                              @endif
                                        </div>
                                        @endforeach
                                        
                                       
                                      @if($project->members()->count() > 0) 
                                        <div class="member">
                                            
                                        <a href="#" type="button" class="infoU" data-bs-toggle="modal" data-bs-target="#project_employees" data-id="{{$project->id}}"><span class="text-center">+12</span></a>
    
                                        </div>
                                       @endif 
                                    </div>
                                </div>
                            </div>

                            <div class="all_tage text-center   d-md-flex">
                                 @foreach($project->categories as $cat)
                                  <div class="tage">
                                    <span> {{ \Illuminate\Support\Str::limit($cat->title, 8, $end='...') }}</span>
                                  </div>
                                  @endforeach
                            </div>



                             <div class="info_description">
                                <p>
                                    {{ \Illuminate\Support\Str::limit($project->description, 85, $end='...') }}
                                     <a href="{{route('front_end_page',$project->id)}}">Read More</a>
                                </p>
                            </div>


                            <div class="follow">
                                <a href="#"><i class="fas fa-plus"></i> Follow</a>
                            </div>
                        </div>
                    </div>
                    </div>
          @endforeach
    </div>



    <!-- row mobile recent update start-->
    <div class="row mobile_recent_update d-lg-none d-xl-none">
      <h2>Resent Update <a href="#" class="link_hidden">See All</a></h2>
      <div class="owl-carousel owl-theme d-lg-none">
        <div class="item item_coursole_style">
          <div class="card_left">
            <div class="setion_media">
              <img src="img/vedio.png" alt="">
            </div>
            <div class="card_left_details">
              <div class="info_user">
                <img src="img/user_image.png" alt="user_img">
                <h6>User1.6578 <img src="img/Verified Mark.png" alt="verified_mark"> </h6>
              </div>
              <div class="card_left_details_right d-sm-none d-md-flex d-none d-sm-flex">
                <div class="icon_star">
                  <img src="img/star_icon.png" alt="star_icon"> <span>300</span>
                </div>
                <div class="icon_chat">
                  <img src="img/chat_icon.png" alt="chat_icon"><span> 20</span>
                </div>
              </div>
            </div>

            <div class="card_left_all_tage text-center">
              <div class="card_left_tage">
                <span>Tage</span>
              </div>
              <div class="card_left_tage">
                <span>Tage</span>
              </div>
              <div class="card_left_tage">
                <span>Tage</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- row mobile recent update end-->

    <!--row mobile product start-->
    <div class="row product d-lg-none d-xl-none">
      <h2>Product <a href="#" class="link_hidden">See All</a></h2>
      <div class="owl-carousel owl-theme d-lg-none">
        <div class="item item_coursole_style">
          <div class="larg_feeds">
            <div class="img_feeds">
              <img src="img/img_card2.png" alt="img_feeds">
            </div>
            <div class="details_feeds">
              <p>Product Name, Lorem Ipsum Lorem Ipsum Lorem Ipsum</p>
              <div class="ratting">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <span>2,549</span>
              </div>
            </div>
            <div class="price_feeds">
              <span>$499</span>
            </div>
            <div class="state_feeds">
              <span>In stock</span>
            </div>
          </div>
        </div>
        <div class="item item_coursole_style">
          <div class="larg_feeds">
            <div class="img_feeds">
              <img src="img/img_card2.png" alt="img_feeds">
            </div>
            <div class="details_feeds">
              <p>Product Name, Lorem Ipsum Lorem Ipsum Lorem Ipsum</p>
              <div class="ratting">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <span>2,549</span>
              </div>
            </div>
            <div class="price_feeds">
              <span>$499</span>
            </div>
            <div class="state_feeds">
              <span>In stock</span>
            </div>
          </div>
        </div>
        <div class="item item_coursole_style">
          <div class="larg_feeds">
            <div class="img_feeds">
              <img src="img/img_card2.png" alt="img_feeds">
            </div>
            <div class="details_feeds">
              <p>Product Name, Lorem Ipsum Lorem Ipsum Lorem Ipsum</p>
              <div class="ratting">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <span>2,549</span>
              </div>
            </div>
            <div class="price_feeds">
              <span>$499</span>
            </div>
            <div class="state_feeds">
              <span>In stock</span>
            </div>
          </div>
        </div>
        <div class="item item_coursole_style">
          <div class="larg_feeds">
            <div class="img_feeds">
              <img src="img/img_card2.png" alt="img_feeds">
            </div>
            <div class="details_feeds">
              <p>Product Name, Lorem Ipsum Lorem Ipsum Lorem Ipsum</p>
              <div class="ratting">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <span>2,549</span>
              </div>
            </div>
            <div class="price_feeds">
              <span>$499</span>
            </div>
            <div class="state_feeds">
              <span>In stock</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--row mobile product end-->


    <!-- row mobile project -->
    <div class="row project d-lg-none d-xl-none">
      <h2>Project <a href="#" class="link_hidden">See All</a></h2>
      <div class="owl-carousel owl-theme d-lg-none">
        <div class="item item_coursole_style">
          <div class="single_category">
            <div class="image_category">
              <img src="img/Image.png" alt="image_category_one">
            </div>
            <div class="info_category">
              <div class="project_info">
                <h2>Project Name</h2>
                <div class="project_details d-sm-none d-md-flex d-none d-sm-block">
                  <div class="icon_star">
                    <img src="img/star_icon.png" alt="star_icon"> <span>300</span>
                  </div>
                  <div class="icon_chat">
                    <img src="img/chat_icon.png" alt="chat_icon"> 20
                  </div>
                </div>
              </div>

              <div class="info_description">
                <p>
                  "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempo..."
                  <a href="#" class=" d-md-none d-lg-none d-xl-none d-xxl-none">Read More</a>
                </p>
                <a href="#" class="d-sm-none d-md-flex d-none d-sm-block">Read More</a>
              </div>

              <div class="project_details d-lg-none d-md-none">
                <div class="icon_star">
                  <img src="img/star_icon.png" alt="star_icon"> <span>300</span>
                </div>
                <div class="icon_chat">
                  <img src="img/chat_icon.png" alt="chat_icon"> 20
                </div>
              </div>


              <div class="all_tage text-center   d-md-flex d-lg-none d-xl-none">
                <div class="tage">
                  <span>Tage</span>
                </div>
                <div class="tage">
                  <span>Tage</span>
                </div>
                <div class="tage">
                  <span>Tage</span>
                </div>
              </div>

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
              <div class="all_tage text-center d-none d-sm-none d-md-none d-lg-flex">
                <div class="tage">
                  <span>Tage</span>
                </div>
                <div class="tage">
                  <span>Tage</span>
                </div>
                <div class="tage">
                  <span>Tage</span>
                </div>
                <div class="tage">
                  <span>Tage</span>
                </div>
              </div>
             
            </div>
          </div>
        </div>
        <div class="item item_coursole_style">
          <div class="single_category">
            <div class="image_category">
              <img src="img/Image.png" alt="image_category_one">
            </div>
            <div class="info_category">
              <div class="project_info">
                <h2>Project Name</h2>
                <div class="project_details d-sm-none d-md-flex d-none d-sm-block">
                  <div class="icon_star">
                    <img src="img/star_icon.png" alt="star_icon"> <span>300</span>
                  </div>
                  <div class="icon_chat">
                    <img src="img/chat_icon.png" alt="chat_icon"> 20
                  </div>
                </div>
              </div>

              <div class="info_description">
                <p>
                  "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempo..."
                  <a href="#" class=" d-md-none d-lg-none d-xl-none d-xxl-none">Read More</a>
                </p>
                <a href="#" class="d-sm-none d-md-flex d-none d-sm-block">Read More</a>
              </div>

              <div class="project_details d-lg-none d-md-none">
                <div class="icon_star">
                  <img src="img/star_icon.png" alt="star_icon"> <span>300</span>
                </div>
                <div class="icon_chat">
                  <img src="img/chat_icon.png" alt="chat_icon"> 20
                </div>
              </div>


              <div class="all_tage text-center   d-md-flex d-lg-none d-xl-none">
                <div class="tage">
                  <span>Tage</span>
                </div>
                <div class="tage">
                  <span>Tage</span>
                </div>
                <div class="tage">
                  <span>Tage</span>
                </div>
              </div>

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
              <div class="all_tage text-center d-none d-sm-none d-md-none d-lg-flex">
                <div class="tage">
                  <span>Tage</span>
                </div>
                <div class="tage">
                  <span>Tage</span>
                </div>
                <div class="tage">
                  <span>Tage</span>
                </div>
                <div class="tage">
                  <span>Tage</span>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <div class="item item_coursole_style">
          <div class="single_category">
            <div class="image_category">
              <img src="img/Image.png" alt="image_category_one">
            </div>
            <div class="info_category">
              <div class="project_info">
                <h2>Project Name</h2>
                <div class="project_details d-sm-none d-md-flex d-none d-sm-block">
                  <div class="icon_star">
                    <img src="img/star_icon.png" alt="star_icon"> <span>300</span>
                  </div>
                  <div class="icon_chat">
                    <img src="img/chat_icon.png" alt="chat_icon"> 20
                  </div>
                </div>
              </div>

              <div class="info_description">
                <p>
                  "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempo..."
                  <a href="#" class=" d-md-none d-lg-none d-xl-none d-xxl-none">Read More</a>
                </p>
                <a href="#" class="d-sm-none d-md-flex d-none d-sm-block">Read More</a>
              </div>

              <div class="project_details d-lg-none d-md-none">
                <div class="icon_star">
                  <img src="img/star_icon.png" alt="star_icon"> <span>300</span>
                </div>
                <div class="icon_chat">
                  <img src="img/chat_icon.png" alt="chat_icon"> 20
                </div>
              </div>


              <div class="all_tage text-center   d-md-flex d-lg-none d-xl-none">
                <div class="tage">
                  <span>Tage</span>
                </div>
                <div class="tage">
                  <span>Tage</span>
                </div>
                <div class="tage">
                  <span>Tage</span>
                </div>
              </div>

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
              <div class="all_tage text-center d-none d-sm-none d-md-none d-lg-flex">
                <div class="tage">
                  <span>Tage</span>
                </div>
                <div class="tage">
                  <span>Tage</span>
                </div>
                <div class="tage">
                  <span>Tage</span>
                </div>
                <div class="tage">
                  <span>Tage</span>
                </div>
              </div>
             
            </div>
          </div>
        </div>
        <div class="item item_coursole_style">
          <div class="single_category">
            <div class="image_category">
              <img src="img/Image.png" alt="image_category_one">
            </div>
            <div class="info_category">
              <div class="project_info">
                <h2>Project Name</h2>
                <div class="project_details d-sm-none d-md-flex d-none d-sm-block">
                  <div class="icon_star">
                    <img src="img/star_icon.png" alt="star_icon"> <span>300</span>
                  </div>
                  <div class="icon_chat">
                    <img src="img/chat_icon.png" alt="chat_icon"> 20
                  </div>
                </div>
              </div>

              <div class="info_description">
                <p>
                  "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempo..."
                  <a href="#" class=" d-md-none d-lg-none d-xl-none d-xxl-none">Read More</a>
                </p>
                <a href="#" class="d-sm-none d-md-flex d-none d-sm-block">Read More</a>
              </div>

              <div class="project_details d-lg-none d-md-none">
                <div class="icon_star">
                  <img src="img/star_icon.png" alt="star_icon"> <span>300</span>
                </div>
                <div class="icon_chat">
                  <img src="img/chat_icon.png" alt="chat_icon"> 20
                </div>
              </div>


              <div class="all_tage text-center   d-md-flex d-lg-none d-xl-none">
                <div class="tage">
                  <span>Tage</span>
                </div>
                <div class="tage">
                  <span>Tage</span>
                </div>
                <div class="tage">
                  <span>Tage</span>
                </div>
              </div>

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
              <div class="all_tage text-center d-none d-sm-none d-md-none d-lg-flex">
                <div class="tage">
                  <span>Tage</span>
                </div>
                <div class="tage">
                  <span>Tage</span>
                </div>
                <div class="tage">
                  <span>Tage</span>
                </div>
                <div class="tage">
                  <span>Tage</span>
                </div>
              </div>
            
            </div>
          </div>
        </div>
      </div>




</div>





  @endsection
