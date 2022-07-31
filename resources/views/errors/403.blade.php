@extends('layouts.main')
@section('title', '- Register Complete Profile: Step[2]')
@section('content')
<div class="background-home profile_business">
    
    <strong><center><h1 style="font-size: 30px; text-transform: uppercase;">Tell us more about you</h1></center></strong>
    
    <div class="box_field2" style="padding-top:5em">
                    <form action="{{route('login')}}" method="POST" id="login">
                        @csrf
                     
                        <div class="col-md-12 form-group row">
                            <div class="col-md-3"><lable>Company Name</lable></div>
                            <div class="col-md-9">
                            <div class="field" id="field1_sign_in">
                                <input type="text" name="companyname" id="companyname" >
                            </div>
                            </div>
                        </div>
                      
                        <div class="col-md-12 form-group row">
                            <div class="col-md-3"><lable>Description</lable></div>
                            <div class="col-md-9">

                                <input type="text" name="description" id="description" >
                          
                            </div>
                        </div>
                                      
                        {{-- business_fields --}}   
                        <div class="col-md-12 form-group row">
                            <div class="col-md-3"><lable>Speciality</lable></div>
                            <div class="col-md-9">
                                @php 
                                    use App\Models\BusinessField;
                                    $businessfields = BusinessField::where('status','Enable')->get(); 
                                @endphp
                                <select class="business_field_select2"   name="business_field_id" >
                                  @foreach($businessfields as $field)
                                    <option value="{{$field->id}}">{{$field->title}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <br/>
                        <div class="col-md-12 form-group row">
                            <div class="col-md-3"><lable>Commercial Register</lable></div>
                            <div class="col-md-9">
                                <input type="file" name="commercial_register" />
                            </div>
                        </div>      
                        
                        <h1>Location</h1>
                        <div class="col-md-12 form-group row">
                            <div class="col-md-8 form-group row">
                                 <div class="col-md-12 form-group row">
                                    <div class="col-md-3"><lable>Country</lable></div>
                                    
                                    <div class="col-md-9">
                                        <input type="text" name="companyname" id="companyname" >
                                    </div>
                                </div>
                        
                         <div class="col-md-12 form-group row">
                            <div class="col-md-3"><lable>City</lable></div>
                            
                            <div class="col-md-9">
                                <input type="text" name="companyname" id="companyname" >
                            </div>
                        </div>
                        

                         <div class="col-md-12 form-group row">
                            <div class="col-md-3"><lable>Area</lable></div>
                            <div class="col-md-9">
                                <input type="text" name="area" id="area" >
                            </div>
                        </div>
                        

                         <div class="col-md-12 form-group row">
                            <div class="col-md-3"><lable>Street</lable></div>
                            
                            <div class="col-md-9">
                                <input type="text" name="street" id="street" >
                            </div>
                        </div>                        
                        
                            </div>
                            <div class="col-md-4 form-group row">Map</div>
                            
                        </div>{{-- section location --}}
                            
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
    $(".business_field_select2").select2({
      dropdownParent: $('#sign_up_businessdiv'),
      placeholder: "Select a business field",
      allowClear: true,
      tags: false
    });
</script>
@endsection


