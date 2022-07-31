<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectStatus;
use Illuminate\Http\Request;
use Validator;

class ProjectStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $items = ProjectStatus::paginate(10);

       return view('admin.pages.project_status.index' , compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.project_status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [

            'title_ar'=>'required',
            'title_en'=>'required',
            'level' => 'required'
        ];

        $customMessages = [
            'title_ar.required'             => 'The reason arabic field is required.',
            'title_en.required'             => 'The reason english field is required.',
        ];

        $validator = Validator::make($request->all(), $rules ,$customMessages );

        if ($validator->fails()) {
            toast($validator->errors()->first(),'warning');   
            return redirect()->back();
        }        

        $item = new ProjectStatus;
        $item->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
        $item->status = $request->status;
        $item->level = $request->level;
        $item->save();

        toast('Project Status created successfully','success');
        return redirect()->route('project_status.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectStatus  $projectStatus
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectStatus $projectStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectStatus  $projectStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectStatus $projectStatus)
    {
        return view('admin.pages.project_status.edit',compact('projectStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectStatus  $projectStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectStatus $projectStatus)
    {
        $rules = [

            'title_ar'=>'required',
            'title_en'=>'required',
            'level' => 'required'

        ];

    
        $customMessages = [
            'title_ar.required' => 'The reason arabic field is required.',
            'title_en.required' => 'The reason english field is required.',
        ];

        

        $validator = Validator::make($request->all(), $rules ,$customMessages );

        
        if ($validator->fails()) {
            toast($validator->errors()->first(),'warning');   
            return redirect()->back();
        }        

        
        $projectStatus->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
        $projectStatus->status = $request->status;
        $projectStatus->level = $request->level;
        $projectStatus->save();

    
        toast('project Status updated successfully','success');

        return redirect()->route('project_status.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectStatus  $projectStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectStatus $projectStatus)
    {
        $projectStatus->delete();

        toast('project Status deleted successfully','success');

        return redirect()->route('project_status.index');
    }
}
