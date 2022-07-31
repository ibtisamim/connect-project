@extends('layouts.main')
@section('title', '- Business Setting')
@section('content')

{{--
  @include('layouts.nav-mobile-business')

  <div class="navbar_backend_overview">
   @include('layouts.nav-desktop')
  </div> --}}


        <div class="dashbord_backend_overview col-lg-9">
          <div class="general_setting">
            <h2>General Settings</h2>
            <form action="{{route('business_setting.update',Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="user_img">
              <img src="{{isset($image_user->media[0]->id) ? 'uploads/'.$image_user->media[0]->id. '/'.$image_user->media[0]->file_name :'img/user_image.png' }}" alt="user_img">
                <input type="file" id="upload"  name="image" hidden/>
                <label for="upload" class="upload_img_label">Upload a picture</label>
                <a href="#" class="btn_delete">Delete</a>
            </div>
                <div class="details_user">
                <div class="form-group  name_user">
                  <label for="name">Name</label>
                  <input type="text" name="name"  value="{{$business_data->name}}" id="name" class="form-control">
                </div>
                <div class="form-group pio_user">
                  <label for="pio">Pio</label>
                  <textarea type="text" name="pio" id="pio" rows="7" class="form-control">{{$business_data->pio}}</textarea>
                </div>
                <dvi class="form-group">
                  <label>Location</label>
                  <div class="location">
                    <div class="location_info">
                      <label for="country">Country</label>
                      <input type="text" name="contry" value="{{$business_data->country}}" id="contry" class="form-control">
                    </div>
                    <div class="location_info">
                      <label for="area">Area</label>
                      <input type="text" name="area"  value="{{$business_data->area}}" id="area" class="form-control">
                    </div>
                  </div>
                  <div class="location">
                    <div class="location_info">
                      <label for="city">City</label>
                      <input type="text" name="city" value="{{$business_data->city}}" id="city" class="form-control">
                    </div>
                    <div class="location_info">
                      <label for="street">Street</label>
                      <input type="text" name="street" value="{{$business_data->street}}" id="street" class="form-control">
                    </div>
                  </div>
                </dvi>

                <dvi class="form-group">
                  <label>Social Links</label>
                  <div class="social_link">
                    <div class="social_link_info">
                      <label for="facebook">Facebook</label>
                      <input type="url" name="facebook" value="{{isset($business_data->facebook) ? $business_data->facebook : ''}}" id="facebook" class="form-control">
                    </div>
                    <div class="social_link_info">
                      <label for="instagram">Instagram</label>
                      <input type="url" name="instagram"  value="{{isset($business_data->instagram) ? $business_data->instagram : ''}}" id="instagram" class="form-control">
                    </div>
                  </div>
                  <div class="social_link">
                    <div class="social_link_info">
                      <label for="twitter">Twitter</label>
                      <input type="url" name="twitter" value="{{isset($business_data->twitter) ? $business_data->twitter :''}}" id="twitter" class="form-control">
                    </div>
                    <div class="social_link_info">
                      <label for="youtube">Youtube</label>
                      <input type="url" name="youtube" value="{{isset($business_data->youtube) ? $business_data->youtube : ''}}" id="youtube" class="form-control">
                    </div>
                    
                  </div>
                  <div class="social_link">
                    <div class="social_link_info">
                        <label for="linked_in">LinkedIn</label>
                        <input type="url" name="linked_in" value="{{isset($business_data->linked_in) ? $business_data->linked_in : ''}}" id="linked_in" class="form-control">
                    </div>
                  </div>
                </dvi>
                <dvi class="form-group">
                  <div class="scope">
                    <label>Scope of work</label>
                    <textarea name="scope_work" id="scope"  cols="30" rows="5" placeholder="For example “3D illustrator”. Type as many keywords as you want." class="form-control">{{$business_data->scope_work}}</textarea>
                  </div>
                </dvi>
                <div class="form-group">
                  <div class="upload_group">
                    <div class="profile_portfolio">
                      <p>Upload Portfolio</p>
                      <div>
                        <label for="portfolio">Upload</label>
                        <input type="file" name="portfolio"  id="portfolio" hidden/>
                        <span>(less than 60 mgb)</span>
                      </div>
                    </div>
                    <div class="profile_portfolio">
                      <p>Update Commercial Register</p>
                      <div>
                        <label for="commercial_reg">Update</label>
                        <input type="file" name="commercial_register" id="commercial_reg"hidden />
                        <span>(less than 60 mgb)</span>
                      </div>
                    </div>
                    <div class="profile_portfolio">
                      <p>Upload Awards</p>
                      <div>
                        <label for="awards">Upload</label>
                        <input type="file" name="awards" id="awards" hidden/>
                        <span>(less than 60 mgb)</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <h2 class="password_title">Password</h2>
                  <div class="password_section">
                    <label for="current_pass">Current Password</label>
                    <input type="text" name="current_password" id="current_pass" class="form-control">
                    @error('current_password')
                      <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="password_section">
                    <label for="new_pass">New Password</label>
                    <input type="text" name="new_password" id="new_pass"  class="form-control">
                    @error('new_password')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="password_section">
                    <label for="confirm_pass">Confirm New Password</label>
                    <input type="text" name="confirm" id="confirm_pass" class="form-control">
                    @error('confirm')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <div class="notification_setting">
                    <h2>Notification</h2>
                    <p>Receive notifications from Jadwelha when:</p>
                    <div class="description">
                      <p>Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</p>
                      <div class="icon_notification">
                        <i class="fas fa-check"></i>
                        <i class="far fa-envelope"></i>
                        <i class="fas fa-globe"></i>
                      </div>
                    </div>
                    <div class="description">
                      <p>Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</p>
                      <div class="icon_notification">
                        <i class="fas fa-check"></i>
                        <i class="far fa-envelope"></i>
                        <i class="fas fa-globe"></i>
                      </div>
                    </div>
                    <div class="description">
                      <p>Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</p>
                      <div class="icon_notification">
                        <i class="fas fa-check"></i>
                        <i class="far fa-envelope"></i>
                        <i class="fas fa-globe"></i>
                      </div>
                    </div>
                    <div class="description">
                      <p>Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</p>
                      <div class="icon_notification">
                        <i class="fas fa-check"></i>
                        <i class="far fa-envelope"></i>
                        <i class="fas fa-globe"></i>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="form-group">
                  <div class="setting_page_btn">
                    <button class="apply_change">Apply Changes</button>
                    <button class="cancel_btn">cancel</button>
                  </div>
                </div>
                </div>
              </form>
            </div>
          </div>
    



{{--
  @include("layouts.footer-mobile")

  @include('layouts.button_menu_business') --}}

  @endsection
