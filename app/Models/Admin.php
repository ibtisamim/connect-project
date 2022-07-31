<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable implements HasMedia
{
    use HasFactory, HasRoles ,Notifiable, InteractsWithMedia;
    protected $appends = ['photo'];
    protected $guard = "admin";
    protected $table="admins";



  public function registerMediaConversions(Media $media = null): void
  {
    $this->addMediaConversion('images')->fit('fill', 400, 400);
  }

  public function registerMediaCollections(): void
  {
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
