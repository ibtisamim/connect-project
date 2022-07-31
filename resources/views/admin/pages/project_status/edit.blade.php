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

            <form action="{{route('project_status.update',$projectStatus)}}" method="POST" autocomplete="off" enctype="multipart/form-data">

                @csrf

                @method('PUT')

                <div class="row justify-content-center">

                  <div class="col-12 col-lg-12 col-sm-6">

                      <div class="form-group">

                        <div class="controls">

                            <label>Title (English)</label>

                            <input type="text" value="{{$projectStatus->title}}" required class="form-control" placeholder="Title (English)" name="title_en">

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

                        <input type="text" value="{{$projectStatus->getTranslation('title', 'ar')}}" required class="form-control" placeholder="Title (Arabic)" name="title_ar">

                        @if ($errors->has('title_ar'))

                          <span class="text-danger">{{ $errors->first('title_ar') }}</span>

                        @endif

                      </div>

                    </div>

                  </div>


                  <div class="col-12 col-lg-12 col-sm-12" id="parentCountrydiv">

                      <div class="form-group">

                        <div class="controls">

                          <label>Level</label>

                             <select class="form-control"  name="level" >

                                  <option value="start">start</option>

                                  <option value="middle">middle</option>

                                  <option value="end">end</option>

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

                                <option value="Enable" @if($projectStatus->status == 'Enable') {{'selected'}} @endif >Enable</option>

                                <option value="Disable" @if($projectStatus->status == 'Disable') {{'selected'}} @endif >Disable</option>    

                            </select>

                            <p id="category_error" class="text-danger"></p>

                       

                      </div>

                    </div>

                  </div>

                    

                  <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">

                      <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save</button>

                      <a href="{{route('project_status.index')}}" class="btn btn-light">Cancel</a>

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

