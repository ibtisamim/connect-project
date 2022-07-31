<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostGallery extends Model
{
   use HasFactory , SoftDeletes  ;
    public $translatable = ['title'];
    protected $table = "post_galleries";
    protected $fillable = [
        'title',
        'status',
    ];
    
    protected $hidden = ['deleted_at' , 'updated_at' , 'created_at'];
    
    
}
