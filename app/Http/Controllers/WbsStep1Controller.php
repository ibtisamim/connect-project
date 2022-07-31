<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use App\Models\TemplateProject;


class WbsStep1Controller extends Controller
{

    public function index(Project $project)
    {
        if ($project->id) {

            $costs = Task::where('project_id', $project->id)->get()->map(function ($query) {
                $total = 0;
                $total = $total + $query->cost;
                return $total;
            });

            $total_cost = 0;
            foreach ($costs as $cost) {
                $total_cost = $total_cost + $cost;
            }

            $card_count = Task::where('project_id', $project->id)->count();

            $users = User::where('id', '!=', $project->user_id)->get();


            $templates = TemplateProject::where('user_id',Auth::user()->id)->get();

            return view('business.wbs-step1', compact('project', 'total_cost', 'card_count','templates' ,'users'));
        }
        abort(404);
    }

    public function create()
    {
        //
    }

    public function store(Request $request, Project $project)
    {


        if ($project->user_id == Auth::user()->id) {

            if ($request->type == 'json') {

                $project->update([
                    'wbs_step1' => $request->data,
                ]);

                $wbs_step = $project->wbs_step1;
                $wbs_step = json_decode($wbs_step);
            
                $order = $this->flowInformation($wbs_step,$project);

                $res['msg'] = 'data saved successfully';
                $res['hasPath'] = false;
                if($order){
                  $res['hasPath'] = true;
                  $res['path'] = $order;


                }
                echo json_encode($res);
            } else {
                $project->update([
                    'wbs_step1' => $request->data,
                    'start_time' => strtotime($request->starting_date),
                    'time_margin' => $request->time_margin,
                ]);

                
                return redirect()->route('overview', $project->id);
            }

        } else {
            return abort(403);
        }

    }

    function editor_init(Request $request,Project $project){
      $res['nodes'] =  Task::where('project_id',$project->id)->get();
      $wbs_step = $project->wbs_step1;
      $wbs_step = json_decode($wbs_step);
      $order = $this->flowInformation($wbs_step,$project,$request->card_id);
      $res['hasPath'] = false;
      if($order){
        $res['hasPath'] = true;
        $res['path'] = $order;
      }
      return response()->json($res,200);

    }

