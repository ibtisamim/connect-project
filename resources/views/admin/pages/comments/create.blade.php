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
            <form action="{{route('comments.store')}}" method="POST" autocomplete="off" >
                @csrf
                @method('POST')
                <div class="row justify-content-center">

                  <div class="col-12 col-lg-12 col-sm-12">
                    <div class="form-group">
                      <div class="controls">
                        <label>Comment Text </label>
                        <textarea type="text"  name="description"></textarea>
                        @if ($errors->has('description_en'))
                          <span class="text-danger">{{ $errors->first('description_en') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-12 col-lg-12 col-sm-12" id="parentdiv">
                    <div class="form-group">
                      <div class="controls">
                        <label>Type</label>
                              <div class="select_style_create">
                                <select class="commentable_type" name="commentable_type">
                                    <option value="0">Select Type</option>
                                    <option value="app/Models/Project">Project</option>
                                    <option value="app/Models/Post">Post</option>
                                </select>
                              </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-12 col-lg-12 col-sm-12" id="parentdiv">
                    <div class="form-group">
                      <div class="controls">
                        <label>Posts/Projects</label>
                              <div class="select_style_create">
                                <select class="js-data-posts-projects-ajax col-md-12" name="commentable_id"></select>
                              </div>
                              <p id="category_error" class="text-danger"></p>
                      </div>
                    </div>
                  </div>

                  <div class="col-12 col-lg-12 col-sm-12" id="parentdiv">
                    <div class="form-group">
                      <div class="controls">
                        <label>status</label>
                              <div class="select_style_create">
                                <select class="commentable_type" name="status">
                                  
                                    <option value="approved">approved</option>
                                    <option value="pending">pending</option>
                                    <option value="reject">reject</option>
                                    <option value="cancelled">cancelled</option>
                                </select>
                              </div>
                      </div>
                    </div>
                  </div>


                  <div class="col-12 col-lg-12 col-sm-12" id="parentdiv">
                    <div class="form-group">
                      <div class="controls">
                        <label>is approved from admin?</label>
                              <div class="select_style_create">
                                <select class="commentable_type" name="approved">
                                 
                                    <option value="1">approved</option>
                                    <option value="0">not approved</option>
                                </select>
                              </div>
                      </div>
                    </div>
                  </div>

                  
                  
                    <div class="col-6 d-flex flex-sm-row flex-column justify-content-end mt-1">
                        <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save</button>
                        <a href="{{route('comments.index')}}" class="btn btn-light">Cancel</a>
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
<script src="{{asset('js/bootstrap-prettyfile.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jpreview.js')}}"></script>
<script>
var urlbytype = "";
$('.commentable_type').on('change',function(){
  var $placholder = 'Select Project';
  type = $(this).val();
  if(type =='0'){
    alert('please, select type');
    return false;
  }

  if(type =='app/Models/Project'){
      urlbytype = "{{url('projectsselectAll')}}";
  }else{
    urlbytype = "{{url('postsselectAll')}}";
    $placholder = 'Select Post';
  }


$('.js-data-posts-projects-ajax').select2({
        placeholder: $placholder,
        minimumInputLength: 3,
        cache: true,
        ajax: {
            url: urlbytype,
            dataType: 'json',
           // delay: 250,
            data: function (data) {  
                return { 
                    searchTerm: data.term 
                };
            },
            processResults: function (response) {  
                return {
                results: $.map(response, function (item) {
                    
                    return {
                        id: item.id,
                        text: item.text,
                    }
                   
                })
                }; 
            },
        }
    });

});


</script>


@endsection
