<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Question extends Model implements HasMedia 
{
    use HasFactory , SoftDeletes , InteractsWithMedia;
    protected $table = "questions";
    protected $appends = ['photo'  ,'sharelink' , 'modeltype'];
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'gallery_ids'
        
    ];

    protected $hidden = ['deleted_at' , 'updated_at' , 'created_at'];

    public function getModeltypeAttribute(){
        return 'question';
    }

    public function User(){
      return $this->belongsTo(User::class);
    } 

    public function Answer(){
      return $this->hasMany(Answer::class);
    } 


    public function registerMediaCollections(): void {
      $this->addMediaCollection('questiongallary');
    }

    public function getPhotoAttribute(){
        $files  = $this->getMedia('photo');
        if($files){
            $gallery = [];
            foreach($files as $key => $file){
                $gallery[$key]['attachment_id'] =  $file->id;
                $gallery[$key]['file']          =  $file->getUrl();
                $gallery[$key]['property']      =  $file->getCustomProperty('name');
            }
            return $gallery;
        }
        return null;
    }

    public function getSharelinkAttribute(){

        $slug = $this->attributes['id'];
        $title = $this->attributes['title'];
        return $shareComponent = \Share::page(
        URL($slug),
        $title ,
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()        
        ->reddit();

    }



}
