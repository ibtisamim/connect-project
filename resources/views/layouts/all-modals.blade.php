{{-- start model create new collection --}}
 <div class="modal fade" id="create_collection_pobup" role="dialog" aria-labelledby="create_collection_pobup" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content" id="create_collection_pobup">
          <div class="modal-header" style="text-align: left;">
            <h1 class="modal-title" id="title"><strong>Create Collection</strong></h1>
            <div class="close_popup" data-bs-dismiss="modal">
              <i class="fas fa-times"></i>
            </div>
          </div>
          <div class="modal-body">
            @if(Auth::user())
            <form action="{{route('collection.store')}}" method="POST" id="collection_add_new_form" enctype="multipart/form-data">
            <div class="box_content">
            @csrf 
            <input type="hidden" name="project_id" class="projectidtocollection" value="0" />
            <div class="row form-group">
              <label for="title">Title</label>
              <input type="text" name="name" id="collection_title" class="form-control">
            </div>

            <div class="row form-group">
              <label for="description">Description</label>
              <input type="text" name="description" id="collection_desc" class="form-control">

            </div>

            <div class="row form-group">
              <label for="private">Privacy</label>
              <input type="checkbox" name="private" id="collection_private">
            </div>

            <input type="hidden" name="user_id" value="{{Auth::user()->id}}" /> 
            <input type="hidden" name="id" id="collection_id" value="" /> 
            <div class="row form-group">
            <div class="setting_page_btn">
            <button class="apply_change" type="submit">Save</button>
             <button  class="btn" id="next_button">Skip</button>
            </div>
            </div>
            </div>
            </form> 
            @endif
          </div>
          <div class="modal-footer">
         
          </div>
        </div>

    </div>
  </div>
{{-- end model create new collection --}}

 {{-- start  model add to collection --}}
  <div class="modal fade" id="add_collection_after_follow_project" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
      <form action="{{route('project.addcollection')}}" method="POST" id="save_to_collection_form">
        @csrf
        <input type="hidden" name="project_id" class="projectidtocollection" value="0" />
        <div class="modal-content request_project_page1" id="request_project_page1">
          <div class="modal-header" style="text-align: left;">
            <h1 class="modal-title" id="title"><strong>Add to Collection</strong></h1>
            <div class="close_popup" data-bs-dismiss="modal">
              <i class="fas fa-times"></i>
            </div>
          </div>
          <div class="modal-body request_project_form">
            @if(Auth::user())
            <div class="owl-carousel front-end-page-collection owl-theme">
                        @foreach(Auth::user()->collections as $collection)
                        <div class="single_category home_page_card" style="padding: 5px; position:relative">
                         <input type="radio" id="myId"class="select_collection_radio" name="collection_id" value="{{$collection->id}}">   
                         <label></label>
                        <div class="image_category_project">
                            @foreach($collection->projects as $collectionroject)
                            @if($collectionroject->photo)
                            <img src="{{$collectionroject->photo}}" class="collection_project_img">
                            @else
                            <img src="/img/logo-black.svg" class="collection_project_img">
                            @endif
                            @endforeach 
                        </div>
                        <div class="info_category">
                            <div>
                                <h2><strong>{{$collection->name}}</strong></h2>
                                <p>{{$collection->description}}</p>
                            </div>
                        </div>
                        </div>
                        @endforeach   

                        <div class="single_category home_page_card" style="padding: 5px; position:relative">
                            <a href="" alt="Add new collection" title="Add new collection" class='add_new_collection_link' data-bs-toggle="modal" data-bs-target="#create_collection_pobup">
                            <div class="info_category">
                                <img src="{{url('css/assets/website-icons/plus.svg')}}" style="width: 50%;"/>
                            </div>
                            </a>

                        </div>         
            </div> 
            @endif
          </div>
          <div class="modal-footer justify-content-center">
            <button type="submit" class="next_button" id="next_button">Save</button> 
            <button  class="btn" id="next_button">Skip</button>
          </div>
        </div>
      </form>
    </div>
  </div>

 {{-- end add to collection --}}
 
{{-- start  model share --}}
<div class="modal fade" id="sharemodel_card" role="dialog" aria-labelledby="sharemodel_card" aria-hidden="true">
<div class="modal-dialog modal-l">
<div class="modal-content">
<div class="modal-header"></div>
<div class="modal-body">
 <div class="sharemodel_card"></div>                
</div>
<div class="modal-footer"></div>
</div>        
</div>
</div>

