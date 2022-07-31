<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideosController extends Controller
{

    public function index()
    {
        $videos = Video::where('lang','en')->get();
        return view('admin.pages.videos.index',compact('videos'));
    }

    public function create()
    {
      return view('admin.pages.videos.create');
    }

    public function store(Request $request)
    {


      $data = $request->validate([
        'title_ar'=>'required',
        'title_en'=>'required',
        'description_ar'=>'required',
        'description_en'=>'required',
        'video'=>'required',
      ]);

      $video = Video::create();

      Video::create([
        'title'=>$data['title_en'],
        'description'=>$data['description_en'],
        'lang'=>'en',
        'video_id'=>$video->id
      ]);

      Video::create([
        'title'=>$data['title_ar'],
        'description'=>$data['description_ar'],
        'lang'=>'ar',
        'video_id'=>$video->id
      ]);

      $video->addMedia($request->video)->toMediaCollection('videos');

      return redirect()->route('videos.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $video =  Video::with('media','videoDescription')->where('id',$id)->get();
        return view('admin.pages.videos.edit',compact('video'));
    }


    public function update(Request $request, Video $video)
    {

      $data = $request->validate([
        'title_ar'=>'required',
        'title_en'=>'required',
        'description_ar'=>'required',
        'description_en'=>'required',
      ]);

      if($request->hasFile('video')) {

        $video->addMedia($request->video)->toMediaCollection('videos');
      }

      Video::where('video_id',$video->id)->where('lang','en')->update([
        'title'=>$data['title_en'],
        'description'=>$data['description_en'],
      ]);

      Video::where('video_id',$video->id)->where('lang','ar')->update([
        'title'=>$data['title_ar'],
        'description'=>$data['description_ar'],
      ]);


      return redirect()->route('videos.index');
    }


    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('videos.index');
    }
}
