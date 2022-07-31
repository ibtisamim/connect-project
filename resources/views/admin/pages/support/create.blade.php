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
            <!-- users edit account form start -->
            <form action="{{route('support.store')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row justify-content-center">

                  <div class="col-12 col-lg-8 col-sm-6">
                    <div class="form-group">
                      <div class="controls">
                        <label>Question (English)</label>
                        <textarea type="text"  name="question_en"></textarea>
                        @if ($errors->has('question_en'))
                          <span class="text-danger">{{ $errors->first('question_en') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-8 col-sm-6">
                    <div class="form-group">
                      <div class="controls">
                        <label>Question (Arabic)</label>
                        <textarea type="text"  name="question_ar"></textarea>
                        @if ($errors->has('question_ar'))
                          <span class="text-danger">{{ $errors->first('question_ar') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="col-12 col-lg-8 col-sm-6">
                    <div class="form-group">
                      <div class="controls">
                        <label>Answer (English)</label>
                        <textarea type="text"  name="answer_en"></textarea>
                        @if ($errors->has('answer_en'))
                          <span class="text-danger">{{ $errors->first('answer_en') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-8 col-sm-6">
                    <div class="form-group">
                      <div class="controls">
                        <label>Answer (Arabic)</label>
                        <textarea type="text"  name="answer_ar"></textarea>
                        @if ($errors->has('answer_ar'))
                          <span class="text-danger">{{ $errors->first('answer_ar') }}</span>
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
