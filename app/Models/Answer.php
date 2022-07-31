<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = "answers";
    protected $appends = ['modeltype'];
    protected $fillable = [
        'answer_text',
        'user_id',
        'question_id'
    ];

    protected $hidden = ['deleted_at' , 'updated_at' , 'created_at'];

    public function getModeltypeAttribute(){
        return 'answer';
    }

    public function Question(){
      return $this->belongsTo(Question::class);
    }  

    public function User(){
      return $this->belongsTo(User::class);
    }  

}
