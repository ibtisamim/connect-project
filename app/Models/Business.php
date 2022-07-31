<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;


class Business extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia , SoftDeletes , HasTranslations;
    public $translatable = ['name' , 'country' , 'area' , 'city' , 'street' , 'scope_work' , 'description' , 'speciality'];
    protected $table = "businesses";
    protected $guarded = [];
    protected $appends = ['photo' , 'cover'];
    protected $fillable = [
        'name',
        'pio',
        'country',
        'area',
        'city',
        'street',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'linked_in',
        'scope_work',
        'description',
        'speciality',
        'lat',
        'long',
        'user_id',
        'business_field_id'
      
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    public function registerMediaCollections(): void{
      $this->addMediaCollection('portfolio')->singleFile();
      $this->addMediaCollection('commercial_register')->singleFile();
      $this->addMediaCollection('cover')->singleFile();

    }
    
    public function BusinessField(){
      return $this->belongsTo(BusinessField::class);
    }

    public function user(){
      return $this->belongsTo(User::class , 'user_id');
    }
    
    public function Country(){
      return $this->belongsTo(Country::class , 'country_id');
    }
    
    
    public function Awards(){
      return $this->hasMany(Award::class);
    }
    
    public function getCoverAttribute(){
        $file = $this->getMedia('cover')->first();
        if ($file) {
            return $file->getFullUrl();
        }
        return null;
    }
    
    
}
