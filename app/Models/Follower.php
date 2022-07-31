<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Follower extends Model
{
    use HasFactory , SoftDeletes;
    
    protected $table = "followers";
    protected $fillable = [
    	'collection_id',
    	'followable_id',
    	'followable_type',
    	'status',
    	'user_id'
    ];
    
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];    
    

}
