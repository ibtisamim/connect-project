<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   $main_categories =  Category::whereNull('parent_id')->get();
        if($request->has('main_category')){
            $categories =  Category::where('parent_id',$request->main_category)->with('parentId')->latest()->paginate(10);
        }else{
            $categories =  Category::with('parentId')->latest()->paginate(10);
        }
        
        return view('admin.pages.categories.index',compact('categories' , 'main_categories'));
    }


    public function create()
    {
        return view('admin.pages.categories.create');
    }


      
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
        
        $category = new Category;
        $category->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
        $category->description = ['en' => $request->description_en, 'ar' => $request->description_ar];
        $category->slug = ['en' => $this->slug($request->title_en), 'ar' => $this->slug($request->title_ar)];
        if($request->has('category_id'))
        $category->parent_id = $request->category_id;
        $category->save();
        toast('Category created successfully','success');
        return redirect()->route('categories.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    

    
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category){
        $category =   Category::where('id',$category->id)->first();
        return view('admin.pages.categories.edit',compact('category'));
    }


    public function update(Request $request,Category $category){

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

        if($request->has('category_id'))
            $category->parent_id = $request->category_id;
        
        $category->setTranslation('title', 'en', $request->title_en)
            ->setTranslation('title', 'ar', $request->title_ar)
            ->setTranslation('description', 'en', $request->description_en)
            ->setTranslation('description', 'ar', $request->description_ar)
            ->setTranslation('slug', 'en', $this->slug($request->title_en))
            ->setTranslation('slug', 'ar', $this->slug($request->title_ar))
        ->save();
        toast('Category updated successfully','success');
        return redirect()->route('categories.index');
    }


    public function destroy($id)
    {
        $category = Category::find( $id );
        $category->delete();
        toast('Category deleted successfully','success');
        return redirect()->route('categories.index');
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
