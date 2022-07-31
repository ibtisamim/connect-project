@extends('layouts.main')
@section('title', '- Business Projects')
@section('content')

{{--
  @include('layouts.nav-mobile-business')
  <div class="navbar_backend_overview">
      @include('layouts.nav-desktop')
</div>
--}}


      <div class="dashbord_backend_overview col-lg-9 db_all">
        <div class="project_part">
          <div class="header">
            <h2>Projects you are part of</h2>

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
          @foreach($projects as $project)
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
                        <h3 class="mr-2">{{$project->called}}</h3>
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
                      <p>{{ implode(' ', array_slice(explode(' ', $project->description), 0, 20))."\n"}}
                      <br/>
                      <a href="{{route('overview',$project->id)}}">Read More</a></p>
                    </div>
                  <!--  <div class="progress_completion">
                      <div class="progress_data">
                        <h3>Project Completion</h3>
                        <span>32%</span>
                      </div>
                      <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 42%" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div> -->
                  </div>
                </div>
              </div>


          </div>
          @endforeach

          {!! $projects->links() !!}
        </div>
      </div>
    </div>

<div class="row dashbord_backend_overview">
<div  class="col-lg-3"></div>

<div class="col-lg-9 db_all">
<div class="project_part">
    <div class="header">
        <h2>Draft</h2>
    </div>
@if(count($draft_projects) != 0 )
    @foreach($draft_projects as $project)
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
                            <h3 class="mr-2">{{$project->called}}</h3>
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
                        <p>{{ implode(' ', array_slice(explode(' ', $project->description), 0, 20))."\n"}}<a href="#">Read More</a></p>
                    </div>
                   <!-- <div class="progress_completion">
                        <div class="progress_data">
                            <h3>Project Completion</h3>
                            <span>32%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 42%" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div> -->
                </div>
            </div>
          </div>
      </div>
    </div>
    @endforeach

    {!! $draft_projects->links() !!}
  @else
    <div class="alert alert-danger">No Project Save As Draft Yet</div>
  @endif
</div>



{{--
  @include("layouts.footer-mobile")

  @include('layouts.button_menu_business') --}}

@section('popup_script')

  <script>

    $(document).on('click','.save_project',function(e){
      e.preventDefault();

       var save_type = $(this).attr('saveType');
       console.log(save_type);
      $.ajax({
        url : "{{route('create_project_ds')}}",
        data : $('#create_project_popup').serialize() + '&' + $.param( { "save_type" : save_type }) , 
        type : "POST",
        success : function(res){

          if(res.save_type == 0){
            if(res.project_status == 1){
              window.location.href = res.business_feeds;
            }else{
              window.location.href = res.wbs_step_1;
            }
          }else if(res.save_type == 1){
           
            window.location.href = res.all_project;
                       
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
@endsection
@endsection
