<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model  
{
    use HasFactory  , SoftDeletes , HasTranslations ;
    public $translatable = ['title'];
    protected $table = "blogs";
    protected $fillable = [
        'title',
        'status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function following() {
        return $this->belongsToMany(User::class, 'followers' , 'followable_id', 'user_id' )->where('followers.followable_type','App\Models\Blog');
    }

}
