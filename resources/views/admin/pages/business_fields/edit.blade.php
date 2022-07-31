@extends('admin.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Category Edit')
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
            <form action="{{route('business_fields.update',$businessField)}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row justify-content-center">
                  <div class="col-12 col-lg-12 col-sm-6">
                      <div class="form-group">
                        <div class="controls">
                            <label>Title (English)</label>
                            <input type="text" value="{{$businessField->title}}" required class="form-control" placeholder="Title (English)" name="title_en">
                            @if ($errors->has('title_en'))
                                <span class="text-danger">{{ $errors->first('title_en') }}</span>
                            @endif
                        </div>
                      </div>
                  </div>
                  <div class="col-12 col-lg-12 col-sm-6">
                    <div class="form-group">
                      <div class="controls">
                        <label>Description (English)</label>
                        <textarea type="text"  name="description_en">{{$businessField->description}}</textarea>
                        @if ($errors->has('description_en'))
                          <span class="text-danger">{{ $errors->first('description_en') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-12 col-sm-6">
                    <div class="form-group">
                      <div class="controls">
                        <label>Title (Arabic)</label>
                        <input type="text" value="{{$businessField->getTranslation('title', 'ar')}}" required class="form-control" placeholder="Title (Arabic)" name="title_ar">
                        @if ($errors->has('title_ar'))
                          <span class="text-danger">{{ $errors->first('title_ar') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-12 col-sm-6">
                    <div class="form-group">
                      <div class="controls">
                        <label>Description (Arabic)</label>
                        <textarea type="text"  name="description_ar">{{$businessField->getTranslation('description', 'ar')}}</textarea>
                        @if ($errors->has('description_ar'))
                          <span class="text-danger">{{ $errors->first('description_ar') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                
                    <div class="col-12 col-lg-12 col-sm-12" id="parentdiv">
                    <div class="form-group">
                      <div class="controls">
                        <label>Connected with</label>
                              <div class="select_style_create">
                                <select class="category_select2"   name="category_id[]" multiple="multiple">
                                  @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <p id="category_error" class="text-danger"></p>
                       
                      </div>
                    </div>
                    
                  <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                      <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save</button>
                      <a href="{{route('business_fields.index')}}" class="btn btn-light">Cancel</a>
                      
              
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

@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
<script src="{{asset('js/scripts/navs/navs.js')}}"></script>
<script src="{{asset('tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('js/tinymce_custom.js')}}"></script>

<script>
$(".category_select2").select2({
  dropdownParent: $('#parentdiv'),
  placeholder: "Select a state",
  selectOnClose: false,
  allowClear: true,
  tags: true
});
</script>


@endsection
