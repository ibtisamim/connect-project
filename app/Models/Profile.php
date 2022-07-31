<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model implements HasMedia
{
    use HasFactory , Notifiable , InteractsWithMedia , HasRoles , SoftDeletes;

    protected $table = "profiles";
    protected $appends = ['photo']; // commercial register
    protected $guarded= [];
    
    protected $fillable = [
        'name',
        'job_description',
        'bio',
        'linkedin',
        'area',
        'street',
        'facebook',
        'instagrm',
        'twiter',
        'youtube',
        'tiktok',
        'pinterest',
        'user_id',
        'country_id',
        'city_id',
        'lat',
        'lon',
        'legal_id',
        'vat',
        'company_name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    public function user(){
      return $this->belongsTo(User::class , ' user_id');
    }

    public function Country(){
      return $this->belongsTo(Country::class);
    }
    
    public function City(){
      return $this->belongsTo(City::class);
    }

    public function registerMediaCollections(): void
    {
      $this->addMediaCollection('images')->singleFile();
      $this->addMediaCollection('userprofilecover')->singleFile();
    }
    
    
    public function getPhotoAttribute()
    {
        $file = $this->getMedia('userprofilecover')->first();
        if ($file) {
            return $file->getFullUrl();
        }
        return null;
    }

}
