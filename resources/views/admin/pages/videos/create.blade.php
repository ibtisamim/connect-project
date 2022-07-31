@extends('admin.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Create Page')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/validation/form-validation.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/select/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/pickadate/pickadate.css')}}">
@endsection

{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-users.css')}}">
@endsection

@section('content')
<!-- users edit start -->
<section class="users-edit mt-5">
  <div class="card">
    <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane active fade show" id="account" aria-labelledby="account-tab" role="tabpanel">
            <!-- users edit account form start -->
            <form action="{{route('videos.store')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row justify-content-center">
                  <div class="col-12  col-lg-8 col-sm-6">
                      <div class="form-group">
                        <div class="controls">
                            <label>Title (English)</label>
                            <input type="text" required class="form-control" placeholder="Title (English)" name="title_en">
                            @if ($errors->has('title_en'))
                                <span class="text-danger">{{ $errors->first('title_en') }}</span>
                            @endif
                        </div>
                      </div>
                  </div>
                  <div class="col-12  col-lg-8 col-sm-6">
                    <div class="form-group">
                      <div class="controls">
                        <label>Title (Arabic)</label>
                        <input type="text" required class="form-control" placeholder="Title (Arabic)" name="title_ar">
                        @if ($errors->has('title_ar'))
                          <span class="text-danger">{{ $errors->first('title_ar') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-8 col-sm-6">
                    <div class="form-group">
                      <div class="controls">
                        <label>Description (English)</label>
                        <textarea type="text"  name="description_en"></textarea>
                        @if ($errors->has('description_en'))
                          <span class="text-danger">{{ $errors->first('description_en') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-8 col-sm-6">
                    <div class="form-group">
                      <div class="controls">
                        <label>Description (Arabic)</label>
                        <textarea type="text"  name="description_ar"></textarea>
                        @if ($errors->has('description_ar'))
                          <span class="text-danger">{{ $errors->first('description_ar') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-8 col-sm-6">
                    <div class="form-group">
                      <div class="controls">
                            <label>Video</label>
                            <input type="file"  name="video" class="form-control d-block">
                            @if ($errors->has('video'))
                             <span class="text-danger">{{ $errors->first('video') }}</span>
                            @endif
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
            <!-- users edit account form ends -->
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
<script src="{{asset('tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('js/tinymce_custom.js')}}"></script>
@endsection
