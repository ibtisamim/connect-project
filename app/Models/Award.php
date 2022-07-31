<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
//use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;

class Award extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia , SoftDeletes ;//, HasTranslations;
   // public $translatable = ['title' ];
    
    protected $table = "awards";
    protected $appends = ['photo'];
    protected $fillable = [
        'title',
        'link'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    
    public function Project(){
      return $this->belongsTo(Project::class);
    }    
    
    
    public function Business(){
      return $this->belongsTo(Business::class);
    }    
    
    public function registerMediaCollections(): void {
      $this->addMediaCollection('images')->singleFile();
      $this->addMediaCollection('awardimg')->singleFile();
    }
    
    public function getPhotoAttribute()
    {
        $file = $this->getMedia('awardimg')->first();
        if ($file) {
            return $file->getFullUrl();
        }
        return null;
    }
    
}
