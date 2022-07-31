<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class PostCategory extends Model
{
   use HasFactory , SoftDeletes , HasTranslations ;
    public $translatable = ['title'];
    protected $table = "post_categories";
    protected $fillable = [
        'title',
        'status',
    ];
    
    protected $hidden = ['deleted_at' , 'updated_at' , 'created_at'];

    public function Post(){
        return $this->hasMany(Post::class , 'post_category_id');
    }
}
