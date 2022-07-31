@extends('layouts.main')
@section('title', 'Yousef steps')
@section('script')
<script src="{{asset('js/drawflow.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
    integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="{{asset('css/drawflow.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('css/beautiful.css')}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
@endsection

@section('content')

<div class="body_background">



    <div class="wrapper mt-5">
        <div class="col wbs_side_style">


            <div class="drag-drawflow both @if($card_count == 0) disabled @endif" draggable="true"
                ondragstart="drag(event)" data-node="task">
                <span>Task</span>
            </div>

            <div class="drag-drawflow both @if($card_count == 0) disabled @endif" draggable="true"
                ondragstart="drag(event)" data-node="delay">
                <span> Time delay</span>
            </div>



             <!-- popUp Save Template -->
             <div class="bg_model_save_template">
                    <div class="modal fade" id="saveTemplate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="Save_template_model">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Save Template</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('save_template')}}" id="save_template_form" method="post">
                                @csrf 
                            <div class="modal-body">
                            
                                    <input type="text" name="name_template" value="" id="name_template" placeholder="Enter Name Project" required class="form-control">
                                
                            </div>
                            <div class="modal-footer">
                                
                                <button type="button" id="save_template" class="btn btn-primary">Save</button>
                            </div>
                     
                     
                        </form>
                        </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <!-- end code popUp -->

                    <!-- Load Template PopUp -->
                    <div class="bg_model_load_template">
                    <div class="modal fade" id="loadTemplate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="load_template_model">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Load Template</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <div class="modal-body"> 
                           
                        @if(count($templates) > 0)

                            @foreach($templates as $template)
                            <div class="data_template">
                                    <h4>{{$template->name}}</h4>
                                    <button type="button" class="load_template" template_id="{{$template->id}}">load</button>
                            </div>
                            @endforeach

                        @else

                            <div class="alert alert-danger">No Template Added</div>
                            
                        @endif
                        </div>
                       
                        
                        </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <!-- end Teplate PopUp -->

            <div class="phase_info">
                <form action="{{route('wbs-step-1.store',$project->id)}}" method="POST" id="wbs-step-form">
                    @csrf
                    <input id="wbs-step-data" type="hidden" name="data" />
                    <h3 class="d-flex justify-content-between">Phase Info 
                        
                    <div class="dropdown">
                        <button class="dropdown-toggle  style_drop_template"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-h"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <a class="dropdown-item" href="#">
                            <li data-bs-toggle="modal" id="save_template_btn" data-bs-target="#saveTemplate">
                                Save Template     
                           </li>
                        </a>
                            <li  data-bs-toggle="modal" data-bs-target="#loadTemplate">
                                <a class="dropdown-item" href="#">
                                    Load Template
                                </a>
                            </li>
                        </ul>
                    </div>

                   
                    </h3>
                    <div class="start_date">
                        <p class="title">Starting Date</p>
                        <input type="date" id="starting_date" name="starting_date" class="form-control input_start_date"
                            onchange="chooseDate()"
                            value="{{isset($project->start_time)  && $project->start_time ? date('Y-m-d',$project->start_time) : date('Y-m-d')}}">
                    </div>
                    <div class="duration">
                        <p class="title">Original Duration</p>
                        <p class="value">AUTO VALUE (WEEKS {{isset($original_duration) ? $original_duration : ''}})</p>
                    </div>
                    <div class="time_margin">
                        <p class="title">Time Margin</p>
                        <input type="number" id="time_margin" name="time_margin" min="0" class="form-control"
                            value="{{isset($project->time_margin) ? $project->time_margin :0}}">

                    </div>
                    
                    <div class="cost">
                        <p class="title">Cost</p>
                        <p class="value">AUTO VALUE ($ {{isset($total_cost) ? $total_cost :''}} )</p>
                    </div>
               
               
               
                </form>
            </div>

            <input type="hidden" id="project_id_template" value="">
            <!-- start   pop up -->
            <div class="custom_popup_wbs1" id="custom_popup_wbs1">
                <div class="modal fade" id="left_toggle" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="left_toggleLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="left_toggleLabel">Edit Block</h5>
                                <button type="button" class="btn-close close_popup" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('save',$project->id)}}" method="POST" id="card-form">
                                    @csrf

                                    <input type="hidden" id="card_id" name="card_id" value="">
                                    <input type="hidden" name="start_date" id="start_date" value="<?php echo date('m/d/Y'); ?>" />
                                    <input type="hidden" name="type_card" id="type_card">
                                    <div class="row mt-2">
                                        <div class="col-lg-4">
                                            <label for="task_name">Task Name</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="task_name" name="task_name"
                                                placeholder="Maximum 50 characters">
                                        </div>
                                        <div class="col-lg-8 offset-lg-4">
                                            @error('task_name')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-lg-4">
                                            <label for="description">Description</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="description" name="description"
                                                placeholder="Maximum 100 characters">
                                        </div>
                                        <div class="col-lg-8 offset-lg-4">
                                            @error('description')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-lg-4">
                                            <label for="cost">Cost</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="number" class="form-control" id="cost" name="cost"
                                                placeholder="Value" min="0">
                                        </div>
                                        <div class="col-lg-8 offset-lg-4">
                                            @error('cost')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-lg-4">
                                            <label for="assigned_to">Assigned to</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="single_defined_role assigned_select">
                                                <div class="select_style_create">
                                                    <select class="main_select" id="assigned_to" name="assigned_to">
                                                        @foreach($users as $user)
                                                        <option value="{{$user->id}}">{{$user->email}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-8 offset-lg-4">
                                            @error('assigned_to')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-lg-4">
                                            <label for="duration">Duration</label>
                                        </div>
                                        <div class="col-lg-8 duration_section">
                                            <input type="number" class="form-control duration" id="duration"
                                                name="duration" placeholder="X" min="0">
                                        </div>
                                        <div class="col-lg-8 offset-lg-4">
                                            @error('duration')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="col-lg-8 offset-lg-4">
                                            @error('duration_type')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary done_btn">Done</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end   pop up -->

        </div>

        <div class="col-right">
       
            <div id="drawflow" ondrop="drop(event)" ondragover="allowDrop(event)">

                <div class="btn-export" style="background-color: #64DFDF;color:#fff; border:none">Finish</div>
                

                <div class="btn-lock">
                    <i id="lock" class="fas fa-lock" onclick="editor.editor_mode='fixed'; changeMode('lock');"></i>
                    <i id="unlock" class="fas fa-lock-open" onclick="editor.editor_mode='edit'; changeMode('unlock');"
                        style="display:none;"></i>
                </div>
                <div class="bar-zoom">
                    <i class="fas fa-search-minus" onclick="editor.zoom_out()"></i>
                    <i class="fas fa-search" onclick="editor.zoom_reset()"></i>
                    <i class="fas fa-search-plus" onclick="editor.zoom_in()"></i>
                </div>
            </div>
        </div>
    </div>



    <script>
    var id = document.getElementById("drawflow");
    const editor = new Drawflow(id);
    editor.reroute = true;
    editor.reroute_fix_curvature = true;
    editor.force_first_input = false;

    $('.btn-export').on('click', function() {

        $('#wbs-step-data').val(JSON.stringify(editor.export()));

        $('#wbs-step-form').submit();
    });



    editor.createCurvature = function(start_pos_x, start_pos_y, end_pos_x, end_pos_y, curvature_value, type) {
        var line_x = start_pos_x;
        var line_y = start_pos_y;
        var x = end_pos_x;
        var y = end_pos_y;
        var curvature = curvature_value;

        switch (type) {
            case 'open':
                if (start_pos_x >= end_pos_x) {
                    var hx1 = line_x + Math.abs(x - line_x) * curvature;
                    var hx2 = x - Math.abs(x - line_x) * (curvature * -1);
                    return ' M ' + line_x + ' ' + line_y + ' q ' + (x - line_x) / 2 + ' ' + (y - line_y) + ' ' + (
                        x - line_x) + ' ' + (y - line_y);
                } else {
                    var hx1 = line_x + Math.abs(x - line_x) * curvature;
                    var hx2 = x - Math.abs(x - line_x) * curvature;
                    return ' M ' + line_x + ' ' + line_y + ' q ' + (x - line_x) / 2 + ' ' + (y - line_y) + ' ' + (
                        x - line_x) + ' ' + (y - line_y);
                }
                break
            case 'close':
                if (start_pos_x >= end_pos_x) {
                    var hx1 = line_x + Math.abs(x - line_x) * (curvature * -1);
                    var hx2 = x - Math.abs(x - line_x) * curvature;
                    return ' M ' + line_x + ' ' + line_y + ' q ' + (x - line_x) / 2 + ' ' + (y - line_y) + ' ' + (
                        x - line_x) + ' ' + (y - line_y);
                } else {
                    var hx1 = line_x + Math.abs(x - line_x) * curvature;
                    var hx2 = x - Math.abs(x - line_x) * curvature;
                    return ' M ' + line_x + ' ' + line_y + ' q ' + (x - line_x) / 2 + ' ' + (y - line_y) + ' ' + (
                        x - line_x) + ' ' + (y - line_y);
                }
                break;
            case 'other':
                if (start_pos_x >= end_pos_x) {
                    var hx1 = line_x + Math.abs(x - line_x) * (curvature * -1);
                    var hx2 = x - Math.abs(x - line_x) * (curvature * -1);
                    return ' M ' + line_x + ' ' + line_y + ' q ' + (x - line_x) / 2 + ' ' + (y - line_y) + ' ' + (
                        x - line_x) + ' ' + (y - line_y);
                } else {
                    var hx1 = line_x + Math.abs(x - line_x) * curvature;
                    var hx2 = x - Math.abs(x - line_x) * curvature;
                    return ' M ' + line_x + ' ' + line_y + ' q ' + (x - line_x) / 2 + ' ' + (y - line_y) + ' ' + (
                        x - line_x) + ' ' + (y - line_y);
                }
                break;
            default:

                var hx1 = line_x + Math.abs(x - line_x) * curvature;
                var hx2 = x - Math.abs(x - line_x) * curvature;
                return ' M ' + line_x + ' ' + line_y + ' C ' + hx1 + ' ' + line_y + ' ' + hx2 + ' ' + y + ' ' + x +
                    '  ' + y;
        }

    }
    var data = {
        "drawflow": {
            "Home": {
                "data": {
                    "2": {
                        "id": 2,
                        "name": "end",
                        "data": {

                        },
                        "class": "end",
                        "html": "<div><div class=\"title-box\"><i class=\"fas fa-sign-in-alt\"></i> End</div></div>",
                        "typenode": false,
                        "inputs": {
                            "input_1": {
                                "connections": []
                            }
                        },
                        "outputs": {

                        },
                        "pos_x": 100,
                        "pos_y": 200
                    },
                    "7": {
                        "id": 7,
                        "name": "start",
                        "data": {

                        },
                        "class": "start",
                        "html": "<div><div class=\"title-box\"><i class=\"fas fa-sign-out-alt\"></i> Start</div></div>",
                        "typenode": false,
                        "inputs": {

                        },
                        "outputs": {
                            "output_1": {
                                "connections": []
                            }
                        },
                        "pos_x": -500,
                        "pos_y": 200
                    },
                }
            },

        }
    };

    <?php if (!is_null($project->wbs_step1)) { ?>
    
    data = JSON.parse('{!! addslashes($project->wbs_step1) !!}'.replace(/\n/g, "\\n"));

    <?php } ?>
    editor.drawflow = data;
    
    editor.start();
    

      editorInit();

      function editorInit(){
        $.get('/editor_init/{{$project->id}}',function(res){
          if(res.nodes){
            res.nodes.forEach(function(element) {
                  $('#node-' + element.card_id).attr('start-type',element.start_type);
                 
            });
          }

          $('.connection').removeClass('critical-path');
          $('.task-start-wrapper').hide();
          if (res.hasPath) {

              res.path.critical_path.forEach(function(element) {
                  console.log(editor.getNodeFromId(element))
                  $('.node_in_node-' + element).addClass('critical-path');
                  $('.node_out_node-' + element).addClass('critical-path');
              });

              res.path.floaters.forEach(function(element) {
                $('.node_out_node-' + element).removeClass('critical-path');
                $('.node_in_node-' + element).removeClass('critical-path');
                if($('#node-' + element).find('.task-start-wrapper').length){
                $('#node-' + element).find('.task-start-wrapper').show();
                }else{
                $('#node-' + element).find('.wbs_step_1_dropdwon .dropdown > .dropdown-menu').append('<li style="display: block" class="text-center my-2 task-start-wrapper dropdown-item "><button class="task-start-type btn btn-sm">Start Type</button></li>')
                }
            });

          }
        },'json')
      }

     
    // Events!
    editor.on('nodeCreated', function(id) {
        console.log("Node created " + id);

        openModal(id)
    })

    editor.on('nodeRemoved', function(id) {

        console.log("Node removed " + id);

        save_step_data();
        delete_card_data(id);
    })

    editor.on('nodeSelected', function(id) {
        console.log("Node selected " + id);
    })

    editor.on('moduleCreated', function(name) {
        console.log("Module Created " + name);
    })

    editor.on('moduleChanged', function(name) {
        save_step_data();
        console.log("Module Changed " + name);
    })

    editor.on('connectionCreated', function(connection) {
        console.log('Connection created');
        save_step_data();
        console.log(connection);
    })

    editor.on('connectionRemoved', function(connection) {
        console.log('Connection removed');
        save_step_data();
        console.log(connection);
    })

    editor.on('nodeMoved', function(id) {
        console.log("Node moved " + id);
        save_step_data();
    })

    editor.on('zoom', function(zoom) {
        console.log('Zoom level ' + zoom);
    })

    editor.on('translate', function(position) {
        console.log('Translate x:' + position.x + ' y:' + position.y);
    })

    editor.on('addReroute', function(id) {
        console.log("Reroute added " + id);
    })

    editor.on('removeReroute', function(id) {
        console.log("Reroute removed " + id);
    })
    /* DRAG EVENT */

    /* Mouse and Touch Actions */

    var elements = document.getElementsByClassName('drag-drawflow');
    for (var i = 0; i < elements.length; i++) {
        elements[i].addEventListener('touchend', drop, false);
        elements[i].addEventListener('touchmove', positionMobile, false);
        elements[i].addEventListener('touchstart', drag, false);
    }

    var mobile_item_selec = '';
    var mobile_last_move = null;

    function positionMobile(ev) {
        mobile_last_move = ev;
    }

    function allowDrop(ev) {
        ev.preventDefault();
    }



    function drag(ev) {

        if (ev.type === "touchstart") {
            mobile_item_selec = ev.target.closest(".drag-drawflow").getAttribute('data-node');
        } else {
            ev.dataTransfer.setData("node", ev.target.getAttribute('data-node'));
        }
    }

    function drop(ev) {
        if (ev.type === "touchend") {
            var parentdrawflow = document.elementFromPoint(mobile_last_move.touches[0].clientX, mobile_last_move
                .touches[0].clientY).closest("#drawflow");
            if (parentdrawflow != null) {
                addNodeToDrawFlow(mobile_item_selec, mobile_last_move.touches[0].clientX, mobile_last_move.touches[0]
                    .clientY);
            }
            mobile_item_selec = '';
        } else {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("node");
            addNodeToDrawFlow(data, ev.clientX, ev.clientY);
        }

    }

    function addNodeToDrawFlow(name, pos_x, pos_y) {

        if (editor.editor_mode === 'fixed') {
            return false;
        }
        pos_x = pos_x * (editor.precanvas.clientWidth / (editor.precanvas.clientWidth * editor.zoom)) - (editor
            .precanvas.getBoundingClientRect().x * (editor.precanvas.clientWidth / (editor.precanvas.clientWidth *
                editor.zoom)));
        pos_y = pos_y * (editor.precanvas.clientHeight / (editor.precanvas.clientHeight * editor.zoom)) - (editor
            .precanvas.getBoundingClientRect().y * (editor.precanvas.clientHeight / (editor.precanvas.clientHeight *
                editor.zoom)));

        switch (name) {
            case 'task':
                $('#type_card').val('task');
                var task = `
            <div class="node-wrapper">
            <div class="title-box wbs_step_1_dropdwon">
              <div class="dropdown">
                <a class="btn  dropdown-toggle   custom_button_wbs_popup"   role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                 <i class="fas fa-ellipsis-h"></i>
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li class="edit_button">
                    <a class="dropdown-item single_card" type="button" data-bs-toggle="modal" data-bs-target="#left_toggle" data-id="9" >Edit</a>
                  </li>
                  <li class="text-center my-2 task-start-wrapper"><button class="task-start-type btn btn-sm ">Start Type</button></li>
                </ul>
              </div>
            </div>
               <div class="card_content text-center p-3">
                <p>No Title</p>
                <span>0 Week</span>
            </div>
            
            </div>
            `;
                editor.addNode('task', 1, 1, pos_x, pos_y, 'task', {
                    name: ''
                }, task);
                break;

            case 'delay':
                $('#type_card').val('delay');
                var task = `<div>
            <div class="title-box wbs_step_1_dropdwon">
              <div class="dropdown">
                <a class="btn  dropdown-toggle   custom_button_wbs_popup"   role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                 <i class="fas fa-ellipsis-h"></i>
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li class="edit_button">
                    <a class="dropdown-item single_card" type="button" data-bs-toggle="modal" data-bs-target="#left_toggle" data-id="9" >Edit</a>
                  </li>
                </ul>
              </div>
            </div>
               <div class="card_content text-center p-3">
                <p>Time Delay</p>
                <span>0 Week</span>
            </div>
            </div>
            `;
                editor.addNode('task', 1, 1, pos_x, pos_y, 'task', {
                    name: ''
                }, task);
                break;
            default:
        }
    }

    var transform = '';

    function showpopup(e) {
        e.target.closest(".drawflow-node").style.zIndex = "9999";
        e.target.children[0].style.display = "block";
        transform = editor.precanvas.style.transform;
        editor.precanvas.style.transform = '';
        editor.precanvas.style.left = editor.canvas_x + 'px';
        editor.precanvas.style.top = editor.canvas_y + 'px';

        editor.editor_mode = "fixed";

    }

    function closemodal(e) {
        e.target.closest(".drawflow-node").style.zIndex = "2";
        e.target.parentElement.parentElement.style.display = "none";
        editor.precanvas.style.transform = transform;
        editor.precanvas.style.left = '0px';
        editor.precanvas.style.top = '0px';
        editor.editor_mode = "edit";
    }

    function changeModule(event) {
        var all = document.querySelectorAll(".menu ul li");
        for (var i = 0; i < all.length; i++) {
            all[i].classList.remove('selected');
        }
        event.target.classList.add('selected');
    }

    function changeMode(option) {

        //console.log(lock.id);
        if (option == 'lock') {
            lock.style.display = 'none';
            unlock.style.display = 'block';
        } else {
            lock.style.display = 'block';
            unlock.style.display = 'none';
        }

    }

    $(function() {
        /* to remove card if not fill data */
        $('#left_toggle').on('hidden.bs.modal', function(e) {

            var id = $('#card_id').val();

            $.ajax({
                url: '/check_card/' + {{$project->id}} + '/' + id,
                success: function(res) {
                    if (res) {
                        save_step_data();
                    } else {
                        editor.removeNodeId("node-" + id);
                        save_step_data();
                    }
                },
                error: function(error) {
                    console.log(error);
                }

            });
        });

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        $(document).on('click', ".edit_button a", function() {
            var card_id = $(this).closest('.drawflow-node').attr("id").replace('node-', '');
            openModal(card_id);

        });

        $('#card-form').submit(function(e) {
            e.preventDefault();

            var $form = $(this);
            $.ajax({
                url: $form.attr('action'),
                data: $form.serialize(),
                type: 'post',
                dataType: 'json',
                beforeSend: function() {

                },
                success: function(res) {
                    if (res.error == '') {
                        Toast.fire({
                            icon: 'success',
                            title: res.success
                        });
                        $('#node-' + $form.find('#card_id').val()).attr('start-type',res.start_type)
                        $('#node-' + $form.find('#card_id').val()).find('.card_content p').text($form.find('#task_name').val());
                        $('#node-' + $form.find('#card_id').val()).find('.card_content span').text($form.find('#duration').val() + '- Day');
                        data["drawflow"]["Home"]["data"][$form.find('#card_id').val()]["html"] = $('#node-' + $form.find('#card_id').val()).find('.drawflow_content_node').html();

                        save_step_data();
                        $('#left_toggle').modal('hide');
                        // location.reload();
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: res.error
                        });
                    }
                    $form[0].reset();
                },
                error: function(error) {
                    if (error.status === 422) {
                        var err = eval("(" + error.responseText + ")");
                        Toast.fire({
                            icon: 'error',
                            title: err.message
                        });
                    }
                    console.log(error)
                }
            });
        });



    });

    $(document).on('click', '.task-start-type', function() {
        var $this = $(this);
        var card_id = $this.closest('.drawflow-node').attr("id").replace('node-', '');

        
        $.get('/editor_init/{{$project->id}}',{card_id: card_id},function(res){
            console.log('my_resorce');
            var card = [];
            if(res.nodes){
                res.nodes.forEach(function(element,index) {
                 
                    card.push({name:element.task_name, id:element.id});
                });
            }

            if(res.path.options){
                var option = '';
                console.log(res.path.options);

                $.each( res.path.options, function( key, value ) {
                    option += `<option value='${key}' class='value_card' data-types='${JSON.stringify(value)}'>${res.path.tasks[key].task_name}</option>`;
                });
               
            }
 
            

            Swal.fire({
                title: 'Select Flouter relation type',
                html : `<label>Select Card </label> <select  class="form-control card_relation" name="card_relation" style="width:70%;margin:auto;box-shadow:none">${option}</select>`,
                input: 'radio',
                inputOptions: {
                    'start_start': 'Start To Start',
                    'finish_finish': 'Finish To Finish'
                },
                customClass: 'swal-small',
                preConfirm: function() {
                return new Promise((resolve, reject) => {
                    resolve({
                            IdCard: card_id,
                            Type :  $('input[name="swal2-radio"]:checked').val(),
                            });

                        });
                    },
                // validator is optional
                inputValidator: function(result) {
                    if (!result) {
                        return 'You need to select something!';
                    }
                },
                onOpen: function() {
                    if(res.path.tasks[card_id].relation_card && $('.card_relation option[value="'+res.path.tasks[card_id].relation_card+'"]').length){
                        $('.card_relation').val(res.path.tasks[card_id].relation_card);
                    }
                    
                    $('.card_relation').on('change',function(){
                        var dataTypes = JSON.parse($('.card_relation option[value="'+$(this).val()+'"]').attr('data-types'));

                        console.log(dataTypes.start_type);
                        if(jQuery.inArray("start_start", dataTypes.start_type) === -1){
                            $('input[value="start_start"').parent().hide();
                        }else{
                            $('input[value="start_start"').parent().show();
                        }

                        if(jQuery.inArray("finish_finish", dataTypes.start_type) === -1){
                            $('input[value="finish_finish"').parent().hide();
                        }else{
                            $('input[value="finish_finish"').parent().show();
                        }
                        
                    }).change();
                    var startType = res.path.tasks[card_id].start_type;
                    if(startType){
                        $('input[value="'+startType+'"').attr('checked',true);
                    }else{
                        $('input[value="start_finish"').attr('checked',true);
                    }
                }
            }).then(function(result) {
        
                if (result.isConfirmed) {
                    console.log(result.value);
                    $this.attr('start-type',result.value.Type);
                    $.post("/update_start_type/",{start_type: result.value.Type, relation : result.value.IdCard ,card_id: card_id,project_id: '{{$project->id}}',"_token": "{{ csrf_token() }}",});
                }
            });
        });


         
      
    });

    

    function save_step_data() {
        var $form = $('#wbs-step-form');

        var data = {
            data: JSON.stringify(editor.export()),
            type: 'json',
            "_token": "{{ csrf_token() }}",
        };
        $.ajax({
            url: $form.attr('action'),
            data: data,
            type: 'post',
            dataType: 'json',
            beforeSend: function() {

            },
            success: function(res) {
                $('.connection').removeClass('critical-path');
                $('.task-start-wrapper').hide();
                if (res.hasPath) {

                    res.path.critical_path.forEach(function(element) {
                        console.log(editor.getNodeFromId(element))
                        $('.node_in_node-' + element).addClass('critical-path');
                        $('.node_out_node-' + element).addClass('critical-path');
                    });

                    res.path.floaters.forEach(function(element) {
                        $('.node_out_node-' + element).removeClass('critical-path');
                        $('.node_in_node-' + element).removeClass('critical-path');
                      if($('#node-' + element).find('.task-start-wrapper').length){
                        $('#node-' + element).find('.task-start-wrapper').show();
                      }else{
                        $('#node-' + element).find('.wbs_step_1_dropdwon .dropdown > .dropdown-menu').append('<li style="display: block" class="text-center my-2 task-start-wrapper"><button class="task-start-type btn btn-sm">Start Type</button></li>')
                      }
                    });

                }
            },
            error: function(error) {

                console.log(error)
            }
        });
    }

    function delete_card_data(id) {
        $.ajax({
            url: "/delete_data_card/" + id,
            type: 'post',
            data: {project_id: '{{$project->id}}',"_token": "{{ csrf_token() }}",},
            success: function(res) {
                if (res.error == '') {
                    Toast.fire({
                        icon: 'success',
                        title: res.success
                    });


                } else {
                    Toast.fire({
                        icon: 'error',
                        title: res.error
                    });
                }


                $form[0].reset();
            },
            error: function(error) {
                console.log(error);
            }

        })
    }

    // function changeinfo(){
    //   var time_margin = $('#time_margin').val();

    //   $.ajax({
    //     url : "/info_projrct",
    //     data : { "time_margin" : time_margin ,"_token": "{{ csrf_token() }}" } ,
    //     type : "post",
    //     success : function(res){

    //       console.log(res.time_margin);
    //       $('#margin_value').text(res.time_margin);
    //     },
    //     error : function(error){
    //       console.log(error);
    //     }
    //   })
    // }

    /* end code remove card */

    /* get start date and put in hidden feild */
    function chooseDate() {
        var starting_date = $('#starting_date').val();

        $('#start_date').val(starting_date);

    }
    /* end code get date */

    function openModal(card_id) {
        var modalType = $("#type_card").val();
        console.log(modalType)
        $('#card_id').val(card_id);

        $.ajax({
            url: "/get_data_card/" + {{$project->id}} + '/' + card_id,
            type: 'get',
            success: function(res) {
                if (!res) {
                    $('#left_toggle .modal-title').text('Add ' + modalType);
                } else {
                    modalType = res.type;
                    $('#left_toggle .modal-title').text('Edit ' + modalType);
                }

                if (modalType == 'delay') {
                    $('#task_name').val(res.task_name ? res.task_name : 'Time Delay');
                    $('#cost').val(0).closest('.row').hide();
                    $('#assigned_to').closest('.row').hide();
                } else {
                    $('#task_name').val(res.task_name);
                    $('#cost').val(res.cost).closest('.row').show();
                    if (res.assigned_to) {
                        $('#assigned_to').val(res.assigned_to.split(',')).change().closest('.row').show();
                    } else {
                        $('#assigned_to').val('').change().closest('.row').show();
                    }

                }

                $('#description').val(res.description);
                $('#duration').val(res.duration);

                $("input[name=duration_type][value=" + res.duration_type + "]").prop('checked', true);
                $('#left_toggle').modal('show');

            },
            error: function(error) {
                console.log(error);
            }
        });
    }

        $("#style_btn_start").hover(function(e) { 
                $(this).css("background-color","red"); 
        });

        $('#save_template').on('click',function(e){
            var template  = JSON.stringify(editor.export());
            var name_template = $('#name_template').val();

            var id = $('#project_id_template').val();

            var project_id_template = id ? id : "{{$project->id}}";

            var $form = $('#save_template_form');
            console.log(template);
            console.log(name_template);
            $.ajax({
                data : {"template": template, "project_id": project_id_template, "name_template": name_template,"_token": "{{ csrf_token() }}",},
                type : 'POST',
                url : $form.attr('action'),
                success : function(res){
                    console.log(res);
                    editor.clear();
                    $('#saveTemplate').modal('toggle');  
                    location.reload();
                },
                error: function(error){
                    console.log(error);

                }, 
            });
        });

        $('.load_template').on('click',function(e){
            
            var template_id = $(this).attr('template_id');
            console.log(template_id);
            $.ajax({
            data : {"template_id": template_id , project_id : "{{$project->id}}"},
            type : 'GET',
            url : '/load_template',
            success : function(res){
               
                $.ajax({
                    type : 'POST',
                    url : '/save_card_new_template',
                    data : {"template_id": template_id , project_id : "{{$project->id}}","_token": "{{ csrf_token() }}"},
                });

               $("#project_id_template").val(res.project_id);

                editor.clear();

                $('#loadTemplate').modal('toggle');

                data = JSON.parse(res.project_template.replace(/\n/g, "\\n"));

                editor.drawflow = data;
                
                editor.start();

            },
            error: function(error){
                  console.log(error);
            }, 
            });
        });

        $('#save_template_btn').on('click',function(e){
            var template  = JSON.stringify(editor.export());
            var id = $('#project_id_template').val();
            var project_id_template  = id ? id : "{{$project->id}}";
            $.ajax({
                url : "/get_template_data",
                data: {project_id : project_id_template},
                type : "GET",
                success : function(success){
                    console.log(success);
                    $("#name_template").attr("value",success.name); 
                },
                error : function(error){
                    console.log(error);
                },
            })
        });
      
        $("#clear_area").on('click',function(){
            editor.clear();
        });


        

    </script>


</div>

@endsection