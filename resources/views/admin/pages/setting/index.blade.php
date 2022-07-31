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
      <div class="col-12 d-flex align-items-center justify-content-end pb-1">
        <a href="{{route('setting_edit')}}" class="btn btn-sm btn-success mt-2">Edit Data</a>
      </div>
      <div class="card-body">
        <div class="tab-content">
          <div class="tab-pane active fade show" id="account" aria-labelledby="account-tab" role="tabpanel">

            <form action="{{route('setting_store')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                  @csrf
                  @method('POST')
                  <div class="row">

                  @foreach($setting as $set)
                    @if($set->key == 'description_ar')
                        <div class="col-12 col-lg-12  col-sm-6">
                          <div class="form-group">
                            <div class="controls">
                              <label>{{$set->key}}</label>
                              <textarea type="text" readonly  rows="7" name="question_ar" class="form-control">{{$set->value}}</textarea>
                            </div>
                          </div>
                        </div>
                      @elseif($set->key == 'description_en')
                        <div class="col-12 col-lg-12  col-sm-6">
                          <div class="form-group">
                            <div class="controls">
                              <label>{{$set->key}}</label>
                              <textarea type="text" readonly  rows="7" name="{{$set->key}}" class="form-control">{{$set->value}}</textarea>
                            </div>
                          </div>
                        </div>
                      @else
                        <div class="col-12  col-sm-6">
                          <div class="form-group">
                            <div class="controls">
                              <label>{{$set->key}}</label>
                              <input type="text" readonly name="{{$set->key}}" class="form-control" value="{{$set->value}}">
                            </div>
                          </div>
                        </div>
                      @endif
                    @endforeach

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
