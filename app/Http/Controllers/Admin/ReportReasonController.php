<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReportReason;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;



class ReportReasonController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(){

       $items = ReportReason::paginate(10);
       return view('admin.pages.report_reasons.index' , compact('items'));

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function create(){

        return view('admin.pages.report_reasons.create');

    }



    /**
     * Show the form for reported items list.
     *
     * @return \Illuminate\Http\Response
     */



    public function report_list(){   
        $items = User::whereHas('Reported')->with('Reported')->paginate(10);
        return view('admin.pages.report_reasons.reportedlist' , compact('items'));
    }








    /**



     * Store a newly created resource in storage.



     *



     * @param  \Illuminate\Http\Request  $request



     * @return \Illuminate\Http\Response



     */



    public function store(Request $request){


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
        return redirect()->route('report_reasons.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReportReason  $reportReason
     * @return \Illuminate\Http\Response
     */



    public function show(ReportReason $reportReason){

    }



    /**

     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReportReason  $reportReason
     * @return \Illuminate\Http\Response
     */



    public function edit(ReportReason $reportReason)



    {



        return view('admin.pages.report_reasons.edit',compact('reportReason'));



    }







    /**



     * Update the specified resource in storage.



     *



     * @param  \Illuminate\Http\Request  $request



     * @param  \App\Models\ReportReason  $reportReason



     * @return \Illuminate\Http\Response



     */



    public function update(Request $request, ReportReason $reportReason){


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
     * @param  \App\Models\ReportReason  $reportReason
     * @return \Illuminate\Http\Response
     */



    public function destroy(ReportReason $reportReason){

        $reportReason->delete();
        toast('Report Reason deleted successfully','success');
        return redirect()->route('report_reasons.index');

    }



}



