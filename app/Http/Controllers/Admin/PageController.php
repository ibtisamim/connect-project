<?php



namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;

use App\Models\Page;

use Illuminate\Http\Request;

use Illuminate\Support\Str;



class PageController extends Controller

{

    /**

     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */

    public function index()
    {
       // $pages =  Page::select('title','page_id')->get();
        $pages = Page::paginate(10);
        return view('admin.pages.pages.index',compact('pages'));

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()
    {
        return view('admin.pages.pages.create');
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
        'title_ar'=>'required',
        'description_ar'=>'required',
        'title_en'=>'required',
        'description_en'=>'required'
        ]);

        $slug_ar  = Str::slug($request->title_ar, '-');
        $slug_en  = Str::slug($request->title_en, '-'); 
        $page = new Page;
        $page->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
        $page->description = ['en' => $request->description_en, 'ar' => $request->description_ar];
        $page->slug = ['en' => $slug_en, 'ar' => $slug_ar];
        $page->save();

      return redirect()->route('pages.index');
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

    public function edit(Page $page)

    {

        return view('admin.pages.pages.edit',compact('page'));

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request,Page $page)

    {

        $data = $request->validate([

        'title_ar'=>'required',

        'description_ar'=>'required',

        'title_en'=>'required',

        'description_en'=>'required'

        ]);

        

        $slug_ar  = Str::slug($request->title_ar, '-');

        $slug_en  = Str::slug($request->title_en, '-'); 

        $page->title = ['en' => $request->title_en, 'ar' => $request->title_ar];

        $page->description = ['en' => $request->description_en, 'ar' => $request->description_ar];

        $page->slug = ['en' => $slug_en, 'ar' => $slug_ar];

        $page->save();

        

        return redirect()->route('pages.index');

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy(Page $page)

    {

        $page->delete();

        return redirect()->route('pages.index');

    }

}

