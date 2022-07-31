<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model 
{
    use HasFactory  , SoftDeletes , HasTranslations;
    
    public $translatable = ['title' , 'description' , 'slug'];
    protected $table = "categories";
    protected $guarded = [];
    protected $fillable = [
        'title',
        'description',
        'slug',
        'lang',
        'parent_id'
    ];
    
    protected $hidden = [
        'created_at' , 'updated_at' , 'deleted_at'
    ];
    
    public function parentId(){
        return $this->belongsTo(self::class , 'parent_id');
    }
    
    public function Projects(){
        return $this->belongsToMany(Project::class , 'project_categories'  , 'followable_id' , 'user_id')->withPivot("status");
    }
    
    public function BusinessField(){
      return $this->belongsToMany(BusinessField::class , 'business_fields_categories' ,'category_id' ,'business_field_id');
    }
    
}
