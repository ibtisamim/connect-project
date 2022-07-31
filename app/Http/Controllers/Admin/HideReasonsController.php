<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HiddenReason;
use Illuminate\Http\Request;
use Validator;




class HideReasonsController extends Controller{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(){

        $items_list =  HiddenReason::latest()->paginate(10);
        return view('admin.pages.hidden_reasons.index',compact('items_list'));

    }



    /**



     * Show the form for creating a new resource.



     *



     * @return \Illuminate\Http\Response



     */



    public function create()



    {



        return view('admin.pages.hidden_reasons.create');



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



        

        $item = new HiddenReason;

        $item->title = ['en' => $request->title_en, 'ar' => $request->title_ar];

        $item->status = 'Enable';

        $item->type = $request->type;

        $item->action = $request->action;

        $item->save();



        toast('Hidden Reason created successfully','success');

        return redirect()->route('hidden_reasons.index');



    }







    /**



     * Display the specified resource.



     *



     * @param  \App\Models\HiddenReason  $hiddenReason



     * @return \Illuminate\Http\Response



     */



    public function show(HiddenReason $hiddenReason)



    {



        //



    }







    /**



     * Show the form for editing the specified resource.



     *



     * @param  \App\Models\HiddenReason  $hiddenReason



     * @return \Illuminate\Http\Response



     */



    public function edit(HiddenReason $hiddenReason)



    {



        return view('admin.pages.hidden_reasons.edit',compact('hiddenReason'));



    }







    /**



     * Update the specified resource in storage.



     *



     * @param  \Illuminate\Http\Request  $request



     * @param  \App\Models\HiddenReason  $hiddenReason



     * @return \Illuminate\Http\Response



     */



    public function update(Request $request, HiddenReason $hiddenReason)



    {



        $hiddenReason->title = ['en' => $request->title_en, 'ar' => $request->title_ar];



        $hiddenReason->status = 'Enable';



        $hiddenReason->type = $request->type;



        $hiddenReason->action = $request->action;



        $hiddenReason->save();



        

        toast('Hidden Reason updated successfully','success');



        return redirect()->route('hidden_reasons.index');



    }







    /**



     * Remove the specified resource from storage.



     *



     * @param  \App\Models\HiddenReason  $hiddenReason



     * @return \Illuminate\Http\Response



     */



    public function destroy(HiddenReason $hiddenReason){

        $hiddenReason->delete();
        toast('Hidden Reason deleted successfully','success');
        return redirect()->route('hidden_reasons.index');

    }


    public function hiddenCards(Request $request){
        return redirect()->route('hidden_cards.index');
    }
    



}



