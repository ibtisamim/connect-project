<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Validator;

class CountryContrller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
       $items = Country::latest()->paginate(10);
       return view('admin.pages.countries.index' , compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.countries.create');
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
            'title_ar'=>'required|regex:/^[a-zA-Z\\s]+$/u|min:5|max:255',
            'title_en'=>'required|regex:/^[a-zA-Z\\s]+$/u|min:5|max:255',
            'code' => 'required',
            'key'  => 'required'
        ];
        
        $customMessages = [
            'title_ar.required'      => 'The title arabic field is required.',
            'title_en.required'      => 'The title english field is required.'
        ];
        
        $validator = Validator::make($request->all(), $rules ,$customMessages );
        
        if ($validator->fails()) {
            toast($validator->errors()->first(),'warning');   
            return redirect()->back();
        }        
        
        $item = new Country;
        $item->country = $request->title_en;
        $item->code = $request->code;
        $item->country_key = $request->key;
        $item->status = 'Enable';
        $item->save();
        
        toast('Country created successfully','success');
        return redirect()->route('countries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('admin.pages.countries.edit',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $rules = [
            'title_ar'=>'required|regex:/^[a-zA-Z\\s]+$/u|min:5|max:255',
            'title_en'=>'required|regex:/^[a-zA-Z\\s]+$/u|min:5|max:255',
            'code' => 'required',
            'key'  => 'required'
        ];
        
        $customMessages = [
            'title_ar.required'      => 'The title arabic field is required.',
            'title_en.required'      => 'The title english field is required.'
        ];
        
        $validator = Validator::make($request->all(), $rules ,$customMessages );
        
        if ($validator->fails()) {
            toast($validator->errors()->first(),'warning');   
            return redirect()->back();
        }        
        
        $item = $country;
        $item->country = $request->title_en;
        $item->code = $request->code;
        $item->country_key = $request->key;
        $item->status = 'Enable';
        $item->save();
        
        toast('Country created successfully','success');
        return redirect()->route('countries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
        toast('country deleted successfully','success');
        return redirect()->route('countries.index');
    }
}
