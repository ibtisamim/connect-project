<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Admin;
use Notification;
use App\Notifications\adminsNotification;
use App\Models\User;
use App\Models\Blog;
use App\Models\Post;
use App\Notifications\BlogNotification;
use Auth;

//use Illuminate\Support\Facades\Notification;



class NotificationController extends Controller{



    public function __construct(){

        $this->middleware('auth');

    }


    public function index(){



    }

    public function sendBlogNotification() { // for test

        // Get the users

        $users = Blog::where('id','1')->first()->following()->get();

        $post = Post::find(3);

        $blogData = [

            'post_id' => $post->id,

            'post_title_id' => $post->title,

            'url' => {{ route('post.view',$post->slug) }},

        ];

  

        Notification::send($users, new BlogNotification($blogData));

        

        dd('Task completed!');

    }



    public function sendAdminNotification() {



        $admin = Admin::first();



        $notificationData = [



            'name' => 'You received new notifications',



            'body' => 'notifications body.',



            'text' => '',



            'modelUrl' => url('/'),



            'model_id' => 007,



            'model_type' => 007,



        ];



  



        Notification::send($admin, new adminsNotification($notificationData));



    }



}