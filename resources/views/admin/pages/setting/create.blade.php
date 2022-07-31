@extends('admin.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Create Support')
{{-- vendor styles --}}
@section('vendor-styles')
  <link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/validation/form-validation.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/select/select2.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/pickadate/pickadate.css')}}">
@endsection

{{-- page styles --}}
@section('page-styles')
  <link rel="stylesheet" type="text/css" href="{{asset('css/jpreview.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-users.css')}}">
@endsection

@section('content')
  <!-- users edit start -->
  <section class="users-edit mt-5">
    <div class="card">
      <div class="card-body">
        <div class="tab-content">
          <div class="tab-pane active fade show" id="account" aria-labelledby="account-tab" role="tabpanel">
            <form action="{{route('support.store')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @method('POST')
              <div class="row">


                <div class="col-12  col-sm-6">
                  <div class="form-group">
                    <div class="controls">
                      <label>Facebook</label>
                      <input type="text" readonly name="facebook" class="form-control" value="{{isset($setting->facebook) ? $setting->facebook : ''}}">
                    </div>
                  </div>
                </div>
                <div class="col-12  col-sm-6">
                  <div class="form-group">
                    <div class="controls">
                      <label>Instagram</label>
                      <input type="text" readonly name="instagram" class="form-control" value="{{isset($setting->instagram) ? $setting->instagram : ''}}">
                    </div>
                  </div>
                </div>
                <div class="col-12  col-sm-6">
                  <div class="form-group">
                    <div class="controls">
                      <label>Twitter</label>
                      <input type="text" readonly name="twitter" class="form-control" value="{{isset($setting->twitter) ? $setting->twitter : ''}}">
                    </div>
                  </div>
                </div>
                <div class="col-12  col-sm-6">
                  <div class="form-group">
                    <div class="controls">
                      <label>Pinterest</label>
                      <input type="text" readonly name="pinterest" class="form-control" value="{{isset($setting->pinterest) ? $setting->pinterest : ''}}">
                    </div>
                  </div>
                </div>
                <div class="col-12  col-sm-6">
                  <div class="form-group">
                    <div class="controls">
                      <label>Youtube</label>
                      <input type="text" readonly name="youtube" class="form-control" value="{{isset($setting->youtube) ? $setting->youtube : ''}}">
                    </div>
                  </div>
                </div>
                <div class="col-12  col-sm-6">
                  <div class="form-group">
                    <div class="controls">
                      <label>Linkedin</label>
                      <input type="text" readonly name="linkedin" class="form-control" value="{{isset($setting->linkedin) ? $setting->linkedin : ''}}">
                    </div>
                  </div>
                </div>



                <div class="col-12  col-sm-6">
                  <div class="form-group">
                    <div class="controls">
                      <label>telephone</label>
                      <input type="tel" readonly name="telephone" class="form-control" value="{{isset($setting->telephone) ? $setting->telephone : ''}}">
                    </div>
                  </div>
                </div>

                <div class="col-12  col-sm-6">
                  <div class="form-group">
                    <div class="controls">
                      <label>Location</label>
                      <input type="text" readonly name="location" class="form-control" value="{{isset($setting->location) ? $setting->location : ''}}">
                    </div>
                  </div>
                </div>

                <div class="col-12  col-sm-6">
                  <div class="form-group">
                    <div class="controls">
                      <label>Mobile</label>
                      <input type="text" readonly name="mobile" class="form-control" value="{{isset($setting->mobile) ? $setting->mobile : ''}}">
                    </div>
                  </div>
                </div>

                <div class="col-12 col-lg-12  col-sm-6">
                  <div class="form-group">
                    <div class="controls">
                      <label>Question (Arabic)</label>
                      <textarea type="text" readonly  rows="7" name="question_ar" class="form-control"></textarea>
                    </div>
                  </div>
                </div>

                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                  <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                    changes</button>
                  <button type="reset" class="btn btn-light">Cancel</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- users edit ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
  <script src="{{asset('vendors/js/forms/select/select2.full.min.js')}}"></script>
  <script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
  <script src="{{asset('vendors/js/pickers/pickadate/picker.js')}}"></script>
  <script src="{{asset('vendors/js/pickers/pickadate/picker.date.js')}}"></script>

@endsection

{{-- page scripts --}}
@section('page-scripts')
  <script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
  <script src="{{asset('js/scripts/navs/navs.js')}}"></script>
@endsection
