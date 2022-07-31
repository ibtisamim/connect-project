<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\HomeController;

class Page extends Model
{
    use HasFactory  , HasTranslations , SoftDeletes;
    public $translatable = ['title' , 'description' ,'slug'];
    protected $table = "pages";
    protected $fillable = [
        'title',
        'description',
        'slug'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    /*
    public function getSlugAttribute(): string
    {
        return $this->attributes['slug'] ;
    }*/
    
    public function getUrlAttribute(): string
    {
        $slug = json_decode($this->attributes['slug']);
        return action([HomeController::class , 'pageview'],[ $slug->en]);
    }

}
