<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Milestone extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;
    
    protected $table="milestones";
    protected $appends = ['photo'];
    protected $fillable = [
    	"title" ,
    	"description" ,
    	"approved" ,
    	"user_id" ,
    	'create_project_id',
    	'created_at'
    ];
    
    protected $hidden = [
         'updated_at' , 'deleted_at'
    ];

    public function User(){
      return $this->belongsTo(User::class);
    }
    
    public function Project(){
      return $this->belongsTo(Project::class , 'create_project_id');
    }
    
    
    
    public function registerMediaCollections(): void {
      //$this->addMediaCollection('images')->singleFile();
      $this->addMediaCollection('certificateimg')->singleFile();
    }
    
    public function getPhotoAttribute(){
        $file = $this->getMedia('certificateimg')->first();
        if ($file) {
            return $file->getFullUrl();
        }
        return null;
    }
    
}
