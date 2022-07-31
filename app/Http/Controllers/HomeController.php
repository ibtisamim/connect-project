<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Support;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Testimonial;
use App\Models\Business;
use App\Models\User;
use App\Models\Project;
use App\Models\Country;
use App\Models\JobOffer;
use App\Models\City;
use Carbon\Carbon;
use App\Models\RequestProject;
use App;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Collection;
use App\Models\Question;
use App\Models\RssFeed;
use Illuminate\Support\Facades\Validator;
use Vedmant\FeedReader\Facades\FeedReader ;


class HomeController extends Controller{


    public function index(Request $request){ // guest home page - login feeds



        if(Auth::user()){ 

            $user = Auth::user();

            $userId = $user->id;

        if ($request->ajax()) {

            $request_projects = RequestProject::where('id','!=',Auth::user()->id)->where('post_to_feed','1')

            ->latest()->paginate(5);

           $employees = User::where('role','employee')->where('id','!=',Auth::user()->id)->latest()->paginate(5);



            $bussinessprofiles = User::where('role','business')

            ->where('id','!=',Auth::user()->id)

            ->whereHas('profile')

            ->whereDoesntHave('HiddenBusinessProfiles', function($subQuery) use($userId){

                        $subQuery->where("user_id", "=", $userId)

                        ->where('modelable_type' , 'App/Models/User');

            })

            ->latest()->paginate(5);           

            $jobs = JobOffer::where('posttofeed','1')->latest()->paginate(5);
            $questions = Question::latest()->paginate(10);
            $projects = Project::with(['members' , 'categories'])

            ->where('user_id','!=',$userId )

            ->whereDoesntHave('HiddenProjects', function($subQuery) use($userId){

                        $subQuery->where("user_id", "=", $userId)

                        ->where('modelable_type' , 'App/Models/Project');

            })

            ->latest()->paginate(20);//->random(3);

            // get rss feeds links
            $rss_feeds_news = $this->feedReader(); 
            return view('loadMoreFeeds',compact('projects' , 'jobs' , 'employees' , 'bussinessprofiles' , 'request_projects' , 'questions' ,'rss_feeds_news')); 
        }
        return view('feeds'); 
        }else{
            $projects = Project::where('type','publication')->latest()->take(3)->get();//->random(3);
            return view('index',compact('projects'));
        }
    }


    public function feedReader(){
        $rss_feeds_news = array();
        $rss_feeds_links = RssFeed::where('status','Enable')->get();
        foreach($rss_feeds_links as $rss){
            $f = FeedReader::read($rss->rss_link); //'https://rss.art19.com/apology-line'
            $channel_cover = $f->get_channel_tags(SIMPLEPIE_NAMESPACE_ITUNES,'image');
            $channel_title = $f->get_title();
            $channel_link = $f->get_channel_tags('','link');
            if($channel_link != null){
                $channel_link = $channel_link[0]['data'];
            }
            $channel_image = $channel_cover;
            $channel_category = $f->get_channel_tags(SIMPLEPIE_NAMESPACE_ITUNES,'category');
            $items = $f->get_items();
            $feed_items = array();
            foreach($items as $key => $item){
                $feed_items[$key]['title'] = $item->get_title();
                $feed_items[$key]['image'] = $item->get_item_tags(SIMPLEPIE_NAMESPACE_ITUNES, 'image');
                $feed_items[$key]['content'] = $item->get_content();
                $feed_items[$key]['url'] = $item->get_item_tags('', 'link');
                $feed_items[$key]['category'] = $item->get_item_tags('', 'category');

                if($feed_items[$key]['category']  != null){
                    $feed_items[$key]['category'] = $feed_items[$key]['category'][0]['data'];
                }

                if($feed_items[$key]['url'] != null)
                $feed_items[$key]['url'] = $feed_items[$key]['url'][0]['data'];

                $feed_items[$key]['pubDate'] = $item->get_item_tags('', 'pubDate');
                if($feed_items[$key]['pubDate']  != null)
                    $feed_items[$key]['pubDate'] = $feed_items[$key]['pubDate'][0]['data'];
                $feed_items[$key]['media_group'] = $item->get_item_tags('', 'enclosure');
                if($feed_items[$key]['media_group'] != null){
                    $feed_items[$key]['media_group'] = $feed_items[$key]['media_group'][0]['attribs']['']['url'];
                }
            }

            $rss_feeds_news[] = array(
                'channel_cover' => $channel_cover,
                'channel_title' => $channel_title,
                'channel_category' => $channel_category,
                'channel_image' => $channel_image,
                'channel_link' => $channel_link,
                'items' => $feed_items
            );

        }


        
      //  $item = $f->get_items()[0];
      //  $iTunesImage = $item->get_item_tags(SIMPLEPIE_NAMESPACE_ITUNES, 'image');
    //    dd($iTunesImage);
      //  $media_group = $item->get_item_tags('', 'enclosure');
      //  dd( $media_group );

        //$file = $media_group[0]['attribs']['']['url'];
        //echo $file;

       
      //  echo $f->get_items()[0]->get_title();
      //  echo $f->get_items()[0]->get_content();
      
        return  $rss_feeds_news;
    }

    public function languageSwap($locale){

        if (! in_array($locale, ['en', 'ar', 'fr'])) {
            abort(400);
        }

        App::setLocale($locale);
        return redirect()->back();
    }















    public function employeeslist(Request $request){







        $project = Project::where('id',$request->id)->with(['members' , 'categories'])->first();



        return view('employeesList',compact('project'));







    }







