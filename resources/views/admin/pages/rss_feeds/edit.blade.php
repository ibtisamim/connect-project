@extends('admin.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Rss Feed Edit')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/validation/form-validation.css')}}">
@endsection
{{-- page styles --}}



@section('content')

<!-- users edit start -->



<section class="users-edit mt-5">



  <div class="card">



    <div class="card-body">



      <div class="tab-content">



        <div class="tab-pane active fade show" id="account" aria-labelledby="account-tab" role="tabpanel">



            <!-- users edit account form start -->

            <form action="{{route('rss_feeds.update',$rssFeed)}}" method="POST" autocomplete="off" >
                @csrf
                @method('PUT')
                <div class="row justify-content-center">
                  <div class="col-12 col-lg-12 col-sm-6">
                      <div class="form-group">
                        <div class="controls">
                            <label>Title</label>
                            <input type="text" value="{{$rssFeed->title}}" required class="form-control" placeholder="Title" name="title_en">
                            @if ($errors->has('title_en'))
                                <span class="text-danger">{{ $errors->first('title_en') }}</span>
                            @endif
                        </div>
                      </div>
                  </div>

                  <div class="col-12 col-lg-12 col-sm-12">
                      <div class="form-group">
                        <div class="controls">
                            <label>Rss Link</label>
                            <input type="text" required class="form-control" placeholder="Rss Link" name="rss_link" value="{{$rssFeed->rss_link}}">
                            @if ($errors->has('rss_link'))
                                <span class="text-danger">{{ $errors->first('rss_link') }}</span>
                            @endif
                        </div>
                      </div>
                  </div>

                  <div class="col-12 col-lg-12 col-sm-12" id="parentdiv">
                    <div class="form-group">
                      <div class="controls">
                        <label>Status</label>
                              <div class="">
                                <select class="form-control"   name="status" >
                                    <option value="Enable" @if($rssFeed->rss_link=='Enable') selected @endif>Enable</option>
                                    <option value="Disable" @if($rssFeed->rss_link=='Disable') selected @endif>Disable</option>
                                </select>
                              </div>
                              <p id="category_error" class="text-danger"></p>
                      </div>
                    </div>
                  </div>

                    <div class="col-12 col-lg-12 col-sm-12" id="parentdiv">


                  <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                      <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save</button>
                      <a href="{{route('rss_feeds.index')}}" class="btn btn-light">Cancel</a>
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
<script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
@endsection