{{-- end model share --}} 
 {{-- start model add new question --}}
 <div class="modal fade" id="new_question_modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog questions_dialog">
         <form action="{{route('questionweb.Store')}}" method="POST" id="new_question_form" enctype="multipart/form-data">
             @csrf
             <div class="modal-content request_project_page1" id="request_project_page1">
                 <div class="modal-header">
                     <h1 class="modal-title" id="title">Ask question!</h1>
                     <div class="close_popup" data-bs-dismiss="modal">
                         <i class="fas fa-times"></i>
                     </div>
                 </div>
                 <div class="modal-body request_project_form">
                     <div class="form-group popUp_field">
                         <div class="left">
                             <label>Title</label>
                         </div>
                         <div class="right">
                             <input type="text" name="title" class="form-control"
                                 placeholder="Start typing your title here" required>
                         </div>
                         <p id="title_error_request" class="text-danger"></p>
                     </div>

                     <div class="form-group popUp_field">
                         <div class="left">
                             <label>Description</label>
                         </div>

                         <div class="right">
                             <textarea class="form-control details_input" name="description"
                                 placeholder="Maximum 5000 characters. " rows="4" required></textarea>
                         </div>

                         <p id="description_error_request" class="text-danger"></p>
                     
                     </div>

                     <div class="form-group" id="quetions_dropdiv">
                     <div class="dropzone" id="question_dropzone">
                         
                         <input name="file" type="file" multiple style="display:none"/>
                         
                     </div>
                     <div class="questions_media_div"></div>

                    </div>
                  
                 </div>

                 <div class="modal-footer justify-content-center">
                     <button type="submit" class="btn btn-primary" id="next_button">Save</button>
                 </div>
             </div>
         </form>
     </div>
 </div>
 {{-- end model add new question  --}}


 {{-- start  model answer question --}}
 <div class="modal fade" id="answer_quetions" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <form action="{{route('questionweb.Answer')}}" method="POST" id="answer_quetions_form">
             @csrf

             <div class="modal-content request_project_page1" id="request_project_page1" style="min-height: 400px;">
                 <div class="modal-header" style="text-align: left;">
                     <h1 class="modal-title" id="title"><strong>Add your answer</strong></h1>
                     <div class="close_popup" data-bs-dismiss="modal">
                         <i class="fas fa-times"></i>
                     </div>
                 </div>
                 <div class="modal-body request_project_form">
                    <div class="row form-group">
                    <div class="description_feild">
                      <input type="text" name="answer_text" class="form-control" style="min-height: 200px;">
                    </div>
                    </div>  
                     <input type="hidden" value="" name="question_id" />
                 </div>
                 <div class="modal-footer justify-content-center">
                     <button type="submit" class="btn btn-primary" id="next_button">Send</button>
                 </div>
             </div>
         </form>
     </div>
 </div>

 {{-- end add answer to question --}}


 {{-- start  report_reasons --}}
 <div class="modal fade" id="report_reasonsModal" role="dialog">
     <div class="modal-dialog">
         <form action="{{route('item.report')}}" method="POST" id="report_reasons_form">
             <div class="modal-content">
                 <div class="modal-body">

                     @csrf

                     <input type="hidden" name="item_id" value="" />
                     <input type="hidden" name="item_type" value="" />
                     <input type="hidden" name="projectid" value="" />
                     <div class="single_defined_role">
                         <div class=" popUp_field">
                             <div class="left">
                                 <label class="style_category">Select report reason</label>
                             </div>
                             <div class="right">
                                 <div class="select_style_create">
                                     <select class="report_reason_select2" name="report_reason_id" id="create_job">
                                         @if(isset($report_reasons))
                                         @foreach($report_reasons as $reason)
                                         <option value="{{$reason->id}}">{{$reason->reason}}</option>
                                         @endforeach

                                         @endif
                                     </select>
                                 </div>
                                 <p id="category_error" class="text-danger"></p>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-primary" id="next_button">Report</button>
                     <button type="button" class="close_popup btn" data-bs-dismiss="modal">Close</button>
                 </div>
             </div>
         </form>
     </div>
 </div>

 {{-- start hidden_reasons --}}
 <div class="modal fade" id="hidden_reasonsModal" role="dialog">
     <div class="modal-dialog">
         <form action="{{route('hidden.projectcard')}}" method="POST" id="hide_reasons_form">
             <div class="modal-content">
                 <div class="modal-body">
                     @csrf
                     <input type="hidden" name="hiddenuser_id" value="" />
                     <input type="hidden" name="hiddenitem_type" value="" />
                     <input type="hidden" name="hiddenprojectid" value="" />
                     
                     <div class="single_defined_role">
                         <div class=" popUp_field">
                             <div class="left">
                                 <label class="style_category">Select hide reason</label>
                             </div>
                             <div class="right">
                                 <div class="select_style_create">
                                    <div id="hide_reasons_project_div">
                                     <select class="hidden_reason_select2" name="hide_reasons_project" id="hide_reasons_project">
                                     
                                         @foreach($hide_reasons_project as $reason)
                                     
                                         <option value="{{$reason->id}}">{{$reason->title}}</option>
                                        
                                         @endforeach
                                    
                                     </select>
                                 </div>
                                     <div id="hide_reasons_bprofile_div">
                                     <select class="hidden_reason_select2" name="hide_reasons_bprofile" id="hide_reasons_bprofile">
                                     
                                         @foreach($hide_reasons_bprofile as $reason)
                                     
                                         <option value="{{$reason->id}}">{{$reason->title}}</option>
                                        
                                         @endforeach
                                    
                                     </select>
                                 </div>
                                    <div id="hide_reasons_rfq_div">
                                     <select class="hidden_reason_select2" name="hide_reasons_rfq" id="hide_reasons_rfq">
                                     
                                         @foreach($hide_reasons_rfq as $reason)
                                     
                                         <option value="{{$reason->id}}">{{$reason->title}}</option>
                                        
                                         @endforeach
                                    
                                     </select>
                                    </div>

                                    <div id="hide_reasons_job_div">
                                     <select class="hidden_reason_select2" name="hide_reasons_job" id="hide_reasons_job">
                                     
                                         @foreach($hide_reasons_job as $reason)
                                     
                                         <option value="{{$reason->id}}">{{$reason->title}}</option>
                                        
                                         @endforeach
                                    
                                     </select>
                                 </div>
                                 </div>
                                 <p id="category_error" class="text-danger"></p>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-primary" id="next_button">Hide</button>
                     <button type="button" class="close_popup btn" data-bs-dismiss="modal">Close</button>
                 </div>
             </div>
         </form>
     </div>
 </div>


 {{-- start  model job apply --}}
 <div class="modal fade" id="job_apply" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog request_project_dialog">
         <form action="{{route('job.apply')}}" method="POST" id="job_apply_form" enctype="multipart/form-data">
             @csrf

             <div class="modal-content request_project_page1" id="request_project_page1" style="min-height: 400px;">
                 <div class="modal-header" style="text-align: left;">
                     <h1 class="modal-title" id="title"><strong>Send your profile?</strong></h1>
                     <div class="close_popup" data-bs-dismiss="modal">
                         <i class="fas fa-times"></i>
                     </div>
                 </div>

                 <div class="modal-body request_project_form">
                     <div class="info_user">
        
                         @if(Auth::user())
                            @if(Auth::user()->photo)
                            @php $user_thumb = Auth::user()->photo; @endphp
                            @else
                            @php $user_thumb = 'https://ui-avatars.com/api/?background='.$bg_color.'&color=fff&name=ibtisam+m'; @endphp
                            @endif   

                            <div class="hexagon-user-thumb-top" style=" background-image: url('{{$user_thumb}}'); ">
                            <div class="hexTop"></div>
                            <div class="hexBottom"></div>
                            </div>

                         <h6>{{Auth::user()->name}}  <br />
                             <span>{{Auth::user()->name}} @ {{Auth::user()->company}} </span>
                         </h6>
                         @endif
                     </div>
                     <p>Send your full profile, including your CV details, to the poster of this job opening by clicking

                         continue below.</p>
                     <input type="hidden" value="" name="job_id" />
                     {{-- add media --}}
                     <div class="dropzone" id="joboffer_dropzone"></div>
                 </div>

                 <div class="modal-footer justify-content-center">
                     <button type="submit" class="btn btn-primary" id="job-apply-submit-btn">Continue</button>
                 </div>
             </div>
         </form>
     </div>
 </div>

 {{-- end job apply --}}



 {{-- start  model job offer --}}

 <div class="modal fade" id="job_offer" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog request_project_dialog">
         <form action="{{route('job.store')}}" method="POST" id="job_offer_form">
             @csrf
             <div class="modal-content request_project_page1" id="request_project_page1">
                 <div class="modal-header">
                     <h1 class="modal-title" id="title">Add job offer</h1>
                     <div class="close_popup" data-bs-dismiss="modal">
                         <i class="fas fa-times"></i>
                     </div>
                 </div>
                 <div class="modal-body request_project_form">
                     <div class="form-group popUp_field">
                         <div class="left">
                             <label>Title</label>
                         </div>
                         <div class="right">
                             <input type="text" name="title" class="form-control"
                                 placeholder="Start typing your title here">
                         </div>
                         <p id="title_error_request" class="text-danger"></p>
                     </div>

                     <div class="form-group popUp_field">
                         <div class="left">
                             <label>Description</label>
                         </div>

                         <div class="right">
                             <textarea class="form-control details_input" name="description"
                                 placeholder="Maximum 5000 characters. " rows="4"></textarea>
                         </div>

                         <p id="description_error_request" class="text-danger"></p>
                     </div>
                     <div class="form-group popUp_field">
                         <div class="left">
                             <label>Location</label>
                         </div>

                         <div class="right">
                             <input type="text" class="form-control" name="location"
                                 placeholder="Type in a city, country, or coordinates.">
                         </div>
                         <p id="location_error_request" class="text-danger"></p>
                     </div>

                     <div class="form-group popUp_field">
                         <div class="left"><label class="deadline">Deadline</label></div>
                         <div class="right">
                             <input type="date" name="deadline" id="deadline" class="form-control">
                             <p id="deadline_error_request" class="text-danger"></p>
                         </div>
                     </div>

                     <div class="single_defined_role">
                         <div class="form-group popUp_field">
                             <div class="left">
                                 <label class="style_category">Category</label>
                             </div>
                             <div class="right">
                                 <div class="select_style_create">
                                     <select class="category_select2 form-control" name="category_id" id="create_job">
                                         @if(isset($categories))
                                         @foreach($categories as $category)
                                         <option value="{{$category->id}}">{{$category->title}}</option>
                                         @endforeach
                                         @endif
                                     </select>
                                 </div>
                                 <p id="category_error" class="text-danger"></p>
                             </div>
                         </div>
                     </div>

                     <div class="row">
                         <div class="col-md-7 col-sx-12">
                             <div class="form-group popUp_field" style="display: flex; align-items: center;">
                                 <label class="publish_popup-title custom_job-offer">publish</label>
                                 <div class="publish_popup-content">
                                     <input type="checkbox" name="posttofeed" id="posttofeed">
                                     <label class="deadline" style="font-size:12px; margin-right:10px">
                                     Post to Feed</label>

                                 </div>

                             </div>

                         </div>
                     </div>
                 </div>

                 <div class="modal-footer justify-content-center">
                     <button type="submit" class="btn btn-primary" id="next_button">Save</button>
                 </div>
             </div>
         </form>
     </div>
 </div>
 {{-- end model job offer --}}



 {{-- start  model request project --}}
 <div class="modal fade" id="request_project_main" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog request_project_dialog modal-lg">
         <form action="{{route('request_project_ds')}}" class="form-horizontal" method="POST" id="request_project_popup" enctype="multipart/form-data">
             @csrf
             <input type="hidden" name="request_project_id" id="request_project_id" value="" />
             <div class="modal-content request_project_page1" id="request_project_page1">
                 <div class="modal-header">
                     <h1 class="modal-title" id="title">Request a Project</h1>
                     <div class="close_popup" data-bs-dismiss="modal">
                         <i class="fas fa-times"></i>
                     </div>
                 </div>
                 <div class="modal-body request_project_form">
                     <div class="row">
                         <div class="col-md-6 col-sx-12">
                             <div class="form-group popUp_field">
                                 <div class="left">
                                     <label>Title</label>
                                 </div>

                                 <div class="right">
                                    <input type="text" name="title" class="form-control"

                                         placeholder="Start typing your title here">
                                 </div>
                                 <p id="title_error_request" class="text-danger"></p>
                             </div>


                             <div class="form-group popUp_field">
                                 <div class="left">
                                     <label>Description</label>
                                 </div>
                                 <div class="right">
                                     <textarea class="form-control details_input" name="description"
                                         placeholder="Maximum 5000 characters. " rows="4"></textarea>
                                 </div>
                                 <p id="description_error_request" class="text-danger"></p>
                             </div>
                             <div class="form-group popUp_field">
                                 <div class="left">
                                     <label>Budget</label>
                                 </div>

                                 <div class="right">
                                    <input type="text" name="budget" class="form-control"
                                         placeholder="Budget">
                                 </div>
                                 <p id="title_error_request" class="text-danger"></p>
                             </div>


                             <div class="form-group popUp_field">
                                 <div class="left">
                                     <label>Location</label>
                                 </div>

                                 <div class="right">
                                     <input type="text" class="form-control" name="location"
                                         placeholder="Type in a city, country, or coordinates.">
                                 </div>
                                 <p id="location_error_request" class="text-danger"></p>
                             </div>


                             <div class="single_defined_role">
                                 <div class="form-group popUp_field">
                                     <div class="left">
                                         <label class="style_category">Category</label>
                                     </div>
                                     <div class="right">
                                         <div class="select_style_create">
                                             <select class="request_project_select" data-place-holder="select invitees"
                                                 name="category_id">
                                                 @if(isset($categories))
                                                 @foreach($categories as $category)
                                                 <option value="{{$category->id}}">{{$category->title}}</option>
                                                 @endforeach
                                                 @endif
                                             </select>
                                         </div>
                                         <p id="category_error_request" class="text-danger"></p>
                                     </div>
                                 </div>
                             </div>

                             <div class="single_defined_role">
                                 <div class="form-group popUp_field">
                                     <div class="left">
                                         <label class="style_category">Invitees</label>
                                     </div>

                                     <div class="right">
                                         <div class="select_style_create" id="users_invites">
                                             <select class="request_project_user_select" data-place-holder="select invitees"

                                                 name="invitees">
                                                 @if(isset($users))
                                                 @foreach($users as $user1)
                                                 @php print_r($user1); @endphp
                                                 <option value="{{$user1->email}}">{{$user1->name}}</option>
                                                 @endforeach
                                                 @endif
                                             </select>
                                         </div>
                                         <p id="invitees_error_request" class="text-danger"></p>
                                     </div>
                                 </div>
                             </div>


                             <div class="form-group popUp_field">
                                 <div class="left"><label class="deadline">Deadline</label></div>
                                 <div class="right">
                                     <input type="date" name="deadline" id="deadline" class="form-control">
                                     <p id="deadline_error_request" class="text-danger"></p>
                                 </div>
                             </div>
                         </div>

                         <div class="col-md-6 col-sx-12">
                             {{-- add media --}}
                             <div class="dropzone" id="requestproject_dropzone"></div>
                             <div class="requestproject_dropzone_div"></div>
                         </div>
                     </div>

                     <div class="row">
                         <div class="col-md-6 col-sx-12">
                             <div class="form-group popUp_field" style="display: flex; align-items: center;">
                                 <label class="publish_popup-title">publish</label>
                                 <div class="publish_popup-content">
                                     <input type="checkbox" name="posttofeed" id="posttofeed">
                                     <label class="deadline" for="posttofeed" style="font-size:12px; margin-right:10px">Post to Feed</label>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer justify-content-center">
                     <button type="submit" class="btn btn-primary" id="submitrequestproject">Save</button>
                 </div>
             </div>
         </form>
     </div>
 </div>

 {{-- end model request project --}}



 {{-- start model create project --}}


 <div class="modal fade" id="create_project" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog  modal-lg">
         <form action="{{route('create_project_ds')}}" method="POST" id="create_project_popup"
             enctype="multipart/form-data"> @csrf
             <div class="modal-content create_project_page1" id="create_project_page1">
                 <div class="modal-header custom_title-create-header">Create a Project
                     <div class="close_popup" data-bs-dismiss="modal"><i class="fas fa-times"></i></div>
                 </div>

                 <div class="modal-body create_project_form body_page1">
                     <div class="row">
                         <div class="col-md-6" style="clear: both;margin-top: 18px;">

                             <div class="form-group popUp_field">

                                 <div class="left"><label class="title">Title</label></div>

                                 <div class="right">

                                     <input type="text" name="title" id="title" class="form-control"

                                         placeholder="Start typing your title here">

                                     <p id="title_error" class="text-danger"></p>

                                 </div>

                             </div>

                             <div class="form-group popUp_field">

                                 <div class="left"><label>Description</label></div>

                                 <div class="right">

                                     <textarea class="form-control details_input" id="description" name="description"

                                         placeholder="Maximum 5000 characters. " rows="4"></textarea>

                                     <p id="description_error" class="text-danger"></p>

                                 </div>

                             </div>

                             <div class="form-group popUp_field">

                                 <div class="left"><label>Location</label></div>

                                 <div class="right">

                                     <input type="text" name="location" id="location" class="form-control"

                                         placeholder="Type in a city, country, or coordinates.">

                                     <p id="located_error" class="text-danger"></p>

                                 </div>

                             </div>

                             <div class="single_defined_role">

                                 <div class="form-group popUp_field">

                                     <div class="left"><label class="style_category">Category</label></div>

                                     <div class="right">

                                         <div class="select_style_create">

                                             <select class="category_project_select2" name="category[]"

                                                 multiple="multiple">

                                                 @if(isset($categories))

                                                 @foreach($categories as $category)

                                                 <option value="{{$category->id}}">{{$category->title}}</option>

                                                 @endforeach

                                                 @endif

                                             </select>

                                         </div>

                                         <p id="category_error" class="text-danger"></p>

                                     </div>

                                 </div>

                             </div>

                             <div class="form-group popUp_field">

                                 <div class="left">

                                     <label class="start_date">Start Date</label>

                                 </div>

                                 <div class="right">

                                     <input type="date" name="start_date" id="start_date" class="form-control">

                                     <p id="start_date_error" class="text-danger"></p>

                                 </div>

                             </div>

                             <div class="form-group popUp_field">

                                 <div class="left"><label class="end_date">End Date</label></div>

                                 <div class="right">

                                     <input type="date" name="end_date" id="end_date" class="form-control">

                                     <p id="end_date_error" class="text-danger"></p>

                                 </div>

                             </div>

                             <div class="form-group popUp_field">

                                 <div class="left"><label for="privacy">Privacy</label></div>

                                 <div class="right types">

                                     <div class="d-flex">

                                         <div class="type">

                                             <input type="radio" name="privacy" id="private" value="1"><label

                                                 for="private" class="style_privacy_label">Private</label>

                                         </div>

                                         <div class="type">

                                             <input type="radio" name="privacy" id="public" value="0"><label

                                                 for="public" class="style_privacy_label">Public</label>
                                         </div>
                                     </div>
                                     <p id="privacy_error" class="text-danger"></p>
                                 </div>
                             </div>

                             <div class="row">
                                 <div class="col-md-12 col-sx-12">
                                     <div class="form-group popUp_field" style="display: flex; align-items: center;">
                                         <label class="publish_popup-title custom_create-project-title">publish</label>
                                         <div class="publish_popup-content">
                                             <input type="checkbox" name="posttofeed" id="posttofeed">
                                             <label class="deadline" style="font-size:12px; margin-right:10px">Post to

                                                 Feed</label>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-6" style="clear: both;margin-top: 18px;">
                             <div class="custom_drop-img">
                                 <div class="project_gallery_div">
                                 </div>
                                 <div class="dropzone" id="file_dropzone"></div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <input type="hidden" name="save_type" id="project_save_type" value="1" />
                 <div class="modal-footer justify-content-center">
                     <button type="button" class="next_button save_project" id="save_project"
                         saveType="0">Start</button>
                     <button type="button" class="btn cancel_button save_project" saveType="1" id="draft_project">Save Draft</button>
                 </div>
             </div>
             <div class="modal-footer justify-content-center"></div>
     </div>
     </form>
 </div>
 {{-- end model create project --}}


 {{-- start  model employees all of project --}}
 <div class="modal fade" id="project_employees" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">Employees</div>
             <div class="modal-body">
                 <div style="display:flex; border-radius:5px; background-color:#fafafa; padding:20px">
                     <div class="owl-carousel employeespobup ">
                         <div class="row col-lg-12 col-md-6 col-xs-12 col-sm-12"
                             style=" display: flex;     flex-direction: row; flex-wrap: nowrap;     align-content: center; ">
                             <div id="user-data"></div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="modal-footer"></div>
         </div>
     </div>
 </div>
 {{-- end model employees all of project  --}}

 {{-- start  model collection projects list --}}
 <div class="modal fade" id="collection_project_list" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">

     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">Projects in this collection</div>
             <div class="modal-body">
                 <div style="display:flex; border-radius:5px; background-color:#fafafa; padding:20px">
                     <div class="owl-carousel collection_project_list ">
                         <div id="projectsdata"></div>
                     </div>
                 </div>
             </div>
             <div class="modal-footer"></div>
         </div>
     </div>
 </div>
 {{-- end model collection projects list  --}}