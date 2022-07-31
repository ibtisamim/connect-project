<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RssFeed;
use Illuminate\Http\Request;
use Validator;

class RssFeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $items = RssFeed::paginate(10);
       return view('admin.pages.rss_feeds.index' , compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.rss_feeds.create');
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
            'rss_link'=>'required',
            'title_en'=>'required',
        ];

        $customMessages = [
            'rss_link.required'             => 'The link field is required.',
            'title_en.required'         => 'The reason english field is required.',
        ];

        $validator = Validator::make($request->all(), $rules ,$customMessages );
        if ($validator->fails()) {
            toast($validator->errors()->first(),'warning');   
            return redirect()->back();
        }    

        $rss_feed = new RssFeed;
        $rss_feed->title =     $request->title_en;
        $rss_feed->status = $request->status;
        $rss_feed->rss_link = $request->rss_link;
        $rss_feed->save();
        toast('RssFeed created successfully','success');
        return redirect()->route('rss_feeds.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RssFeed  $rssFeed
     * @return \Illuminate\Http\Response
     */
    public function show(RssFeed $rssFeed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RssFeed  $rssFeed
     * @return \Illuminate\Http\Response
     */
    public function edit(RssFeed $rssFeed)
    {
        return view('admin.pages.rss_feeds.edit',compact('rssFeed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RssFeed  $rssFeed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RssFeed $rssFeed)
    {
        $rules = [
            'rss_link'  =>'required',
            'title_en'  =>'required',
        ];

        $customMessages = [
            'rss_link.required'         => 'The link field is required.',
            'title_en.required'         => 'The english field is required.',
        ];

        $validator = Validator::make($request->all(), $rules ,$customMessages );
        if ($validator->fails()) {
            toast($validator->errors()->first(),'warning');   
            return redirect()->back();
        }    

        $rssFeed->title    = $request->title_en;
        $rssFeed->status   = $request->status;
        $rssFeed->rss_link = $request->rss_link;
        $rssFeed->save();
        toast('RssFeed updated successfully','success');
        return redirect()->route('rss_feeds.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RssFeed  $rssFeed
     * @return \Illuminate\Http\Response
     */
    public function destroy(RssFeed $rssFeed){
        $rssFeed->delete();
        toast('RssFeed deleted successfully','success');
        return redirect()->route('rss_feeds.index');
    }
}
