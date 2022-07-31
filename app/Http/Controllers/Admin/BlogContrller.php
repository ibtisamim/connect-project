<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\PostCategory;
use Validator;

class BlogContrller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $items = Post::with('Category')->paginate(10);
       return view('admin.pages.blogs.index' , compact('items'));
    }

    public function selectAll(Request $request)
    {
        $items = Post::where('title','like',  $request->term.'%')->select('id as id' , 'title->en as text' ,'slug')->get();

        return response()->json($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $categories = PostCategory::where('status','Enable')->get();
        return view('admin.pages.blogs.create' , compact('categories'));
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
           // 'name' => 'required|regex:/^[a-zA-Z\\s]+$/u|min:5|max:255|unique:users,name,'.$user->id, 
            'title_ar'=>'required',
            'description_ar'=>'required',
            'title_en'=>'required',
            'description_en'=>'required',
        ];
        
        $customMessages = [
            'title_ar.required'             => 'The title arabic field is required.',
            'description_ar.required'       => 'The description arabic field is required.',
            'title_en.required'             => 'The title english field is required.',
            'description_en.required'       => 'The description english field is required.',
        ];
        
        $validator = Validator::make($request->all(), $rules ,$customMessages );
        
        if ($validator->fails()) {
            toast($validator->errors()->first(),'warning');   
            return redirect()->back();
        }        
        
        $post = new Post;
        $post->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
        $post->body = ['en' => $request->description_en, 'ar' => $request->description_ar];
        $post->slug = ['en' => $this->slug($request->title_en), 'ar' => $this->slug($request->title_ar)];
        $post->post_category_id = $request->post_category_id;
        $post->save();
        
        if($request->hasFile('thumb') && $request->file('thumb')->isValid()){
            $post->addMediaFromRequest('thumb')->toMediaCollection('thumb');
        }
        
        toast('Post created successfully','success');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
    
        $categories = PostCategory::where('status','Enable')->get();
        return view('admin.pages.blogs.edit',compact('post' ,'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
           // 'name' => 'required|regex:/^[a-zA-Z\\s]+$/u|min:5|max:255|unique:users,name,'.$user->id, 
            'title_ar'=>'required',
            'description_ar'=>'required',
            'title_en'=>'required',
            'description_en'=>'required',
        ];
        
        $customMessages = [
            'title_ar.required'             => 'The title arabic field is required.',
            'description_ar.required'       => 'The description arabic field is required.',
            'title_en.required'             => 'The title english field is required.',
            'description_en.required'       => 'The description english field is required.',
        ];
        
        $validator = Validator::make($request->all(), $rules ,$customMessages );
        
        if ($validator->fails()) {
            toast($validator->errors()->first(),'warning');   
            return redirect()->back();
        }        
        
     
        $post->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
        $post->body = ['en' => $request->description_en, 'ar' => $request->description_ar];
        $post->slug = ['en' => $this->slug($request->title_en), 'ar' => $this->slug($request->title_ar)];
        $post->post_category_id = $request->post_category_id;
        $post->save();
        
        if($request->hasFile('thumb') && $request->file('thumb')->isValid()){
            $post->addMediaFromRequest('thumb')->toMediaCollection('thumb');
        }
        
        toast('Post Updated successfully','success');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        toast('Post deleted successfully','success');
        return redirect()->route('posts.index');
    }
    
    private function slug($str, $limit = null) {
      if ($limit) {
        $str = mb_substr($str, 0, $limit, "utf-8");
      }
      $text = html_entity_decode($str, ENT_QUOTES, 'UTF-8');
      // replace non letter or digits by -
      $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
      // trim
      $text = trim($text, '-');
      return $text;
    }
}
