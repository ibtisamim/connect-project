@extends('layouts.home')


@section('script')
  <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/vis/4.21.0/vis.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/vis/4.21.0/vis.min.css" rel="stylesheet" type="text/css" />

  <link href="{{asset('js/chart/frappe-gantt.css')}}" rel="stylesheet" />
  <script src="{{asset('js/chart/frappe-gantt.js')}}"></script>
@endsection

@section('content')

  <div class="bg_backend_overview">
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
          <div class="col-lg-9 projectname_dashbord_overview">
            <div class="projectname_dashbord_details">
              <div class="projectname_dashbord_title">
                <h2>{{$project->called}}</h2>
                <div class="projectname_dashbord_team_member">
                  <div class="projectname_dashbord_all_member">
                    <span>By</span>
                    <div class="projectname_dashbord_member">
                      <img src="{{asset('img/member2.png')}}" alt="img_member_one">
                    </div>
                    <div class="projectname_dashbord_member">
                      <img src="{{asset('img/member2.png')}}" alt="img_member_two">
                    </div>
                    <div class="projectname_dashbord_member">
                      <img src="{{asset('img/member3.png')}}" alt="img_member_three">
                    </div>
                    <div class="projectname_dashbord_member">
                      <img src="{{asset('img/member2.png')}}" alt="img_member_for">
                    </div>
                    <div class="projectname_dashbord_member">
                      <span class="text-center">+12</span>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="projectname_dashbord_tage">
              <div class="tage">
                <span>Tag</span>
              </div>
              <div class="tage">
                <span>Tag</span>
              </div>
              <div class="tage">
                <span>Tag</span>
              </div>
              <div class="tage d-none d-lg-block d-xl-block">
                <span>Tag</span>
              </div>
            </div>
            <div class="projectname_dashbord_description">
              <p>{{$project->description}}
                <span><a href="#">Read More</a></span>
              </p>

            </div>
            <div class="projectname_dashbord_feature mt-3">
              <div class="row">
                <div class="qr_code col-12 col-sm-12 col-md-12 col-lg-4 col-xl-2">
                  <img src="{{asset('img/qr_code.png')}}" alt="">
                </div>
                <div class="label_data col-6 col-sm-6 col-md-6 col-lg-4 col-xl-2">
                  <ul>
                    <li>Project ID</li>
                    <li>Starting Date</li>
                    <li>Ending Date</li>
                    <li>Status</li>
                    <li>Location</li>
                  </ul>
                </div>
                <div class="value_data col-6 col-sm-6 col-md-6 col-lg-4 col-xl-2">
                  <ul>
                    <li>{{$project->id}}</li>
                    <li>21/2/2020</li>
                    <li>21/2/2020</li>
                    <li>
                      @if($project->status == 0)
                        Upcoming
                      @elseif($project->status == 1)
                        Completed
                      @elseif($project->status == 2)
                        Ongoing
                      @endif
                    </li>
                    <li>{{$project->located}}</li>
                  </ul>
                </div>
                <!-- <div class="map col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mt-4">
                  <div class="inner_map"></div>
                  <img src="{{asset('img/map_inner.png')}}" alt="inner_map_img">
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>


<!--
      <div class="container">
        <div class="row comment_box over_view_chart">
           <div class="col-lg-12 p-5">
         
             <div class="header_chart">
               <h3>Progress</h3>
               <div class="group_btn d-none .d-lg-block .d-xl-block d-xxl-block">

                 <div class="dropdown">
                   <a class="dropdown-toggle style_dots"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                     <i class="fas fa-ellipsis-h"></i>
                   </a>
                   <ul class="dropdown-menu style_drop_project" aria-labelledby="dropdownMenuButton1">
                     <li>
                       <a href="{{route('wbs-step-1',$project->id)}}" class="dropdown-item"   data-bs-target="#request_project">Edit WBS</a>
                     </li>
                     <li>
                       <a href="#" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#create_project">Request Change</a>
                     </li>
                   </ul>
                 </div>

               </div>
             </div>
           
            <div id="myTimeline1st"></div>
            
          </div>
        </div>
      </div> -->

      <!-- start model create project -->
      <div class="modal fade" id="create_project" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog create_project_dialog">
          <form action="{{route('create_project_ds')}}" method="POST">
            @csrf
            <div class="modal-content create_project_page1" id="create_project_page1">
              <div class="modal-header">
                <h5 class="modal-title create_project_page1_title" id="title">Create a Project</h5>
                <a href="#">Project ID: 256 </a>
              </div>

              <div class="modal-body create_project_form body_page1">
                <div class="form-group">
                  <label>What is it Called?</label>
                  <input type="text" name="called" class="form-control" value="{{isset($project->called) ? $project->called:''}}" placeholder="Start typing your title here">
                  @error('called')
                  <br>
                  <div class="alert alert-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Give your project a description</label>
                  <textarea class="form-control details_input" name="description" placeholder="Maximum 5000 characters. " rows="4">{{isset($project->description) ? $project->description:''}}</textarea>
                  @error('description')
                  <br>
                  <div class="alert alert-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Where is it located?</label>
                  <input type="text" name="located" class="form-control" value="{{isset($project->located) ? $project->located:''}}" placeholder="Type in a city, country, or coordinates.">
                  @error('located')
                  <br>
                  <div class="alert alert-danger">{{$message}}</div>
                  @enderror
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
                    @foreach($categories as $key => $cate)
                      <label class="single_tag_create_project">
                        {{-- <input type="checkbox" name="category[]" value="{{$cate->id}}" @foreach($category_selected as $cat_select) @if($cat_select == $cate->id) checked @endif  @endforeach class="checked_input"> --}}
                        <div class="checkbox_style">{{$cate->title}}</div>
                      </label>
                    @endforeach
                  </div>
                  @error('category')
                  <br>
                  <div class="alert alert-danger">{{$message}}</div>
                  @enderror
                </div>

              </div>

              <div class="modal-footer justify-content-center">
                <button type="button" class="cancel_button" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="next_button" id="next_button_create">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- end model create project -->

      @include("layouts.footer-desktop")

      @include('layouts.button_menu_project')

      @include("layouts.footer-mobile")

    </div>
  </div>

