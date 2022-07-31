<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;



class JobOffer extends Model implements HasMedia 

{

    use HasFactory  , InteractsWithMedia;

    protected $table = "job_offers";

    protected $appends = ['photo' , 'jobmeida' ,'sharelink'];

    protected $fillable = [

        'title',

        'description',

        'location',

        'posttofeed',

        'deadline',

        'category_id',

        'user_id',

        

    ];

    

    public function User(){

      return $this->belongsTo(User::class);

    }

    

    public function Category(){

      return $this->belongsTo(Category::class);

    }



    public function registerMediaCollections(): void {

      $this->addMediaCollection('jobmeida');

    }

    

    public function getPhotoAttribute(){

        $file = $this->getMedia('jobmeida')->first();

        if ($file) {

            return $file->getFullUrl();

        }

        return null;

    }


    public function Gallery(){
      return $this->hasMany(Gallery::class);
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

