@extends('layouts.main')
@section('title', '- Register Complete Profile: Step[2]')
@section('content')
<div class="background-home profile_business">
    <strong><center><h1 style="font-size: 30px; text-transform: uppercase;">Tell us more about you</h1></center></strong>
    <div class="box_field2" style="padding-top:5em">
                    <form action="{{route('completeRegisterStep2')}}" method="POST" id="register-step2" enctype="multipart/form-data">
                        @csrf
                        
                <p class="col-md-12" id="main_title_register">General Info</p>
                <div class="row">
                            
                        <div class="input-group mb-3 col-md-6">
                            <div class="col-md-3"><lable>First Name</lable></div>
                            <div class="col-md-9">
                                <input type="text" name="firstname" id="firstname" class="form-control" value="{{ old('firstname') }}">
                            </div>
                        </div>
                        
                        
                        <div class="input-group mb-3 col-md-6">
                            <div class="col-md-3"><lable>Last Name</lable></div>
                            <div class="col-md-9">
                                <input type="text" name="lastname" id="lastname" class="form-control" value="{{ old('lastname') }}">
                            </div>
                        </div>
                        
                        
                </div>
                      
                        <div class="input-group mb-3">
                            <div class="col-md-3"><lable>Bio</lable></div>
                            <div class="col-md-9">
                                <input type="text" name="bio" id="bio" class="form-control" value="{{ old('bio') }}">
                            </div>
                        </div>
                        
                        <div class="input-group mb-3">
                            <div class="col-md-3"><lable>Position</lable></div>
                            <div class="col-md-9">
                                <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}">
                            </div>
                        </div>
                                                
                        <p class="col-md-12 row" id="main_title_register">Social Links</p>
                        <div class="col-md-12">
                            
                            <div class="row" >
                               
                                <div class="form-group col-md-6 d-flex">
                                    <div class="col-md-3"><lable>Linkedin</lable></div>
                                    <div class="col-md-9">
                                        <input type="text" name="linkedin" id="linkedin" class="form-control" value="{{ old('linkedin') }}">
                                    </div>
                                </div> 
                                
                                <div class="form-group col-md-6 d-flex">
                                    <div class="col-md-3"><lable>Facebook</lable></div>
                                    <div class="col-md-9">
                                        <input type="text" name="facebook" id="facebook" class="form-control" value="{{ old('facebook') }}">
                                    </div>
                                </div> 
                            </div>
                             <div class="row mt-3"> 
                                <div class="form-group col-md-6 d-flex">
                                    <div class="col-md-3"><lable>Instagrm</lable></div>
                                    <div class="col-md-9">
                                        <input type="text" name="instagrm" id="instagrm" class="form-control" value="{{ old('instagrm') }}">
                                    </div>
                                </div> 
                                
                                <div class="form-group col-md-6 d-flex">
                                    <div class="col-md-3"><lable>Twiter</lable></div>
                                    <div class="col-md-9">
                                        <input type="text" name="twiter" id="twiter" class="form-control" value="{{ old('twiter') }}">
                                    </div>
                                </div> 
                            </div>
                             <div class="row mt-3">    
                                <div class="form-group col-md-6 d-flex">
                                    <div class="col-md-3"><lable>Youtube</lable></div>
                                    <div class="col-md-9">
                                        <input type="text" name="youtube" id="youtube" class="form-control" value="{{ old('youtube') }}">
                                    </div>
                                </div> 
                                
                                <div class="form-group col-md-6 d-flex">
                                    <div class="col-md-3"><lable>Tiktok</lable></div>
                                    <div class="col-md-9">
                                        <input type="text" name="tiktok" id="tiktok" class="form-control" value="{{ old('tiktok') }}">
                                    </div>
                                </div> 
                            </div>

                                <div class=" form-group col-md-6 d-flex d-none">
                                    <div class="col-md-3"><lable>Pinterest</lable></div>
                                    <div class="col-md-9">
                                        <input type="text" name="pinterest" id="pinterest" class="form-control">
                                    </div>
                                </div> 
                           
                        </div>

                        <p class="col-md-12 row" id="main_title_register">Contact</p>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-6 d-flex">
                                    <div class="col-md-5"><lable>Phone Number</lable></div>
                                    <div class="col-md-7" id="sign_up_country">
                                        <select class="country_select2 col-md-12" name="country_key" >
                                          @foreach($countries as $field)
                                           @if($field->country_key)
                                            <option value="{{$field->country_key}}">{{$field->country_key}}</option>
                                            @endif
                                          @endforeach
                                        </select>
                                    </div>
                                </div> 

                                <div class="form-group col-md-6 d-flex">
                                       <input type="text" name="phone" id="phone" class="form-control" maxlength="9" value="{{ old('phone') }}">
                                </div>

                            </div>
                        </div>
                        
                   
                        
                        </div>
                        
                
                        
                        
                        <div class="form-group">
                            <center>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </center>
                        </div>
                    </form>
                </div>
</div>

@endsection
@section('popup_script')

<script>
$(".country_select2").select2({
  dropdownParent: $('#sign_up_country'),
  placeholder: "Select Country",
  allowClear: true,
  tags: true,
  selectOnClose: true
});
</script>

@endsection