    private function flowInformation($wbs_step,$project,$card_id = 0)
    {
      $wbs_step = isset($wbs_step->drawflow) ? $wbs_step->drawflow->Home->data : [];

        $order = [];
       // print_R($wbs_step->$card_id);die;

        $start = isset($wbs_step->{7}) ? $wbs_step->{7} : [];
        $end = isset($wbs_step->{2}) ? $wbs_step->{2} : [];

        if (empty($start) || empty($end)) {
            return false;
        }

        $tasks = Task::where('project_id',$project->id)->get();

        foreach ($tasks as $key => $task) {
            if ($task->duration_type == 'month') {
                $duration_in_days = $task->duration * 30;
            } else if ($task->duration_type == 'week') {
                $duration_in_days = $task->duration * 7;
            } else {
                $duration_in_days = $task->duration;
            }
            $data[$task->card_id] = $task;
            $data[$task->card_id]['duration_in_days'] = $duration_in_days;
        }

        if (isset($start->outputs->output_1->connections)) {
            $counter = 0;
            $connections = $start->outputs->output_1->connections;
            foreach ($connections as $nextNode) {
                $order[$counter][] = $nextNode->node;
                $order = $this->get_next_node($wbs_step, $nextNode, $order, $counter);
            }
        }

        $longest_key = 0;
        $best_duration = 0;
        foreach ($order as $key => $row) {
            $start = true;
            $duration = 0;
            foreach ($row as $item) {
                if (isset($data[$item])) {
                    if ($start) {
                        $duration = $data[$item]['duration_in_days'];
                        $start = false;
                    } else {
                        $duration += $data[$item]['duration_in_days'];
                    }
                    $old_item = $item;
                }
            }
            if ($duration > $best_duration) {
                $best_duration = $duration;
                $longest_key = $key;
            }
        }
        $res['critical_path'] = $order[$longest_key];
        
        unset($order[$longest_key]);


        $res['floaters'] = [];
        foreach($order as $row){
          foreach ($row as $key => $item) {
              if(!in_array($item,$res['critical_path'])){
                $res['floaters'][] = $item;
              }
            
          }
        }

        $options = [];
        if($card_id){
            $array_have_node = [];
            $card_index = 0;

            foreach($order as $item){
                if(in_array($card_id,$item)){
                    $array_have_node = $item;
                    $card_index = array_search($card_id, $item);
                    break;
                }
            }

            $prev_node = $wbs_step->{$card_id}->inputs->input_1->connections[0]->node;
            $next_node = $wbs_step->{$card_id}->outputs->output_1->connections[0]->node;

            //Calculate Duration for current card
            $prev_duration_without_card = 0;
            $prev_duration_with_card = 0;
            $next_duration_with_card = 0;
            $next_duration_without_card = 0;
            $calculate_prev = true;
            $calculate_next = false;

            foreach($array_have_node as $sub_path){

                if($sub_path == $card_id && $calculate_prev){
                    $prev_duration_with_card += $data[$sub_path]['duration_in_days'];
                    $calculate_prev = false;
                }else if($calculate_prev){
                    $prev_duration_with_card += $data[$sub_path]['duration_in_days'];
                    $prev_duration_without_card += $data[$sub_path]['duration_in_days'];
                }

                if($sub_path == $card_id){
                    $calculate_next = true;
                    $next_duration_with_card += $data[$sub_path]['duration_in_days'];
                }else if($calculate_next){
                    $next_duration_with_card += $data[$sub_path]['duration_in_days'];
                    $next_duration_without_card += $data[$sub_path]['duration_in_days'];
                }
               
            }

            
            foreach($res['critical_path'] as $path_index => $path){

                //Duration for current card critical path
                $prev_duration_with_path = 0;
                $prev_duration_without_path = 0;
                $next_duration_with_path = 0;
                $next_duration_without_path = 0;
                $calculate_prev = true;
                $calculate_next = false;
                foreach($res['critical_path'] as $sub_path){
                    
                    if($sub_path == $path && $calculate_prev){
                        $prev_duration_with_path += $data[$sub_path]['duration_in_days'];
                        $calculate_prev = false;
                    }else if($calculate_prev){
                        $prev_duration_with_path += $data[$sub_path]['duration_in_days'];
                        $prev_duration_without_path += $data[$sub_path]['duration_in_days'];
                    }

                    if($sub_path == $path && !$calculate_next){
                        $calculate_next = true;
                        $next_duration_with_path += $data[$sub_path]['duration_in_days'];
                    }else if($calculate_next){
                        $next_duration_with_path += $data[$sub_path]['duration_in_days'];
                        $next_duration_without_path += $data[$sub_path]['duration_in_days'];
                    }
                }

                $path_prev_node = $wbs_step->{$path}->inputs->input_1->connections[0]->node;
                $path_next_node = $wbs_step->{$path}->outputs->output_1->connections[0]->node;

                if($prev_node == 7){
                    if($path_prev_node == 7){
                        $options[$path]['start_type'][] = 'start_start';
                        if($next_duration_without_path >= $next_duration_without_card && $data[$path]['duration_in_days'] >= $data[$card_id]['duration_in_days']){
                            $options[$path]['start_type'][] = 'finish_finish';
                        }
                    }else if($path_next_node != 2 && $path_prev_node != 7){
                        if($next_duration_with_path >= $data[$card_id]['duration_in_days'] && $next_duration_without_path >= $next_duration_without_card){
                            $options[$path]['start_type'][] = 'finish_finish';
                        }
                    }

                    
                }else if($next_node == 2){

                    if($path_next_node == 2){
                        $options[$path]['start_type'][] = 'finish_finish';
                        if($prev_duration_without_path >= $prev_duration_without_card && $data[$path]['duration_in_days'] >= $data[$card_id]['duration_in_days']){
                            $options[$path]['start_type'][] = 'start_start';
                        }
                    }else if($path_next_node != 2 && $path_prev_node != 7){
                        if($prev_duration_without_path >= $prev_duration_without_card && $prev_duration_with_path >= $data[$card_id]['duration_in_days']){
                            $options[$path]['start_type'][] = 'start_start';
                        }
                    }
                    
                }else if($next_node != 2 && $prev_node != 7){
                    if($path_prev_node == 7){
                        if($next_duration_without_path >= $next_duration_without_card && $data[$path]['duration_in_days'] >= $next_duration_with_card){
                            $options[$path]['start_type'][] = 'finish_finish';
                        }
                    }else if($path_next_node == 2){
                        if($prev_duration_without_path >= $prev_duration_without_card && $data[$path]['duration_in_days'] >= $prev_duration_with_card){
                            $options[$path]['start_type'][] = 'start_start';
                        }
                    }else if($path_next_node != 2 && $path_prev_node != 7){
                        if($prev_duration_without_path >= $prev_duration_without_card && $next_duration_with_path >= $next_duration_with_card){
                            $options[$path]['start_type'][] = 'start_start';
                        }

                        if($prev_duration_with_path >= $prev_duration_with_card && $next_duration_without_path >= $next_duration_with_card){
                            $options[$path]['start_type'][] = 'finish_finish';
                        }
                    }
                }

                
            }
            
        }

        $res['options'] = $options;
        $res['tasks'] = $data;

        return $res;
    }

