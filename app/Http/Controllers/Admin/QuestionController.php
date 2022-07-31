<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $items_list =  Question::latest()->paginate(10);
        return view('admin.pages.questions.index',compact('items_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.questions.create');
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
            'title_en'=>'required'
        ];

        $customMessages = [
            'title_en.required'  => 'The Question english field is required.',
        ];

        $validator = Validator::make($request->all(), $rules ,$customMessages );
        if ($validator->fails()) {
            toast($validator->errors()->first(),'warning');   
            return redirect()->back();
        }        

        
        $item = new Question;
        $item->title = $request->title_en;
        $item->description = $request->description;
        $item->user_id = $request->user()->id;
        $item->save();

        toast('Question created successfully','success');
        return redirect()->route('hidden_reasons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('admin.pages.questions.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
       return view('admin.pages.questions.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $question->update($request->all()) ;
        toast('Question updated successfully','success');
        return redirect()->route('questions.index');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        toast('Question deleted successfully','success');
        return redirect()->route('questions.index');
    }
}
