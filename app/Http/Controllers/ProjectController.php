<?php


namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\RequestProject;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Gallery;
use App\Models\Task;
use App\Notifications\AssignUserNotification;
use Auth;
use App\Models\Comment;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Follower;


class ProjectController extends Controller

{

    

	public $successStatus = 200;

    public $failureStatus = 400;

    public $NoDataStatus  = 404;

  

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $business = Auth::user()->id;

        $projects = Project::where('user_id',$business)->where('save_type',0)->paginate(10);

        $draft_projects = Project::where('user_id',$business)->where('save_type',1)->paginate(10);



        $all_categories = Category::where('lang','en')->get();



        return view('business.business-db-all-project',compact('draft_projects','projects','all_categories'));

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        //

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        //

    }



    /**

     * Display the specified resource.

     *

     * @param  \App\Models\createProject  $createProject

     * @return \Illuminate\Http\Response

     */

    public function show(Project $Project){

        return view('business.business_overview');

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Models\createProject  $createProject

     * @return \Illuminate\Http\Response

     */

    public function edit(Project $Project){

        return view('dashboard_project.updates',compact('Project'));

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Models\createProject  $createProject

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, Project $Project)

    {

        //

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Models\createProject  $createProject

     * @return \Illuminate\Http\Response

     */

    public function destroy(Project $Project)

    {

        //

    }

    

    public function editProject($project_id){

        $project =  Project::where('id',$project_id)->first();

        return view('dashboard_project.updates',compact('project'));

    }

    

    

    public function analytics($id , Request $request){

        $project =  Project::where('id',$project_id)->first();

        return view('dashboard_project.analytics',compact('project'));        

    }

    

    

    public function SettingProject($id , Request $request){

       $project =  Project::where('id',$project_id)->first();

      // $categories = Category::where('lang','en')->get();

       return view('dashboard_project.settings',compact('project','categories'));

    }

    

    public function UpdateProject($id , Request $request){

        

        $project = Project::find($id);

        $project->update([

            'called' => $request->title,

            'description' => $request->description,

            'category'=>$request->category_id,

            // 'start_date' => $request->start_date,

            // 'end_date' =>  $request->end_date,

          

            'privacy' => $request->privacy_type,

            'lat' => $request->lat,

            'long' => $request->long,

            'city' => $request->city,

            'country' => $request->country,

            'street' => $request->street,

            'area' =>$request->area,

        ]);



        toast('Update Project Setting Sccessfully','success');

        return redirect()->route('setting_project.index',$id);



    }

    



    // create project store

    public function create_project_store(Request $request){  

        

      $data = $request->validate([

        'title'          => 'required',

        'description'     =>'required',

        'location'         => 'required',

        'category'        => 'required',

        'start_date'  => 'required',

        'end_date'   => 'required',

        'privacy'  => 'required',



      ]);

      

      $project = new Project;

      $project->save_type   = $request->save_type;

      $project->called      = $data['title'];

      $project->description = $data['description'];

      $project->located     = $data['location'];

      $project->start_date  = $data['start_date'];

      $project->end_date    = $data['end_date'];

      $project->privacy     = $data['privacy']; // public => 0   | privat => 1

      

      if($request->has('post_to_feed'))

        $project->post_to_feed = 1;

      else

        $project->post_to_feed = 0;



      if($data['start_date']  > $data['end_date'] && $data['end_date'] < $data['start_date']){

           $project->status  = 0 ;

           $status = 0 ; // Ongoing 0

      }elseif($data['end_date']  < $data['start_date']){

          $project->status  = 1;

          $status = 1 ;// Completed 1

      }elseif($data['end_date']  > $data['start_date']){

          $project->status  = 2;

          $status = 2 ; // Upcoming 2

      }



      $project->user_id = Auth::user()->id;

      $project->save();

      

      if($project){

        // Because we have a hasMany not a many to many, we have to do it this way

        Gallery::whereIn('id', $request->galleries)->update(['project_id' => $project->id]);

        $categories = $data['category'];

        $project->categories()->attach($categories, [

          'business_id' => Auth::user()->Business()->first()->id

        ]);

      }



    toast('Your project added successfully','success');

    return redirect()->back();



    }



    public function requestProjectStore(Request $request){

      $data = $request->validate([
        'title'        => 'required',
        'budget'       => 'required',
        'description'  => 'required',
        'location'     => 'required',
        'category_id'     => 'required',
        //'invitees'     => 'required',
        'deadline'     => 'required',
      ]);

     $data['user_id'] = Auth::user()->id;
     $data['title'] = $request->title;
     $data['description'] = $request->description;
     $data['location'] = $request->location;
     $data['category_id'] = $request->category_id;
     $data['deadline'] = $request->deadline;
     $data['budget'] = $request->budget;
    // $data['invitees'] = $request->invitees;
     if($request->has('posttofeed')) 
        $data['post_to_feed'] = 1;
     else
        $data['post_to_feed'] = 0;

        
     $request_project = RequestProject::create($data);

     if($request->has('invitees')){

        // search about email in our users list
        $email_in_user_list = User::where('email',$request->invitees)->first();
     
        if($email_in_user_list){ 
            // add to request_project_applies
            $request_project ->rfqApplyUsers()->attach($email_in_user_list->id);
            $email = $email_in_user_list->email;
            
        }else{
            Invitation::create([
                "user_id" => Auth::user()->id,
                "email" => $data['email'],
                "role" => $data['role'],
            ]);            
        }

        // send email to both
        /*$business = Auth::user();
        Mail::send('emails.send', ['employee' => $email], function ($message) use ($email,$business)
        {
            $message->from($business->email, 'Employeer');
            $message->to($email);
        });*/

     }

    if($request_project){
        return $request_project->id;
    }

  }



    public function create_project_update(Request $request , $project_id){

        $data = $request->validate([
            'called'          => 'required',
            'description'     =>'required',
            'located'         => 'required',
            'category'        => 'required',
            'project_status'  => 'required',
            'stakeholder'     => 'nullable',
            'team_member'     => 'nullable',
            'client'          => 'nullable',

            'phase_1'         => 'nullable',

            'phase_2'         => 'nullable',

            'phase_3'         => 'nullable',

            'phase_4'         => 'nullable',

        ]);


      $update =   Project::where('id',$project_id)->update([

            'called'        =>$data['called'],
            'description'   =>$data['description'],
            'located'       =>$data['located'],
            'category'      =>$data['category'],
            'status'        =>$data['project_status'],
            'stakeholder'   => isset($data['stakeholder']) ? implode(",",$data['stakeholder']) : null ,
            'team_member'   => isset($data['team_member']) ? implode(",",$data['team_member']) : null ,
            'client'        => isset($data['client']) ? implode(",",$data['client'])   : null,
            'phase_1'       => isset($data['phase_1']) ? implode(",",$data['phase_1']) : null,
            'phase_2'       => isset($data['phase_2']) ? implode(",",$data['phase_2']) : null,
            'phase_3'       => isset($data['phase_3']) ? implode(",",$data['phase_3']) : null ,
            'phase_4'       => isset($data['phase_4']) ? implode(",",$data['phase_4']) : null,

        ]);





        toast('Your project update successfully','success');

        return redirect()->route('overview',$project_id);

    }

    



    public function draftProject(){

        $business = Auth::user()->id;

        $categories = Category::where('lang','en')->get();

        $projects = Project::where('user_id',$business)->get();

        $all_categories = Category::where('lang','en')->get();

        return view('business.draft',compact('categories','projects','all_categories'));



    }

    

    

// start yuosef qaou'd code    

// TaskController

public function save(Request $request ,$project_id){

    $data = $request->validate([

       'card_id'        => 'required',

       'task_name'      => 'required|max:50',

       'cost'           => $request->type_card == 'delay' ? '' : 'required',

       'duration'       => 'required',

    ]);

    

    $res['error'] = '';

      if(!$data){

        $res['error'] = "Please fill all required field";

      }

    

    $card = Task::updateOrCreate(

      [

        'card_id' =>$request->card_id,

        'project_id' =>$project_id

      ],

      [

        'task_name'     => $request->task_name,

        'description'   => $request->description ? $request->description : '',

        'cost'          => $request->type_card == 'delay' ? 0 : $request->cost,

        'assigned_to'   => $request->assigned_to ? $request->assigned_to : '',

        'duration'      => $request->duration,

        'duration_type' => "day",

        'type'          => $request->type_card

      ]

    );

    

      /*----------------- start code notifications ------------------- */

      if($card->user){

        $project_owner = Auth::user()->businessSignupSetting->name;

    

        $assigent_person = $card->user->user_db_setting ? $card->user->user_db_setting->name : 'User';

    

        $card->user->notify(new AssignUserNotification($project_owner,$assigent_person));

      }

      

    /*----------------- end code notifications ------------------- */

    $res['start_type'] = $card->start_type;

    $res['success'] = "card update successfully";

    echo json_encode($res);



}





public function get_data_card(Request $request ,$project_id , $id){

 return   Task::where([

   ['project_id',$project_id],

   ['card_id',$id],

 ])->first();



}



public function delete_data_card(Request $request,$id){

    $card = Task::where('card_id',$id)->where('project_id',$request->project_id)->first();

    if($card){

      $card->delete();

    }

    

    $res["success"] = "card delete successfully";

    echo json_encode($res);

}



function update_start_type(Request $request){

    Task::where('card_id',$request->card_id)->where('project_id',$request->project_id)->update([

      'start_type' => $request->start_type,

      'relation_card' =>  ( (int) $request->relation )

    ]);

}



  public function info_projrct(Request $request){



      if($request->time_margin){

        Project::where('id',$request->session()->get('project_id'))->update([

          'time_margin'=>$request->time_margin,

        ]);

      }





      $time_margin   = Project::select('time_margin')->where('id',$request->session()->get('project_id'))->first();



      return  response()->json(['time_margin'=>$time_margin]);

  }



  public function check_card($project_id,$id){



    $res =  Task::where('card_id',$id)->where('project_id',$project_id)->first();

    return $res;

  }

  

  

    public function overveiw($id , Request $request){



        $project = Project::find($id);

        $category_selected = json_decode($project->category);

        $user = Auth::user()->id;

        $tasks = Task::where('project_id',$project->id)->get();

        $wbs_step = $project->wbs_step1 ? json_decode($project->wbs_step1) : [];

        $wbs_step = isset($wbs_step->drawflow) ? $wbs_step->drawflow->Home->data : [];

    

        $data = [];

        

        foreach($tasks as $key => $task){

            if($task->duration_type == 'month'){

                $duration_in_days = $task->duration * 30;

            }else if($task->duration_type == 'week'){

                $duration_in_days = $task->duration * 7;

            }else{

                $duration_in_days = $task->duration;

            }



            $data[$task->card_id]['id'] = $task->id;

            $data[$task->card_id]['name'] = $task->task_name;

            $data[$task->card_id]['duration'] = $task->duration;

            $data[$task->card_id]['duration_type'] = $task->duration_type;

            $data[$task->card_id]['duration_in_days'] = $duration_in_days;

            $data[$task->card_id]['start_day'] = $duration_in_days;

            $data[$task->card_id]['assign_to'] = $task->assign_to ? $task->user : $task->project->user;

            

            

            $data[$task->card_id]['data'] = isset($wbs_step->{$task->card_id}) ? $wbs_step->{$task->card_id} : [];

        }



        $order = [];

        $start = isset($wbs_step->{7}) ? $wbs_step->{7} : [];

        $end = isset($wbs_step->{2}) ? $wbs_step->{2} : [];



        if(isset($start->outputs->output_1->connections)){

            $counter = 0;

            $connections = $start->outputs->output_1->connections;

            foreach($connections as $nextNode){

                $order[$counter][] = $nextNode->node;

                $order = $this->get_next_node($wbs_step,$nextNode,$order,$counter);

            }

        }



        $final_data = [];

        $longest_key = 0;

        $best_duration = 0;

        foreach($order as $key => $row){

            $start = true;

            $duration = 0;

            foreach($row as $item){

                

                if(isset($data[$item])){

                    $final_data[$key][$item] = $data[$item];

                    if($start){

                        $duration = $final_data[$key][$item]['duration_in_days'];

                        $final_data[$key][$item]['start_day'] = $project->start_time;

                        $final_data[$key][$item]['end_day'] = strtotime("+".$final_data[$key][$item]['duration_in_days']." day", $project->start_time);

                        $start = false;

                    }else{

                        $duration += $final_data[$key][$item]['duration_in_days'];

                        $final_data[$key][$item]['start_day'] =  strtotime("+1 day",$final_data[$key][$old_item]['end_day']);

                        $final_data[$key][$item]['end_day'] =  strtotime("+".$final_data[$key][$item]['duration_in_days']." day", $final_data[$key][$item]['start_day']);

                    }



                    $old_item = $item;

                }

            }

            if($duration > $best_duration){

                $best_duration = $duration;

                $longest_key = $key;

            }

        }

        

      $data = $final_data;

      return view('dashboard_project.overview',compact('project','category_selected','data','longest_key'));



    }



    private function get_next_node($wbs_step,$node,$order,&$counter){

        $nextNode = isset($wbs_step->{$node->node}) && isset($wbs_step->{$node->node}->outputs->output_1->connections) ? $wbs_step->{$node->node}->outputs->output_1->connections : [];

        foreach($nextNode as $key => $item){

            if($item->node != 2){

                if($key != 0 && isset($order[$counter-1]) && !isset($order[$counter])){

                    foreach($order[$counter-1] as $oldNode){

                        if($node->node != $oldNode){

                            $order[$counter][] = $oldNode;

                        }else{

                            $order[$counter][] = $oldNode;

                            break;

                        }

                    }

                }

                $order[$counter][] = $item->node;

                $order = $this->get_next_node($wbs_step,$item,$order,$counter);

            }else{

                $order[$counter] = array_unique($order[$counter]);

                $counter++;

            }

        }

        return $order;

    }

    // end yuosef qaou'd code



    public function commentAdd(Request $request){

      $comment = new Comment;

      $comment->description = $request->description;

      $comment->approved = $request->approved;

      $comment->status = $request->status;

      $comment->create_project_id = $request->create_project_id;

      $comment->user_id = Auth::user()->id;

      $comment->commentable_type = 'app/Models/Project';

      $comment->commentable_id = Auth::user()->id;

      

      $comment->save();  

      toast('Your comment added successfully','success');

      return redirect()->back();

      

    }

    

    public function commentDelete($id , Request $request){

      $comment =  Comment::find($id)->delete();

      toast('Your comment deleted successfully','success');

      return redirect()->back();

      

    }

    

    public function commentEdit(Request $request){

      $comment = Comment::where('id' ,$request->comment_id)->update(['description' => $request->descriptionedit , 'updated_at'=> Carbon::now() ]); 

      toast('Your comment updated successfully','success');

      return redirect()->back();

      

    }

    

    public function projectUnFollow($project_id , Request $request){

      $project = Project::find($project_id);    

      Auth::user()->following()->detach ($project);   

      return response()->json(['success'=>'success following']);

    }

    

    public function projectFollow($project_id , Request $request){

     // $project_id = Project::find($project_id);    

      Auth::user()->following()->attach(array($project_id =>[ 'followable_type'=>'App\Models\Project']));   

     // toast('Your comment added successfully','success');    

      return response()->json(['success'=>'success following']);

    }  

    

    

    public function projectSavedtoCollection(Request $request){

      Follower::where('followable_id' , $request->project_id)

      ->where('followable_type','App\Models\Project

')->update(['collection_id'=> $request->collection_id]);

      toast('Your project added to collection successfully','success'); 

      return response()->json(['success'=>'success added to collection']);

     

    }  

    

    public function projectRemoveofCollection(Request $request){

            Follower::where('followable_id' , $request->project_id)

      ->where('followable_type','App\Models\Project

')->update(['collection_id'=> 'NULL']); 

      toast('Your project removed of collection successfully','success');    

      return response()->json(['success'=>'success remove from collection']);

    } 

 

 

    // dropzone images upload & store and removed

    public function storeFile(Request $request){

        $image = $request->file('file');

    	$fileInfo = $image->getClientOriginalName();

    	$filename = pathinfo($fileInfo, PATHINFO_FILENAME);

    	$extension = pathinfo($fileInfo, PATHINFO_EXTENSION);

    	$file_name= $filename.'-'.time().'.'.$extension;

    	

         // store project gallery

    	    $file = $image->move(public_path('uploads/project_gallery'),$file_name);

        	$imageUpload = new Gallery;

        //	$imageUpload->title = $fileInfo;

        	$imageUpload->title = $file_name;

        	$imageUpload->save();

            $imageUpload->addMedia( $file)->toMediaCollection('images');

        	return response()->json(['success'=>$imageUpload->id]);   	    

    }

    

    public function remvoeFile(Request $request){

    	$filename =  $request->get('name');

    	if($request->has('gallery_id')){

    	$gallery_id =  $request->get('gallery_id');

    	$gallery = Gallery::where('id',$gallery_id)->delete();

    	$path = public_path('uploads/project_gallery/').$filename;

    	if (file_exists($path)) {
    		unlink($path);
    	    }
    	}

    	return response()->json(['success'=>$filename]);

    }  

    public function requestprojectMedia(Request $request){ // uploade images after save request project
        //meida
        $request_project = RequestProject::find($request->request_project_id);
        $images = $request->file('file');
        foreach ($images as $photo) {
            $imageUpload = $request_project->addMedia($photo)
            ->withCustomProperties(['gallery' => $request->request_project_id])
            ->toMediaCollection('requestprojectgallary');
        }
        toast('Your request project added successfully','success');
        return response()->json(['success'=> 'done']); 
    }

    

}

