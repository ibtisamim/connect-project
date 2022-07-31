@extends('admin.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Admin Create')
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
<!-- admins edit start -->
<section class="users-edit mt-5">
  <div class="card">
    <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane active fade show" id="account" aria-labelledby="account-tab" role="tabpanel">
            <!-- admins edit account form start -->
            <form action="{{route('admins.store')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row justify-content-center">
                  <div class="col-12 col-lg-7 col-sm-6">
                      <div class="form-group">
                        <div class="controls">
                            <label>Name</label>
                            <input type="text" required class="form-control" placeholder="Name" name="name">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                          <label>Password</label>
                            <input type="password" required autocomplete="off" class="form-control" placeholder="Password" name="password">
                            @if ($errors->has('password'))
                              <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                      </div>
                  </div>
                  <div class="col-12  col-lg-7 col-sm-6">
                      <div class="form-group">
                        <div class="controls">
                          <div class="form-group">
                            <label>Image</label>
                            <input type="file" required name="image" hidden class="demo" id="exampleInputFile"  data-jpreview-container="#demo-1-container" >
                          </div>
                          <label for="exampleInputFile" id="demo-1-container" class="jpreview-container"></label>
                          @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
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
            <!-- admins edit account form ends -->
        </div>
      </div>
    </div>
  </div>
</section>
<!-- admins edit ends -->
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

<script src="{{asset('js/bootstrap-prettyfile.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jpreview.js')}}"></script>
<script>
  $('input[type="file"]').prettyFile();
  $('.demo').jPreview();
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
@endsection
