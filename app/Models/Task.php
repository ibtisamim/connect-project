<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = "tasks";

    protected $fillable = [
        'task_name',
        'description',
        'cost',
        'duration',
        'assigned_to',
        'duration_type',
        'card_id',
        'project_id' ,
        'starting_date'
        ,'ending_date'
        ];

    public function project(){
        return $this->belongsTo(Project::class,'project_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'assigned_to');
    }
}
