<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;


class Post extends Model implements HasMedia
{

    use HasFactory , InteractsWithMedia , HasTranslations;

    protected $table = "posts";


    public $translatable = ['title' , 'body' , 'slug'];
    protected $appends = ['thumb' ,'sharelink'];
    protected $fillable = [

    	"title" ,
    	"body" ,
    	"slug",
        "post_category_id",
        "likes"

    ];

    public function registerMediaCollections(): void {
      $this->addMediaCollection('images')->singleFile();
      $this->addMediaCollection('thumb')->singleFile();

    }

    
    public function getThumbAttribute(){

        $file = $this->getMedia('thumb')->first();
        if ($file) {
            return $file->getFullUrl();
        }
        return null;

    }



    public function getSharelinkAttribute(){

        $route_name = \Request::route()->getName();
        if ($route_name != 'postsselectAll'){
        $slug = json_decode($this->attributes['slug']);
        $title = json_decode($this->attributes['title']);
        $thumb = $this->getThumbAttribute();

        return $shareComponent = \Share::page(

        URL($slug->en),

        $title->en ,

        )

        ->facebook()

        ->twitter()

        ->linkedin()

        ->telegram()

        ->whatsapp()        

        ->reddit();

        }

    }



    public function comments(){
        return $this->hasMany(Comment::class,'commentable_id');
    }


    public function CommentsApproved(){
      return $this->hasMany(Comment::class , 'commentable_id')->where('approved','1');
    }

    public function Category(){
        return $this->belongsTo(PostCategory::class ,'post_category_id');
    }


    public function Gallery(){
      return $this->hasMany(Gallery::class);
    }  

    public function UserLike(){
      return $this->belongsToMany(User::class , 'postlikes_users' , 'post_id' ,'user_id' );
    }

}

