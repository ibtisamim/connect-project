@extends('layouts.main')
@section('title', '- Business Employees')
@section('content')

            <div class="dashbord_backend_overview col-lg-9">
                    <div class="employee_company">
                        <div class="header">
                            <h2>Employees in your company</h2>
                            <div class="dropdown">
                                <a class="style_employee_dropdown dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="fas fa-ellipsis-h"></i>
                                </a>

                                <ul class="dropdown-menu employee_dropdown" aria-labelledby="dropdownMenuLink">
                               
                                    <li> Post a Job Offer</li>
                                    <li data-bs-toggle="modal" data-bs-target="#exampleModal"> Add Employees</li>
                                
                                </ul>
                            </div>

                            
                        </div>

                        <!-- popup add employee -->
                           

                            <!-- Modal -->
                            <div class="modal fade"  role="dialog"  id="exampleModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header style_header_employee">
                                    <h5 class="modal-title" id="exampleModalLabel">Invite Employee</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('employees.invit')}}"  method="POST">
                                        @csrf 
                                <div class="modal-body style_select2_employee">
                                  
                                        <select class="form-control employee_select2" name="email">
                                        @foreach($users as $user)
                                            <option value="{{$user->email}}">{{$user->email}}</option>
                                        @endforeach

                                        </select>
                                 
                                        
                                </div>
                                <div class="modal-body style_select2_employee">
                                    <input type="text" name="role" class="form-control" value="" />
                                    </div>
                                <div class="modal-footer style_footer_employee">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                                </form>
                                </div>
                            </div>
                            </div>
                            <!--end add employee -->
                        <div class="employees">
                            <div class="employee">
                                <div class="overlay_manage">
                                    <div class="menu">
                                        <div class="dropdown employee_drop_down">
                                            <a class="dropdown-toggle" style="color:#fff" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </a>
                                            <ul class="dropdown-menu style_dots" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="#">Edit Role</a></li>
                                                <li><a class="dropdown-item delete" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <img src="img/ceo.png" alt="ceo">
                                <p>lorem lorem</p>
                                <span>CEO</span>
                            </div>
                            <div class="employee">
                                <div class="overlay_manage">
                                    <div class="menu">
                                        <div class="dropdown employee_drop_down">
                                            <a class="dropdown-toggle" style="color:#fff" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </a>
                                            <ul class="dropdown-menu style_dots" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="#">Edit Role</a></li>
                                                <li><a class="dropdown-item delete" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <img src="img/ceo.png" alt="ceo">
                                <p>lorem lorem</p>
                                <span>CEO</span>
                            </div>
                            <div class="employee">
                                <div class="overlay_manage">
                                    <div class="menu">
                                        <div class="dropdown employee_drop_down">
                                            <a class="dropdown-toggle" style="color:#fff" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </a>
                                            <ul class="dropdown-menu style_dots" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="#">Edit Role</a></li>
                                                <li><a class="dropdown-item delete" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <img src="img/ceo.png" alt="ceo">
                                <p>lorem lorem</p>
                                <span>CEO</span>
                            </div>
                            <div class="employee">
                                <div class="overlay_manage">
                                    <div class="menu">
                                        <div class="dropdown employee_drop_down">
                                            <a class="dropdown-toggle" style="color:#fff" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </a>
                                            <ul class="dropdown-menu style_dots" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="#">Edit Role</a></li>
                                                <li><a class="dropdown-item delete" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <img src="img/ceo.png" alt="ceo">
                                <p>lorem lorem</p>
                                <span>CEO</span>
                            </div>
                            <div class="employee">
                                <div class="overlay_manage">
                                    <div class="menu">
                                        <div class="dropdown employee_drop_down">
                                            <a class="dropdown-toggle" style="color:#fff" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </a>
                                            <ul class="dropdown-menu style_dots" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="#">Edit Role</a></li>
                                                <li><a class="dropdown-item delete" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <img src="img/ceo.png" alt="ceo">
                                <p>lorem lorem</p>
                                <span>CEO</span>
                            </div>
                            <div class="employee">
                                <div class="overlay_manage">
                                    <div class="menu">
                                        <div class="dropdown employee_drop_down">
                                            <a class="dropdown-toggle" style="color:#fff" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </a>
                                            <ul class="dropdown-menu style_dots" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="#">Edit Role</a></li>
                                                <li><a class="dropdown-item delete" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <img src="img/ceo.png" alt="ceo">
                                <p>lorem lorem</p>
                                <span>CEO</span>
                            </div>
                            <div class="employee">
                                <div class="overlay_manage">
                                    <div class="menu">
                                        <div class="dropdown employee_drop_down">
                                            <a class="dropdown-toggle" style="color:#fff" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </a>
                                            <ul class="dropdown-menu style_dots" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="#">Edit Role</a></li>
                                                <li><a class="dropdown-item delete" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <img src="img/ceo.png" alt="ceo">
                                <p>lorem lorem</p>
                                <span>CEO</span>
                            </div>
                            <div class="employee">
                                <div class="overlay_manage">
                                    <div class="menu">
                                        <div class="dropdown employee_drop_down">
                                            <a class="dropdown-toggle" style="color:#fff" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </a>
                                            <ul class="dropdown-menu style_dots" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="#">Edit Role</a></li>
                                                <li><a class="dropdown-item delete" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <img src="img/ceo.png" alt="ceo">
                                <p>lorem lorem</p>
                                <span>CEO</span>
                            </div>
                            <div class="employee">
                                <div class="overlay_manage">
                                    <div class="menu">
                                        <div class="dropdown employee_drop_down">
                                            <a class="dropdown-toggle" style="color:#fff" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </a>
                                            <ul class="dropdown-menu style_dots" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="#">Edit Role</a></li>
                                                <li><a class="dropdown-item delete" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <img src="img/ceo.png" alt="ceo">
                                <p>lorem lorem</p>
                                <span>CEO</span>
                            </div>
                            <div class="employee">
                                <div class="overlay_manage">
                                    <div class="menu">
                                        <div class="dropdown employee_drop_down">
                                            <a class="dropdown-toggle" style="color:#fff" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </a>
                                            <ul class="dropdown-menu style_dots" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="#">Edit Role</a></li>
                                                <li><a class="dropdown-item delete" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <img src="img/ceo.png" alt="ceo">
                                <p>lorem lorem</p>
                                <span>CEO</span>
                            </div>
                            <div class="employee">
                                <div class="overlay_manage">
                                    <div class="menu">
                                        <div class="dropdown employee_drop_down">
                                            <a class="dropdown-toggle" style="color:#fff" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </a>
                                            <ul class="dropdown-menu style_dots" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="#">Edit Role</a></li>
                                                <li><a class="dropdown-item delete" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <img src="img/ceo.png" alt="ceo">
                                <p>lorem lorem</p>
                                <span>CEO</span>
                            </div>
                            <div class="employee">
                                <div class="overlay_manage">
                                    <div class="menu">
                                        <div class="dropdown employee_drop_down">
                                            <a class="dropdown-toggle" style="color:#fff" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </a>
                                            <ul class="dropdown-menu style_dots" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="#">Edit Role</a></li>
                                                <li><a class="dropdown-item delete" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <img src="img/ceo.png" alt="ceo">
                                <p>lorem lorem</p>
                                <span>CEO</span>
                            </div>
                            <div class="employee">
                                <div class="overlay_manage">
                                    <div class="menu">
                                        <div class="dropdown employee_drop_down">
                                            <a class="dropdown-toggle" style="color:#fff" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </a>
                                            <ul class="dropdown-menu style_dots" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="#">Edit Role</a></li>
                                                <li><a class="dropdown-item delete" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <img src="img/ceo.png" alt="ceo">
                                <p>lorem lorem</p>
                                <span>CEO</span>
                            </div>
                            <div class="employee">
                                <div class="overlay_manage">
                                    <div class="menu">
                                        <div class="dropdown employee_drop_down">
                                            <a class="dropdown-toggle" style="color:#fff" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </a>
                                            <ul class="dropdown-menu style_dots" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="#">Edit Role</a></li>
                                                <li><a class="dropdown-item delete" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <img src="img/ceo.png" alt="ceo">
                                <p>lorem lorem</p>
                                <span>CEO</span>
                            </div>
                            <div class="employee">
                                <div class="overlay_manage">
                                    <div class="menu">
                                        <div class="dropdown employee_drop_down">
                                            <a class="dropdown-toggle" style="color:#fff" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </a>
                                            <ul class="dropdown-menu style_dots" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="#">Edit Role</a></li>
                                                <li><a class="dropdown-item delete" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <img src="img/ceo.png" alt="ceo">
                                <p>lorem lorem</p>
                                <span>CEO</span>
                            </div>
                            <div class="employee">
                                <div class="overlay_manage">
                                    <div class="menu">
                                        <div class="dropdown employee_drop_down">
                                            <a class="dropdown-toggle" style="color:#fff" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </a>
                                            <ul class="dropdown-menu style_dots" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="#">Edit Role</a></li>
                                                <li><a class="dropdown-item delete" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <img src="img/ceo.png" alt="ceo">
                                <p>lorem lorem</p>
                                <span>CEO</span>
                            </div>
                            <div class="employee">
                                <div class="overlay_manage">
                                    <div class="menu">
                                        <div class="dropdown employee_drop_down">
                                            <a class="dropdown-toggle" style="color:#fff" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </a>
                                            <ul class="dropdown-menu style_dots" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="#">Edit Role</a></li>
                                                <li><a class="dropdown-item delete" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <img src="img/ceo.png" alt="ceo">
                                <p>lorem lorem</p>
                                <span>CEO</span>
                            </div>
                            <div class="employee">
                                <div class="overlay_manage" id="overlay_manage">
                                    <div class="menu">
                                        <div class="dropdown employee_drop_down">
                                            <a class="dropdown-toggle" style="color:#fff" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </a>
                                            <ul class="dropdown-menu style_dots" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="#">Edit Role</a></li>
                                                <li><a class="dropdown-item delete" href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <img src="img/ceo.png" alt="ceo" id="employee_setting">
                                <p>lorem lorem</p>
                                <span>CEO</span>
                            </div>
                        </div>
                    </div>
                </div>
                
       
       

@endsection

@section('employee_script')

    <script>
        $(document).on('hover','#employee_setting' ,function(){
                console.log("done");
        });
        

        $(".employee_select2").select2({
            tags: true
        });


        $('body').on('shown.bs.modal', '.modal', function() {
        $(this).find('select').each(function() {
            var dropdownParent = $(document.body);
            if ($(this).parents('.modal.in:first').length !== 0)
            dropdownParent = $(this).parents('.modal.in:first');
            $(".employee_select2").select2({
                tags: true
            });
  });
});
    </script>

@endsection