<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



use Spatie\MediaLibrary\InteractsWithMedia;



use Spatie\MediaLibrary\HasMedia;


class Gallery extends Model implements HasMedia{



    use HasFactory , InteractsWithMedia;

    protected $table = "galleries";
    protected $appends = ['photo'];
    protected $fillable = [
        'title',
        'status'
    ];


    public function Project(){
      return $this->belongsTo(Project::class);
    }

    public function Posts(){
      return $this->belongsTo(Post::class);
    }

    public function JobOffer(){
      return $this->belongsTo(JobOffer::class);
    }

    public function RequestProject(){
      return $this->belongsTo(RequestProject::class);
    }


    public function registerMediaCollections(): void{
      $this->addMediaCollection('images')->singleFile();
    }

    public function getPhotoAttribute(){
        $file = $this->getMedia('images')->first();
        if ($file) {
            return $file->getFullUrl();
        }
        return null;
    }



    



}



