@extends('admin.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Report Reason Edit')


@section('content')
<!-- users edit start -->
<section class="users-edit mt-5">
  <div class="card">
    <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane active fade show" id="account" aria-labelledby="account-tab" role="tabpanel">
            <!-- users edit account form start -->
            <form action="{{route('report_reasons.update',$reportReason)}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row justify-content-center">
                  <div class="col-12 col-lg-12 col-sm-6">
                      <div class="form-group">
                        <div class="controls">
                            <label>Title (English)</label>
                            <input type="text" value="{{$reportReason->reason}}" required class="form-control" placeholder="Title (English)" name="title_en">
                            @if ($errors->has('title_en'))
                                <span class="text-danger">{{ $errors->first('title_en') }}</span>
                            @endif
                        </div>
                      </div>
                  </div>

                  <div class="col-12 col-lg-12 col-sm-6">
                    <div class="form-group">
                      <div class="controls">
                        <label>Title (Arabic)</label>
                        <input type="text" value="{{$reportReason->getTranslation('reason', 'ar')}}" required class="form-control" placeholder="Title (Arabic)" name="title_ar">
                        @if ($errors->has('title_ar'))
                          <span class="text-danger">{{ $errors->first('title_ar') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="col-12 col-lg-12 col-sm-12" id="parentCountrydiv">
                    <div class="form-group">
                      <div class="controls">
                        <label>Type</label>
                           <select class="form-control"  name="type" >
                                <option value="project">project</option>
                                <option value="rfq">rfq</option>
                                <option value="bussinessprofile">bussinessprofile</option>
                                <option value="user">user</option>
                                <option value="job">job</option>

                            </select>
                            <p id="category_error" class="text-danger"></p>
                      </div>
                    </div>
                  </div>

                  <div class="col-12 col-lg-12 col-sm-12" id="parentCountrydiv">
                    <div class="form-group">
                      <div class="controls">
                        <label>Action</label>
                           <select class="form-control"  name="action" >
                                <option value="report_all_of_category">report_all_of_category</option>
                                <option value="report_owner">report_owner</option>  
                                <option value="report_content">report_content</option>    
                            </select>
                            <p id="category_error" class="text-danger"></p>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-12 col-lg-12 col-sm-12" id="parentCountrydiv">
                    <div class="form-group">
                      <div class="controls">
                        <label>Status</label>
                           <select class="form-control"  name="status" >
                                <option value="Enable" @if($reportReason->status == 'Enable') {{'selected'}} @endif >Enable</option>
                                <option value="Disable" @if($reportReason->status == 'Disable') {{'selected'}} @endif >Disable</option>    
                            </select>
                            <p id="category_error" class="text-danger"></p>
                       
                      </div>
                    </div>
                  </div>
                    
                  <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                      <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save</button>
                      <a href="{{route('report_reasons.index')}}" class="btn btn-light">Cancel</a>
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


{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
<script src="{{asset('js/scripts/navs/navs.js')}}"></script>

@endsection
