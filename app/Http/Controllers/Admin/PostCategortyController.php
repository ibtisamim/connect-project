<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Validator;


class PostCategortyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items_list = PostCategory::latest()->paginate(10);
        return view('admin.pages.postcategories.index',compact('items_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.postcategories.create');
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
            'title_ar.required'             => 'The title arabic field is required.',
            'title_en.required'             => 'The title english field is required.',            
        ];
        
        $validator = Validator::make($request->all(), $rules ,$customMessages );
        
        if ($validator->fails()) {
            toast($validator->errors()->first(),'warning');   
            return redirect()->back();
        }  

        $post_category = new PostCategory;
        $post_category->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
        $post_category->status = $request->status;
        $post_category->save();

      return redirect()->route('postcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PostCategory $postCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PostCategory $postcategory)
    {

       return view('admin.pages.postcategories.edit',compact('postcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostCategory $postcategory)
    {
        $rules = [
           // 'name' => 'required|regex:/^[a-zA-Z\\s]+$/u|min:5|max:255|unique:users,name,'.$user->id, 
            'title_ar'=>'required',
            'title_en'=>'required',
        ];
        
        $customMessages = [
            'title_ar.required'             => 'The title arabic field is required.',
            'title_en.required'             => 'The title english field is required.',
        ];
        
        $validator = Validator::make($request->all(), $rules ,$customMessages );
        
        if ($validator->fails()) {
            toast($validator->errors()->first(),'warning');   
            return redirect()->back();
        }        
        
        $postcategory->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
        $postcategory->status = $request->status;
        $postcategory->save();
        
        toast('category of post updated successfully','success');
   
        return redirect()->route('postcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostCategory  $postCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCategory $postcategory)
    {
        $postcategory->delete();
        return redirect()->route('postcategories.index');
    }
}
