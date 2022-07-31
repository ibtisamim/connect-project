<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectStatus_oldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $items = ReportReason::paginate(10);

       return view('admin.pages.project_status.index' , compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.report_reasons.create');
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

        

        $reportReason = new ReportReason;

        $reportReason->reason = ['en' => $request->title_en, 'ar' => $request->title_ar];

        $reportReason->status = $request->status;

        $reportReason->type = $request->type;

        $reportReason->action = $request->action;

        $reportReason->save();

        

        toast('Report Reason created successfully','success');

        return redirect()->route('project_status.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.project_status.edit',compact('reportReason'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [

            'title_ar'=>'required',

            'title_en'=>'required',

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

        

        $reportReason->reason = ['en' => $request->title_en, 'ar' => $request->title_ar];

        $reportReason->status = $request->status;

        $reportReason->type = $request->type;

        $reportReason->action = $request->action;

        $reportReason->save();

        

        toast('report reason updated successfully','success');

        return redirect()->route('report_reasons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