@endsection



@section('gantt-script')


<script>
  @php $tasksDone = []; @endphp

@if(isset($data) && $data != null)
  var tasks = [
    @foreach($data[$longest_key] as $card_id => $task)
        @php
        $tasksDone[] = $card_id; 
        $progress = 0;
        if($task["end_day"] > time() && time() > $task["start_day"]){
          $progress = (time() - $task["start_day"]) / ($task["end_day"] - $task["start_day"]) * 100;
        }else if($task["end_day"] > time()){
          $progress = 0;
        }else{
          $progress = 100;
        }
        
        @endphp
			{
				start: '{{date("Y-m-d",$task["start_day"])}}',
				end: '{{date("Y-m-d",$task["end_day"])}}',
        image: "https://eitrawmaterials.eu/wp-content/uploads/2016/09/person-icon.png",
				name: '{{$task["name"]}}',
        realId: "{{$card_id}}",
				id: "task-{{$task['id']}}",
				sub_id: "{{$card_id}}",
				progress: {{$progress}},
        canMove: false,
        custom_class: 'main-task'
			},
    @endforeach

    @php 
    $start = array_values($data[$longest_key])[0]['id'];
    $end = end($data[$longest_key]);
   
    unset($data[$longest_key]); @endphp

    @foreach($data as $key => $tasks)
      @foreach($tasks as $card_id => $task)
        @php
        $end_task_date = [];
        $next_nodes = [];
        $prev_nodes = [];
        
        foreach($task['data']->outputs->output_1->connections as $node){
          if($node->node == 2){
            $end_task_date[$node->node] = date("Y-m-d",strtotime('+1 day', $end['end_day']));
          }else{
            foreach($data as $node_tasks){
              if(isset($node_tasks[$node->node])){
                $end_task_date[$node->node] = date("Y-m-d",$node_tasks[$node->node]['start_day']);
                break;
              }
            }
            
          }

          $next_nodes[] = $node->node;
        
        }

        foreach($task['data']->inputs->input_1->connections as $node){
          $prev_nodes[] = $node->node;
        }

        $old_card_id = isset($old_card_id) ? $old_card_id : $card_id;
        $next = next($tasks);
        if(in_array($card_id,$tasksDone)){
          continue;
        }
        
        $tasksDone[] = $card_id;
        
        $progress = 0;
        if($task["end_day"] > time() && time() > $task["start_day"]){
          $progress = (time() - $task["start_day"]) / ($task["end_day"] - $task["start_day"]) * 100;
        }else if($task["end_day"] > time()){
          $progress = 0;
        }else{
          $progress = 100;
        }
        
        @endphp
			{
				start: '{{date("Y-m-d",$task["start_day"])}}',
				end: '{{date("Y-m-d",$task["end_day"])}}',
				name: '{{$task["name"]}}',
				id: "task-{{$task['id']}}",
        realId: "{{$card_id}}",
        image: "https://eitrawmaterials.eu/wp-content/uploads/2016/09/person-icon.png",
        sub_id: "{{$card_id}}",
				progress: {{$progress}},
        canMove: true,
        custom_class: 'sub-task',
        flouter_start: @php echo $old_card_id != 0 && isset($tasks[$old_card_id]) ? $tasks[$old_card_id]['id'] : $start @endphp,
        flouter_end: @php echo $next ?  $next['id'] : $end['id'];  @endphp,
        end_task_date: JSON.parse('{!! json_encode($end_task_date) !!}'),
        next_node:  JSON.parse('{!! json_encode($next_nodes) !!}'),
        prev_node: JSON.parse('{!! json_encode($prev_nodes) !!}'),
			},
      @php $old_card_id = $card_id; @endphp
      @endforeach
    @endforeach
			
		]
		var gantt_chart = new Gantt("#myTimeline1st", tasks, {
			on_click: function (task) {
			//	console.log(task);
			},
			on_date_change: function(task, start, end) {
        
			//	console.log(task, start, end);
			},
			on_progress_change: function(task, progress) {
			//	console.log(task, progress);
			},
			on_view_change: function(mode) {
			//	console.log(mode);
			},
			view_mode: 'Day',
			language: 'en'
		});

@endif
</script>


@endsection
