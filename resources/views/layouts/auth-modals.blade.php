<!-- Modal -->

<div class="modal fade" id="contentModal" role="dialog">

    <div class="modal-dialog">

        <!-- Modal content-->

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times</button>

            </div>

            <div class="modal-body"></div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>

        </div>

    </div>

</div><!-- end Modal -->





<!-- Modal tearms_content -->

<div class="modal" id="tearms_content" role="dialog">

    <div class="modal-dialog">

        <!-- Modal content-->

        <div class="modal-content">

            <div class="modal-header tearms_content-header">
                <h1>{!! $terms_pobup->title !!}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body tearms_content-body" style="max-height: 500px; overflow: scroll;">{!! $terms_pobup->description !!}</div>

            <div class="modal-footer tearms_content-footer">

                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Back</button>

            </div>

        </div>

    </div>

</div><!-- end Modal -->


<!-- Modal privcy_content -->

<div class="modal" id="privcy_content" role="dialog">

    <div class="modal-dialog">

        <!-- Modal content-->

        <div class="modal-content">

            <div class="modal-header privcy_content-header">  
                <h1>{!! $privacy_pobup->title !!}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body privcy_content-body" style="max-height: 500px; overflow: scroll;">

                {!! $privacy_pobup->description !!}</div>

            <div class="modal-footer privcy_content-footer">

                

                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Back</button>

            </div>

        </div>

    </div>

</div><!-- end Modal -->



<!-- Modal sign_up_business -->

<div class="modal" id="sign_up_business" role="dialog">

    <div class="modal-dialog" >

        <div class="modal-content">

            <div class="modal-body authintication_popup">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                <h3 class="title">Nice to meet you!</h3>

                <p class="sub_title"><a href="#">Manage all your projects in one place.</a></p>

                <div class="box_field">

                    <form  method="POST" action="{{ url('register') }}" id="register_business">

                        @csrf

                        <input type="hidden" id="signuprole" name="role" value="business"/>

                        <div class="form-group">

                            <div class="field" id="field1">

                                <input type="text" name="email" id="email" placeholder="Email" >

                            </div>

                            <p class="text-danger" id="business_error_message_email"></p>

                        </div>

                        <div class="form-group">

                            <div class="field" id="field2">

                                <input type="password" name="password" id="password" placeholder="Password">

                                <span class="show_password"><i class="far fa-eye"></i></span>

                            </div>

                            <p class="text-danger" id="business_error_message_password"></p>

                        </div>

                        <div class="form-group">

                            <div class="field" id="field3">

                                <input type="password" name="password_confirmation" id="c-password" placeholder="Confirm Password">

                                <span class="show_c_password"><i class="far fa-eye"></i></span>

                            </div>

                            <p class="text-danger" id="business_error_message_confirm_password"></p>

                        </div>

                       

                        <div class="form-group">

                            <button type="submit" class="btn_sign_up_business" id="form_business">Submit</button>

                        </div>

                    </form>

                <p class="sub_title_2">By continuing, you agree to Connect's<span>

                <a href="#"  data-dismiss="modal"  class="openBtntearms_content">Terms of Service</a></span> 

                and <span> 

                <a href="#"  data-dismiss="modal"  class="openBtnprivcy_content" >Privacy Policy</a></span></p>

</div>

<p class="sign_up_link">Already have an account? <a class="sign_in_popup">Login</a></p>

</div>

</div>

</div>

</div><!-- end sign_up_business -->





 



{{-- modals --}}

