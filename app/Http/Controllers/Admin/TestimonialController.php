<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{

    public function index()
    {
      $testimonials = Testimonial::with('media')->get();

      return view('admin.pages.testimonials.index',compact('testimonials'));
    }

    public function create()
    {
        return view('admin.pages.testimonials.create');
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'title_ar'=>'required',
            'title_en'=>'required',
            'sub_title_ar'=>'required',
            'sub_title_en'=>'required',
            'description_ar'=>'required',
            'description_en'=>'required',
            'image_testimonial'=>'required',
        ]);


        Testimonial::create([
          'title'=>$data['title_en'],
          'sub_title'=>$data['sub_title_en'],
          'description'=>$data['description_en'],
          'lang'=>'en'
        ]);

        $testimonial->addMedia($request->image_testimonial)->toMediaCollection('images');

        return redirect()->route('testimonials.index');
    }


    public function show(Testimonial  $testimonial)
    {

    }


    public function edit(Testimonial  $testimonial)
    {
      $testimonial = Testimonial::with('media')->where('id',$testimonial->id)->first();
      return view('admin.pages.testimonials.edit',compact('testimonial'));
    }


    public function update(Request $request, Testimonial $testimonial)
    {

      $data = $request->validate([
        'title_ar'=>'required',
        'title_en'=>'required',
        'sub_title_ar'=>'required',
        'sub_title_en'=>'required',
        'description_ar'=>'required',
        'description_en'=>'required',
      ]);

      Testimonial::where('testimonial_id',$testimonial->id)->where('lang','en')->update([
        'title'=>$data['title_en'],
        'sub_title'=>$data['sub_title_en'],
        'description'=>$data['description_en'],
      ]);

      if($request->hasFile('image_testimonial')){
        $testimonial->addMedia($request->image_testimonial)->toMediaCollection('images');
      }

      return redirect()->route('testimonials.index');
    }

    public function destroy(Testimonial $testimonial)
    {
         $testimonial->delete();

         return redirect()->route('testimonials.index');
    }
}
