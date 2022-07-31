<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $supports = Support::get();

       return view('admin.pages.support.index',compact('supports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.pages.support.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
          'question_en'=>'required',
          'answer_en'=>'required',
          'question_ar'=>'required',
          'answer_ar'=>'required',
        ]);

        $support = new  Support;
        $support->order = 0; 
        $support->question = ['en' => $request->question_en, 'ar' => $request->question_ar];
        $support->answer = ['en' => $request->answer_en, 'ar' => $request->answer_ar];
        $support->save();
        toast('Support saved successfully','success');
        return redirect()->route('support.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Support $support)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Support $support)
    {
      return view('admin.pages.support.edit',compact('support'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Support $support ,Request $request){

      $data = $request->validate([
        'question_en'=>'required',
        'answer_en'=>'required',
        'question_ar'=>'required',
        'answer_ar'=>'required',
      ]);

      $support->question = ['en' => $request->question_en, 'ar' => $request->question_ar];
      $support->answer = ['en' => $request->answer_en, 'ar' => $request->answer_ar];
      $support->save();
      
      toast('Support created successfully','success');

      return redirect()->route('support.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Support $support)
    {
        $support->delete();
        toast('Support deleted successfully','success');
        return redirect()->route('support.index');
    }
}
