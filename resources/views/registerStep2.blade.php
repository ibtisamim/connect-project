@extends('layouts.main')
@section('title', '- Register Complete Profile: Step[2]')
@section('content')
<div class="background-home profile_business">
    <strong><center><h1 style="font-size: 30px; text-transform: uppercase;">Tell us more about you</h1></center></strong>
    <div class="box_field2" style="padding-top:5em">
                    <form action="{{route('completeRegisterStep2')}}" method="POST" id="register-step2" enctype="multipart/form-data">
                        @csrf

                        <div class="input-group mb-3">
                            <div class="col-md-3"><lable>Company Name</lable></div>
                            <div class="col-md-9">
                                <input type="text" name="companyname" id="companyname" class="form-control">
                            </div>
                        </div>
                      
                        <div class="input-group mb-3">
                            <div class="col-md-3"><lable>Description</lable></div>
                            <div class="col-md-9">
                                <input type="text" name="description" id="description" class="form-control">
                            </div>
                        </div>
                        
                        <div class="input-group mb-3">
                            <div class="col-md-3"><lable>Bio</lable></div>
                            <div class="col-md-9">
                                <input type="text" name="bio" id="bio" class="form-control">
                            </div>
                        </div>
                        
                        @php 
                            use App\Models\BusinessField;
                            $businessfields = BusinessField::where('status','Enable')->get(); 
                        @endphp                                      
                        @if(Auth::user()->role == 'business')
                        {{-- business_fields --}}   
                        <div class="input-group mb-3">
                            <div class="col-md-3"><lable>Speciality</lable></div>
                            <div class="col-md-9" id="sign_up_businessdiv">
 
                                <select class="business_field_select2 form-control"   name="business_field_id[]" multiple="multiple">
                                  @foreach($businessfields as $field)
                                    <option value="{{$field->id}}">{{$field->title}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="input-group mb-3">
                            <div class="col-md-3"><lable>Commercial Register</lable></div>
                            <div class="col-md-9">
                                <input type="file" name="commercial_register" class="form-control" >
                            </div>
                        </div>      
                        @endif
                        
                        <input type="hidden" value="" name="country_selected" id="country_selected" />
                        <div class="col-md-12 form-group row">
                            <div class="col-md-6  row" style=" margin-right: 2em;">
                                <h1>Location</h1>
                                <div class="input-group mt-3 col-md-12" id="sign_up_country">
                                    <div class="col-md-3"><lable>Country</lable></div>
                                    @php 
                                        use App\Models\Country;
                                        $countries = Country::where('status','Enable')->get(); 
                                    @endphp
                                    <div class="col-md-9">
                                    <select class="country_select2 form-control"   name="country_id" >
                                        <option value="">Select Country</option>
                                      @foreach($countries as $field)
                                        <option value="{{$field->id}}">{{$field->country}}</option>
                                      @endforeach
                                    </select>
                                    </div>
                                </div>
                        
                                 <div class="input-group mt-3 col-md-12" id="sign_up_city">
                                    <div class="col-md-3"><lable>City</lable></div>
                                    <div class="col-md-9">
                                    <select class="city_select2 form-control"   name="city_id" >
                                      <option value="">Select City</option>
                                    </select>
                                    </div>
                                </div>
                        
                                <div class="input-group mt-3 col-md-12">
                                    <div class="col-md-3"><lable>Area</lable></div>
                                    <div class="col-md-9">
                                        <input type="text" name="area" id="area" class="form-control" >
                                    </div>
                                </div>
                        
                                <div class="input-group mt-3 col-md-12">
                                    <div class="col-md-3"><lable>Street</lable></div>
                                    <div class="col-md-9">
                                        <input type="text" name="street" id="street" class="form-control">
                                    </div>
                                </div>                        
                        
                            </div>
                            <div class="col-md-6 row" >
                                <h1>Social Links</h1>
                                <div class="input-group mt-3 col-md-12">
                                    <div class="col-md-3"><lable>Linkedin</lable></div>
                                    <div class="col-md-9">
                                        <input type="text" name="linkedin" id="linkedin" class="form-control">
                                    </div>
                                </div> 
                                
                                <div class="input-group mt-3 col-md-12">
                                    <div class="col-md-3"><lable>Facebook</lable></div>
                                    <div class="col-md-9">
                                        <input type="text" name="facebook" id="facebook" class="form-control">
                                    </div>
                                </div> 
                                
                                <div class="input-group mt-3 col-md-12">
                                    <div class="col-md-3"><lable>Instagrm</lable></div>
                                    <div class="col-md-9">
                                        <input type="text" name="instagrm" id="instagrm" class="form-control">
                                    </div>
                                </div> 
                                
                                <div class="input-group mt-3 col-md-12">
                                    <div class="col-md-3"><lable>Twiter</lable></div>
                                    <div class="col-md-9">
                                        <input type="text" name="twiter" id="twiter" class="form-control">
                                    </div>
                                </div> 
                                
                                <div class="input-group mt-3 col-md-12">
                                    <div class="col-md-3"><lable>Youtube</lable></div>
                                    <div class="col-md-9">
                                        <input type="text" name="youtube" id="youtube" class="form-control">
                                    </div>
                                </div> 
                                
                                <div class="input-group mt-3 col-md-12">
                                    <div class="col-md-3"><lable>Tiktok</lable></div>
                                    <div class="col-md-9">
                                        <input type="text" name="tiktok" id="tiktok" class="form-control">
                                    </div>
                                </div> 
                                
                                <div class="input-group mt-3 col-md-12">
                                    <div class="col-md-3"><lable>Pinterest</lable></div>
                                    <div class="col-md-9">
                                        <input type="text" name="pinterest" id="pinterest" class="form-control">
                                    </div>
                                </div> 
                            </div>
                                                  
                        <input type="hidden"  name="lon" value="" id="lon" />
                        <input type="hidden"  name="lat" value="" id="lat" /> 
                        </div>{{-- section location --}}
                        
                        <div class="col-md-12 form-group row" >
                            <div style="padding:16px; min-height: 350px;">
                            <div style="border: 1px dashed #ccc; height: 100%; border-radius:5px; cursor: pointer;" id="getcurrenctlocation"> 
                            <p id="getcurrenctlocationlink" style="text-decoration: underline;">Find your location</p>
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
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script>
$(".business_field_select2").select2({
  dropdownParent: $('#sign_up_businessdiv'),
  placeholder: "Select a business field",
  allowClear: true,
  tags: true
});

$(".country_select2").select2({
  dropdownParent: $('#sign_up_country'),
  placeholder: "Select Country",
  allowClear: true,
  tags: true,
  selectOnClose: true
});

$(".city_select2").select2({
    placeholder: "Select a City",
    allowClear: true
});


$(".country_select2").on('change', function(e){
data = $(this).select2('data');
var country_id = data[0].id;
$('#country_selected').val(country_id);

$('.city_select2').select2({
  ajax: {
    url: '/get_citiesby_country_id',
    processResults: function (data) {
      // Transforms the top-level key of the response object from 'items' to 'results'
      return {
        results: data
      };
  }
}
});

}); 


$("#getcurrenctlocationlink").click(function(){
    getLocation();
});

</script>

<script language="javascript" type="text/javascript">
var x = document.getElementById("getcurrenctlocation");
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(InitializeMap);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}


var map;
var geocoder;
function InitializeMap(position) {
    $('#lon').val(position.coords.longitude);
    $('#lat').val(position.coords.latitude);
    var latlng = new google.maps.LatLng(position.coords.latitude , position.coords.longitude);
    var myOptions =
    {
        zoom: 19,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        disableDefaultUI: true
    };
    
    map = new google.maps.Map(x, myOptions);
}


</script>

@endsection


