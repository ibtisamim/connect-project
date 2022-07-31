<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        return view('admin.pages.contacts.index',['contacts'=>Contact::all()]);
    }


    public function show($id)
    {
        return view('admin.pages.contacts.show',['contact'=>Contact::where('id',$id)->first()]);
    }

}