    public function collectionProjectslist(Request $request){

        $collection = Collection::where('id',$request->id)->first();

        return view('collectionProjectsList',compact('collection'));

    }    























    public function change_status_notification(Request $request){







        $user = User::find($request->user_id);







        $user->unreadNotifications()->update(['read_at' => now()]);







        $count =  $user->unreadNotifications->count();







        return $count;







    }







    public function request_project_store(Request $request){



      $data = $request->validate([



        'about'              => 'required',

        'details_invitees'   => 'required',

        'located'            => 'required',

        'category'           => 'required',

        'architects'         => 'required',

        'contractors'        => 'required',

        'designers'          => 'required',



      ]);



      RequestProject::create([

        'about'             => $data['about'],

        'details_invitees'  => $data['details_invitees'],

        'located'           => $data['located'],

        'category_id'          => $data['category'],

        'architects'        => $data['architects'],

        'contractors'       => $data['contractors'],

        'designers'         => $data['designers'],

        'user_id'           => Auth::user()->id,

      ]);



      return redirect()->route('home');



    }







    public function pageview($id, $slug = ''){



        $testimonials = Testimonial::with('media')->get();

        $videos = Video::with('media')->where('lang','en')->get();

        $partners = Partner::get();

        $page = Page::findOrFail($id);



        return view('page' , compact('partners'))

            ->withPage($page)

            ->withCanonical($page->url);



    }



    public function contact(){

      return view('home.contact_us');

    }



    public function contact_save(Request $request){



      $data = $request->validate([

          'name'=>'required',

          'email'=>'required',

          'message'=>'required',



      ]);



      Contact::create([

          'name'=>$data['name'],

          'email'=>$data['email'],

          'message'=>$data['message'],



      ]);



      toast('Submit contact successfully','success');

      return redirect()->route('contact');



    }





    public function support(){



      $supports =  Support::where('lang','en')->get();

      return view('home.support',compact('supports'));



    }



    public function search(Request $request){



        $rules = [

            'query' => 'required|min:3',

        ];



        $customMessages = [

            'query.required' => '',

            'query.min' => ''

        ];





     //   $this->validate($request, $rules, $customMessages);

        $validator = Validator::make($request->all(), $rules, $customMessages, [

        ]);



        if ($validator->fails()) {

            return back()->withErrors($validator)->withInput();

        }


        $currentlang = App::getLocale();

        App::setLocale($currentlang);

        $query = $request->input('query');

        $results = Project::where([['called', 'like', "%$query%"],['status','=','2']])
            ->orWhere([['description', 'like', "%$query%"],['status','=','2']])->paginate(10);

        $results2 = User::where([['name', 'like', "%$query%"],['role','business']])
            ->orWhere([['email', 'like', "%$query%"],['role','business']])
            ->orWhere([['username', 'like', "%$query%"],['role','business']])
            ->orWhere([['company', 'like', "%$query%"],['role','business']])
            ->whereHas('profile')
            ->paginate(10);


        $data = $results->concat($results2);

        $data->random();


        $results = $data;

        //->appends(array('query' =>$request->input('query') , 'type' => 'projects'));

        return view('home.search', compact('results' ,'results2', 'currentlang' , 'query'));



    }





    public function filter_subcategory(Request $request){



      $sub_categories = Category::where('lang','en')->where('title' ,'like', '%'.$request->search.'%')->get();

      return $sub_categories;

    }





    public function project_info($id){



      $project = Project::with(['media' , 'user'=>function($q){

        $q->with(['Business'=>function($g){

          $g->with('media');

        }]);

      }])->where('id',$id)->first();



      $similar_projects = array();

      if($project){ 

      $categories_ids = $project->categories()->pluck('category_id')->toArray();       

      $dt = Carbon::now();      

      $similar_projects = Project::whereHas('categories', function ($query) use ($categories_ids) {

        $query->whereIn('categories.id',$categories_ids) ;

    })

    ->where('projects.id','!=',$id)

    ->orderBy('projects.created_at', 'desc')

    ->skip(0)->take(10)->get();   



      // ->whereRaw('"'.$dt.'" between `start_date` and `end_date`') 

      }



      return view('project.view',compact('project' , 'similar_projects' , 'categories_ids'));



    }





    // display user information public

    public function userShow($id , Request $request){



        $user = User::where('id',$id)->first();

        $user_data =  $user->profile()->first();

        $cities = City::where('country_id',$user_data->country_id)->get();

        return view("user.show",compact('user' , 'user_data' , 'cities'));



    }



    // display job information public

    public function jobShow($id , Request $request){

        $job = job_offers::where('id',$id)->first();

        return view("jobDetails",compact('job'));

    }



    // display request Project information public







    public function requestProjectShow($id , Request $request){

        $request_project = RequestProject::where('id',$id)->first();

        return view("requestProject",compact('request_project'));



    }



    public function get_citiesby_country_id($country_id , Request $request){

        if($request->has('term')){

            $list = City::where('country_id',$country_id)

            ->where('name', 'like', '%' . $request->get('term') . '%')

            ->select('id AS id' , 'name->en AS text')->get();

        }else{

         $list = City::where('country_id',$country_id)->select('id AS id' , 'name->en AS text')->get();   

        }



        $json = [];



        foreach ($list as $item) {

            $json[] = ['id' => $item->id , 'text' => $item->text ];

        }

        return  $json; //response()->json($json , 200);



    }      















}