    private function get_next_node($wbs_step, $node, $order, &$counter)
    {
        $nextNode = isset($wbs_step->{$node->node}) && isset($wbs_step->{$node->node}->outputs->output_1->connections) ? $wbs_step->{$node->node}->outputs->output_1->connections : [];
        foreach ($nextNode as $key => $item) {
            if ($item->node != 2) {
                if ($key != 0 && isset($order[$counter - 1]) && !isset($order[$counter])) {
                    foreach ($order[$counter - 1] as $oldNode) {
                        if ($node->node != $oldNode) {
                            $order[$counter][] = $oldNode;
                        } else {
                            $order[$counter][] = $oldNode;
                            break;
                        }
                    }
                }

                $order[$counter][] = $item->node;
                $order = $this->get_next_node($wbs_step, $item, $order, $counter);
            } else {
                $order[$counter] = array_unique($order[$counter]);
                $counter++;
            }
        }
        return $order;
    }


    public function save_template(Request $request){

     
        $data = $request->validate([
            'name_template'=>'required',
            'project_id' => 'required',
        ]);

        $template =  TemplateProject::where('project_id',$request->project_id)->first();
        if(!isset($template)){
            
            
            $res =TemplateProject::create([
                'user_id' => Auth::user()->id,
                'project_template' => $request->template,
                'name'     => $data['name_template'],
                'project_id' =>$data['project_id'] 
            ]);
    
    
            return response()->json(["success"=>"Save Template Successfully","status"=>200]);

        }else{

            TemplateProject::where('project_id',$request->project_id)->update([
                'project_template' => $request->template,
                'name'     => $data['name_template'],
                'project_id' =>$data['project_id'] 
            ]);

            return response()->json(["success"=>"Update Template Successfully","status"=>200]);
        }
      
    }

    public function get_template_data(Request $request){
        
       $template_data =  TemplateProject::where('project_id',$request->project_id)->first();

       return $template_data;
    }

    public function load_template(Request $request){
         


       $cards = Task::where('project_id',$request->project_id)->get();

        if(isset($cards)){
            foreach($cards as $card){
                $card->delete();
            }
        }
       
       $template = TemplateProject::where('id',$request->template_id)->first();

    
       return $template;

     

    }

    public function save_card_new_template(Request $request){

        $template = TemplateProject::where('id',$request->template_id)->first();

         $all_cards = Task::where('project_id',$template->project_id)->get();

        

        foreach($all_cards as $card){
         $card->project_id = $request->project_id; 
         $single_card =  json_decode(json_encode($card), true);
         Task::create( (array) $single_card);
        }

       
       

        

    }


   
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
