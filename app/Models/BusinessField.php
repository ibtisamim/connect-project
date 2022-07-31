<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessField extends Model
{
    use HasFactory , SoftDeletes , HasTranslations;
    protected $table="business_fields";
    public $translatable = ['title' , 'description'];
    protected $fillable = [
        'title',
        'description',
        'lang',
        'status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    
    
    public function Business(){
      return $this->hasMany(Business::class);
    }
    
    
    public function Categories(){
      return $this->belongsToMany(Category::class , 'business_fields_categories' ,'business_field_id' , 'category_id');
    }
    
}
