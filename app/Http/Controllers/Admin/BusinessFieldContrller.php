<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessField;
use Illuminate\Http\Request;

class BusinessFieldContrller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items_list =  BusinessField::with('categories')->latest()->paginate(10);
        return view('admin.pages.business_fields.index',compact('items_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.pages.business_fields.create');
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
            'description_en'=>'required',
        ]);
        
        $businessField = new BusinessField;
        $businessField->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
        $businessField->description = ['en' => $request->description_en, 'ar' => $request->description_ar];
        $businessField->save();
        if($request->has('category_id')){
            // attach
            $businessField->Categories()->sync($request->category_id);
            
        }
        toast('business field created successfully','success');
        return redirect()->route('business_fields.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusinessField  $businessField
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessField $businessField)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusinessField  $businessField
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessField $businessField)
    {
        return view('admin.pages.business_fields.edit',compact('businessField'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusinessField  $businessField
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessField $businessField)
    {
        $data = $request->validate([
            'title_ar'=>'required',
            'description_ar'=>'required',
            'title_en'=>'required',
            'description_en'=>'required',
        ]);

        $businessField->setTranslation('title', 'en', $request->title_en)
            ->setTranslation('title', 'ar', $request->title_ar)
            ->setTranslation('description', 'en', $request->description_en)
            ->setTranslation('description', 'ar', $request->description_ar)
        ->save();
        
        if($request->has('category_id')){
            // attach
            $businessField->Categories()->sync($request->category_id);
            
        }
            
        toast('Business Field  updated successfully','success');
        return redirect()->route('business_fields.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusinessField  $businessField
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessField $businessField)
    {
        $businessField->delete();
        toast('Business Field deleted successfully','success');
        return redirect()->route('business_fields.index');
    }
}
