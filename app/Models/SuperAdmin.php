<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;

class SuperAdmin extends Model implements HasMedia
{
    use HasFactory ,HasRoles , InteractsWithMedia;

    protected $table = "admins";
    protected $guard_name = "web";
    protected $guarded = [];

    public function registerMediaConversions(Media $media = null): void
    {

      $this->addMediaConversion('images')->fit('fill', 400, 400);
    }

    public function registerMediaCollections(): void
    {

      $this->addMediaCollection('images')->singleFile();

    }
}