<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog" id="home_popUp">

        <div class="modal-content">

            <div class="modal-body home_popup">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                <h3 class="title">Welcome to Connect</h3>

                <p class="sub_title"><a href="#">What would you like to sign up as?</a></p>

                <div class="select_type">

                    <div class="individual">

                        <a id="user_btn"><img src="{{asset('img/Individual1.png')}}" alt="Individual"></a>

                    </div>

                    <div class="business_owner">

                        <a id="business_btn"><img src="{{asset('img/business_owner1.png')}}" alt="business_owner"></a>

                    </div>

                </div>

                <p class="sign_in_link">Already part of Connect? <a class="sign_in_popup" id="sign_in_click">Sign In</a></p>

            </div>

        </div>

    </div>







    <div class="modal-dialog" >

        <div class="modal-content" id="sign_in"  style="display: none;">

            <div class="modal-body authintication_popup">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                <div class="login_popup-logo">
                    <img src="{{asset('img/connect-logo.png')}}" alt="jadwelha logo">
                </div>

                <h3 class="title">Welcome Back! </h3>

                <p class="sub_title"><a href="#">Keep up with your favorite projects.</a></p>

                <div class="box_field2">

                    <form action="{{route('login')}}" method="POST" id="login">

                        @csrf

                        <div class="form-group ">

                            <div class="field" id="field1_sign_in">

                                <input id="username" type="username"  name="username" value="{{ old('username') }}" placeholder="Username Or Email" required  autofocus>

                        </div><p class="text-danger" id="login_error_message"></p></div>



                        <div class="form-group">

                            <div class="field" id="field2_sign_in">

                                <input type="password" name="password" id="password" placeholder="Password">

                                <span class="show_password"><i class="far fa-eye"></i></span>

                            </div>

                        </div>



                        <div class="form-group" >

                            <input type="checkbox" name="log_after" id="log_after" class="mb-3"><label for="log_after" class="log_after">Remmember me</label>

                        </div>



                        <div class="form-group">

                        <button type="submit" class="btn_sign_up_business" id="form_login">Submit</button>

                        </div>

                    </form>

                    <p class="or_separate mt-4">- OR -</p>

                    <div class="social_box">

                        <a href="#">

                            <img src="{{asset('img/facebook.png')}}" alt="facebook">

                            <p><a href="{{url('auth/facebook')}}">Login with Facebook</a></p>

                        </a>

                    </div>

                    <div class="social_box">

                        <img src="{{asset('img/google.png')}}" alt="google">

                        <p><a href="{{url('auth/google')}}">Login with Google</a></p>

                    </div>

                    <p class="sub_title_2">By continuing, you agree to Connecet's

                        <span><a href="#" data-dismiss="modal"  class="openBtntearms_content">Terms of Service</a></span> and <span> <a href="#" data-dismiss="modal"  class="openBtnprivcy_content">Privacy Policy</a></span>

                    </p>

                </div>



                <div class="footer_popup d-flex">

                    <p><a href="{{ route('forget.password.get') }}">Forgot password?</a>

                    </p>

                    <p>No account yet?<a id="sign_in_both" class="sign_in_popup"> Sign Up </a></p>

                </div>

            </div>

        </div>

    </div>

</div>



<script>



$('#submodals').on('click',function(){

    $('#tearms_content').modal('hide');

    $('#privcy_content').modal('hide');

    $('#sign_in').modal('show');

    $('#registerModal').modal('show');

});



$('.openBtnprivcy_content').on('click',function(){



    $('#sign_in').modal('hide');

    $('#registerModal').modal('hide');

    $('#privcy_content').modal('show');

    $('#sign_up_business').modal('hide');



});



$('.openBtntearms_content').on('click',function(){



    $('#sign_in').modal('hide');

    $('#registerModal').modal('hide');

    $('#tearms_content').modal('show');

    $('#sign_up_business').modal('hide');

  

});



$(function(){

    $('#tearms_content').on('hidden.bs.modal', function () {

        $('#tearms_content').modal('hide');

        $('#registerModal').modal('show');

       // $('#sign_in').modal('show');

    });

});



$(function(){

    $('#privcy_content').on('hidden.bs.modal', function () {

        $('#privcy_content').modal('hide');

        $('#registerModal').modal('show');

       // $('#sign_in').modal('show');

    });

});



/*



$('.openBtn').on('click',function(){

    $('#sign_in').hide();

    $('#content_model_load').show();

    $('#content_model_load .modal-body').load($(this).data('link'),function(){

    });

});

*/

$(document).on('click', '#form_business' ,function(e){

    e.preventDefault();

    form_data =  $('#register_business').serialize();

    $.ajax({

        url : '/register',

        data: form_data,

        type: "POST",

        success : function(res){

            location.href = "/index";

        },



        error : function(err){

           $('#business_error_message_password').text('');

           $('#business_error_message_email').text('');

           $('#business_error_message_confirm_password').text('');

          //  const message  = ['The password confirmation does not match.','The password must be at least 8 characters.'];

            if (err.status === 422) {

                var err = eval("(" + err.responseText + ")");

                if(err.errors.password !== undefined)

                $('#business_error_message_password').text(err.errors.password);

                if(err.errors.email !== undefined)

                $('#business_error_message_email').text(err.errors.email);

                if(err.errors.password_confirmation !== undefined)

                $('#business_error_message_confirm_password').text(err.errors.password_confirmation);

            }



        }



    });



});



</script>

