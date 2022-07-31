<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Validator;
use Auth;

class CommentsContrller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items_list = Comment::latest()->paginate(10);
        return view('admin.pages.comments.index',compact('items_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.comments.create');
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
            'description'       =>'required',
            'commentable_type'  =>'required',
            'commentable_id'    =>'required',
            'approved'          =>'required',
            'status'            =>'required',
        ];
        
        $customMessages = [
            'description.required'             => 'The text field is required.',
            'commentable_type.required'       => 'The commentable_type  field is required.',
            'commentable_id.required'             => 'The commentable_id field is required.',
        ];
        
        $validator = Validator::make($request->all(), $rules ,$customMessages );
        
        if ($validator->fails()) {
            toast($validator->errors()->first(),'warning');   
            return redirect()->back();
        }

        
        $item = new Comment;
        $item->description = $request->description;
        $item->commentable_type = $request->commentable_type;
        $item->commentable_id = $request->commentable_id;
        $item->approved = $request->approved;
        $item->status = $request->status;

        $item->admin_id = Auth::guard('admin')->user()->id;
            
        $item->save();
        toast('comments created successfully','success');
        return redirect()->route('comments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
          return view('admin.pages.comments.edit',compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->all);
        toast('Comment updated successfully','success');
        return redirect()->route('comments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        toast('Comment deleted successfully','success');
        return redirect()->route('comments.index');
    }
}
