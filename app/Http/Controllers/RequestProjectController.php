<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestProject;


class RequestProjectController extends Controller
{
    public function view($id ,Request $request){
        $request_project = RequestProject::find($id);
        return view('requestProject',compact('request_project'));
    }

    public function Update(Request $request){
        toast('Request project updated successfully','success');
        return redirect()->back();
    }

    public function delete($id ,Request $request){
        $request_project = RequestProject::find($id);
        $request_project->delete();
        toast('Request project deleted successfully','success');
        return redirect()->back();
    }

    public function store(Request $request){

        toast('Your Answer added successfully','success');
        return redirect()->back();
    }






}
