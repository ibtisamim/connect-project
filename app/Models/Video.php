<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Video extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = "videos";
    protected $fillable = [
        'order',
        'title',
        'description',
        'link',
        'lang',
        'status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $guarded = [];


/*
    public function videoDescription(){
      return $this->hasMany(VideoDescription::class ,'video_id');
    }*/
}
