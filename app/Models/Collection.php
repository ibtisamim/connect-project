<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Model
{
    use HasFactory , SoftDeletes;
    
    protected $table = "collections";
    protected $fillable = [
    	"name" ,
    	"description" ,
    	"private",
    	"user_id"
    ];
    
    protected $dates = ['deleted_at'];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];    
    
    public function user(){
      return $this->belongsTo(User::class);
    }    
    
    public function Projects(){
         return $this->belongsToMany(Project::class , "followers" , "collection_id" , "followable_id")->withPivot('followable_type' , 'user_id');
    }
    
}
