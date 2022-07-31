<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class QuestionsController extends Controller
{
    public function Store(Request $request){
        $ques = new Question;
        $ques->title = $request->title;
        $ques->description = $request->description;
        $ques->user_id = $request->user()->id; 
        if($request->has('questionmedia')){
        $questionmedia = implode("-",$request->questionmedia);
        $ques->gallery_ids = $questionmedia;
        }
        $ques->save();
        toast('Your Question added successfully','success');
        return redirect()->back();
    }

    public function questionUpdate(Request $request){
        $ques = Question::where('id' ,$request->question_id)
        ->update(['title' => $request->qtitle , 'description' => $request->qdescription]);
        toast('Your Question added successfully','success');
        return redirect()->back();
    }

    public function deleteQuestion($id ,Request $request){
        $question = Question::find($id);
        $question->delete();
        toast('Your Question deleted successfully','success');
        return redirect()->back();
    }

    public function storeAnswer(Request $request){
        $answer = new Answer;
        $answer->answer_text = $request->answer_text;
        $answer->question_id = $request->question_id;
        $answer->user_id = $request->user()->id;
        $answer->save();
        toast('Your Answer added successfully','success');
        return redirect()->back();
    }

    public function editAnswer(Request $request){
        $answer = Answer::find($request->answer_id);
        $answer->answer_text = $request->answer_text;
    //    $answer->question_id = $request->question_id;
    //    $answer->user_id = $request->user()->id;
        $answer->update();
        toast('Your Answer edited successfully','success');
        return redirect()->back();
    }

    public function deleteAnswer($id ,Request $request){
        $answer = Answer::find($id);
        $answer->delete();
        toast('Your Answer deleted successfully','success');
        return redirect()->back();
    }

    public function questionDetails($id ,Request $request){
        $question = Question::find($id); 
        return view("questionDetails",compact('question'));
    }

    public function questionMedia(Request $request){
        //meida
        $images = $request->file('file');
        $ids = array();

        foreach ($images as $photo) {
       
        $imageUpload = $request->user()->addMedia($photo)->toMediaCollection('questiongallary');
        
        $ids[] = $imageUpload->id;
        }
       
        return response()->json(['success'=> implode("-",$ids)]); 

    }

}
