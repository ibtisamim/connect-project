<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Testimonial extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;

    protected $table = "testimonials";

    protected $guarded = [];

    protected $fillable = [
        'title',
        'sub_title',
        'description',
        'lang',
        'status',
        'order'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    

    public function registerMediaConversions(Media $media = null): void
    {

      $this->addMediaConversion('images')->fit('fill', 400, 400);
    }

    public function registerMediaCollections(): void
    {

      $this->addMediaCollection('images')->singleFile();

    }
}
