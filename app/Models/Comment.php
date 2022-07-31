<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Comment extends Model
{
    use HasFactory;
    
    protected $table = "comments";
    protected $guarded = [];
    
    protected $fillable = [
        'description',
        'approved',
        'status',
        'create_project_id',
        'user_id',
        'admin_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    
    public function Project(){
      return $this->belongsTo(Project::class , 'create_project_id');
    }

    public function Post(){
      return $this->belongsTo(Post::class,'commentable_id');
    }
   
    public function commentable(){
        return $this->morphTo();   
    }

    public function User(){
      return $this->belongsTo(User::class);
    }
    
    public function Admin(){
      return $this->belongsTo(Admin::class);
    }
}
