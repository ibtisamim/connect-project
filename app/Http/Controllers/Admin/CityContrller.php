<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Validator;

class CityContrller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if($request->has('country_id')){
            $items =  City::where('country_id',$request->country_id)->latest()->paginate(10);
        }else{
            $items = City::paginate(10);
        }        
      
       return view('admin.pages.cities.index' , compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.pages.cities.create');
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
            'title_en'=>'required',
            'country_id'=>'required',
        ];
        
        $customMessages = [
            'title_ar.required'             => 'The title arabic field is required.',
            'title_en.required'             => 'The title english field is required.',
            'country_id.required'       => 'The Country field is required.',
        ];
        
        $validator = Validator::make($request->all(), $rules ,$customMessages );
        
        if ($validator->fails()) {
            toast($validator->errors()->first(),'warning');   
            return redirect()->back();
        }        
        
        $city = new City;
        $city->name = ['en' => $request->title_en, 'ar' => $request->title_ar];
        $city->country_id = $request->country_id;
        $city->save();
        
        toast('City created successfully','success');
        return redirect()->route('cities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
       return view('admin.pages.cities.edit',compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $rules = [
           // 'name' => 'required|regex:/^[a-zA-Z\\s]+$/u|min:5|max:255|unique:users,name,'.$user->id, 
            'title_ar'=>'required',
            'title_en'=>'required',
            'country_id'=>'required',
        ];
        
        $customMessages = [
            'title_ar.required'             => 'The title arabic field is required.',
            'title_en.required'             => 'The title english field is required.',
            'country_id.required'       => 'The Country field is required.',
        ];
        
        $validator = Validator::make($request->all(), $rules ,$customMessages );
        
        if ($validator->fails()) {
            toast($validator->errors()->first(),'warning');   
            return redirect()->back();
        }        
        
        $city->name = ['en' => $request->title_en, 'ar' => $request->title_ar];
        $city->country_id = $request->country_id;
      
        $city->save();
        
        toast('City updated successfully','success');
        return redirect()->route('cities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        toast('city deleted successfully','success');
        return redirect()->route('cities.index');
    }
    

    
  
    
}
