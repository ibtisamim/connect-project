@extends('layouts.home')

@section('content')

    <div class="navbar_backend_overview">
        @include('layouts.nav-mobile-business')

        @include('layouts.nav-desktop')
    </div>


    <div class="background_dashbord_overview">
        <div class="container">
            <div class="row dashbord_backend_overview">
                <div class="col-lg-3 d-none d-lg-block d-xl-block">
                    <h4>Dashboard</h4>
                    @include('layouts.project-sidebar')
                </div>
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 recent_update">
                    <div class="setting_project_page">
                        <h3 class="title_section">General Settings</h3>
                        <form action="{{route('setting_project.update',$project->id)}}" method="post">
                            @csrf 
                            @method('PUT')
                        <div class="title">
                            <div class="left">
                                <label for="title">Title</label>
                            </div>
                            <div class="right">
                                <input type="text" name="title" id="title" class="form-control" value="{{$project->called}}">
                            </div>
                        </div>

                        <div class="description">
                            <div class="left">
                                <label for="description">Description</label>
                            </div>
                            <div class="right">
                                <textarea name="description" class="form-control" id="description" cols="30" rows="5">{{$project->description}}</textarea>
                            </div>
                        </div>


                        <div class="category">
                            <div class="left">
                                <label for="category">Category</label>
                            </div>
                            <div class="right">
                                <select name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{$category->category_id}}"  @if($category->category_id == $project->category) selected @endif>{{$category->title}}</option>
                                        @endforeach
                                </select>
                                
                            </div>
                        </div>

                        <div class="date">
                            <div class="start_date">
                                <div class="left">
                                    <label for="start_date">Starting Date</label>
                                </div>
                                <div class="right">
                                    <input type="date" class="form-control" name="start_date" value="{{ date('Y-m-d',strtotime($project->start_date))}}" id="start_date">
                                </div>
                            </div>
                            <div class="end_date">
                                <div class="left">
                                    <label for="end_date">End Date</label>
                                </div>
                                <div class="right">
                                    <input type="date" class="form-control" value="{{date('Y-m-d',strtotime($project->end_date))}}" name="end_date" id="end_date">
                                </div>
                            </div>
                        </div>

                        <div class="privacy">
                            <div class="left">
                                <label for="privacy">Privacy</label>
                            </div>
                            <div class="right">
                                <input type="radio" name="privacy_type"   value="1"
                                 @if($project->privacy == 1)
                                  checked
                                 @endif 
                                   id="private"><label for="private">Private</label>

                                <input type="radio" name="privacy_type"  value="0"
                                 @if($project->privacy == 0) 
                                   checked 
                                
                                  @endif id="public"><label for="public">Public</label>
                            </div>
                        </div>

                    </div>

                    <h3 class="title_section">Location</h3>
                    <div class="location_project_page">
                        <div class="left">

                            <div class="location_style">
                                <div class="left">
                                    <label for="country">Country</label>
                                </div>
                                <div class="right">
                                    <input type="text" name="country" id="country" value="{{isset($project->country) ? $project->country : ''}}"  class="form-control">
                                </div>
                            </div>

                            <div class="location_style">
                                <div class="left">
                                    <label for="country">City</label>
                                </div>
                                <div class="right">
                                    <input type="text" name="city" id="city"  value="{{isset($project->city) ? $project->city : ''}}"   class="form-control">
                                </div>
                            </div>


                            <div class="location_style">
                                <div class="left">
                                    <label for="area">Area</label>
                                </div>
                                <div class="right">
                                    <input type="text" name="area" id="area" value="{{isset($project->area) ? $project->area : ''}}" class="form-control">
                                </div>
                            </div>


                            <div class="location_style">
                                <div class="left">
                                    <label for="country">Street</label>
                                </div>
                                <div class="right">
                                    <input type="text" name="street" id="street" value="{{isset($project->street) ? $project->street : ''}}" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="right">
                             <div id="map" style="margin-left:20px;height:100%;width:100%"></div>
                        </div>
                    </div>


                    <h3 class="title_section">Integrations</h3>
                    <div class="setting_project_page">
                        <div class="google_analytics">
                            <div class="left">
                                <label for="google_analytics">Google Analytics</label>
                            </div>
                            <div class="right">
                                <input type="text" name="google_analytics" id="google_analytics" class="form-control">
                            </div>
                        </div>
                    </div>


                    <h3 class="title_section">Danger Zone</h3>
                    <div class="setting_project_page">
                        <div class="delete_project">
                            <div class="left">
                                <label for="delete_project">Delete Project</label>
                            </div>
                            <div class="right">
                                <button class="style_button_delete" type="button">Request Deletion</button>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="lat"  id="lat" value="{{isset($project->lat) ? $project->lat : ''}}">
                    <input type="hidden" name="long" id="long" value="{{isset($project->long) ? $project->long : ''}}">

                    <div class="btn_bottom_section">
                        <button class="apply" type="submit">Apply Changes</button>
                        <button class="cancel">Cancel</button>
                    </div>

                    </form>

                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <script>
        var map;
        var markers = [];
        var marker;
        
        var latt = parseFloat("{{isset($project) && isset($project->lat) ? $project->lat : ''}}");
        var longg = parseFloat("{{isset($project)  && isset($project->long) ? $project->long : ''}}");
        var myLatLng = {lat: latt, lng: longg};
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 31.9446628, lng: 35.8902066},
            zoom: 13
            });
            placeMarker(myLatLng);
            google.maps.event.addListener(map, 'click', function(event) {
                console.log(event);
                placeMarker(event.latLng);
                get_place_name(event.latLng);
                $('#long').val(event.latLng.lng());
                $('#lat').val(event.latLng.lat());
            });
            var geoloccontrol = new klokantech.GeolocationControl(map, 15);


            // Bias the SearchBox results towards places that are within the bounds of the
            // current map's viewport.
            google.maps.event.addListener(map, 'bounds_changed', function() {
                var bounds = map.getBounds();
                searchBox.setBounds(bounds);
            });
        }

        function get_place_name(latlng){
            var geocoder = new google.maps.Geocoder;
            geocoder.geocode({
            'location': latlng
                }, function(results, status) {
                   
                if (status === 'OK') {
                    if (results[0]) {
                        
                       $('#city').val(results[0].address_components[3].long_name);
                       $('#country').val(results[0].address_components[5].long_name);
                       $('#street').val(results[0].address_components[1].long_name);
                       $('#area').val(results[0].address_components[2].long_name);
                     

                    } else {
                        window.alert('No results found');
                    }
                } else {
                window.alert('Geocoder failed due to: ' + status);
                }
            });
        }


        function placeMarker(location) {
            for (var i = 0, marker; marker = markers[i]; i++) {
                    marker.setMap(null);
                    }
                markers = [];
                marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    draggable: true
                });
                markers.push(marker);
        }
        </script>
        
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsZARr0gYQIuhbaskZjeDNQ9wuc45PwRI&callback=initMap&libraries=places&sensor=false"
    async defer></script>

    
        @include("layouts.footer-desktop")

        @include('layouts.button_menu_project')

        @include("layouts.footer-mobile")

    </div>

@endsection