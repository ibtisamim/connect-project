<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Comment;
use App\Models\Blog;
use App\Models\Post;
use Carbon\Carbon;

class PostsController extends Controller
{

    public function blog(Request $request){
        $blog = Blog::find(1);
        $posts = Post::where('active',1)->orderBy('created_at','desc')->paginate(10);
        return view('blog.blog',compact('posts' , 'blog'));
    }    
    
    public function postview($slug ,Request $request){ 
        $post = Post::where('slug->en',$slug)->first(); 
  
        if(!$post){
           return redirect('/')->withErrors('requested post not found');
        }

        $shareComponent = \Share::page(
        URL($post->slug),
        $post->title,
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()        
        ->reddit();
        return view('blog.post',compact('post' , 'shareComponent'));
    }    


    public function like($id , Request $request){
      $post = Post::where('active',1)
      ->where('id',$id)->first();
      $current_likes_count = (int)$post->likes;
      $current_likes_count = $current_likes_count + 1;
      $post->update(['likes'=>$current_likes_count ]);
      $post->UserLike()->attach(Auth::user()->id);
      toast('You like post successfully','success');
      return redirect()->back();
    }

    public function unlike($id , Request $request){
      $post = Post::where('active',1)
      ->where('id',$id)->first();
      $current_likes_count = $post->likes;
      $post->update(['likes'=>$current_likes_count - 1]);
      $post->UserLike()->detach(Auth::user()->id);
      return redirect()->back();
    }

    public function commentAdd(Request $request){
      $comment = new Comment;
      $comment->description = $request->description;
      $comment->approved = $request->approved;
      $comment->status = $request->status;
    //  $comment->create_project_id = $request->create_project_id;
      $comment->user_id = Auth::user()->id;
      $comment->commentable_type = 'app/Models/Post';
      $comment->commentable_id = $request->post_id;
      
      $comment->save();  
      toast('Your comment added successfully','success');
      return redirect()->back();
    }
    
    public function commentDelete($id , Request $request){
      $comment =  Comment::find($id)->delete();
      toast('Your comment deleted successfully','success');
      return redirect()->back();
    }
    
    public function commentEdit(Request $request){
      $comment = Comment::where('id' ,$request->comment_id)->update(['description' => $request->descriptionedit , 'updated_at'=> Carbon::now() ]); 
      toast('Your comment updated successfully','success');
      return redirect()->back();
    }

    public function unfollow(Request $request){
      $Blog = Blog::where('id','1')->first();    
      Auth::user()->following()->detach ($Blog);   
      toast('Un-follow blog successfully','success');
      return redirect()->back();
    }
    
    public function follow(Request $request){   
      Auth::user()->following()->attach(array('1' =>[ 'followable_type'=>'App\Models\Blog']));     
      toast('Follow blog successfully','success');
      return redirect()->back();
    }  

}
