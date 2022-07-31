<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;

    protected $table="work_experiences";
    protected $guarded =[];
    protected $fillable = [
        'company',
        'field',
        'starting_date',
        'ending_date',
        'title',
        'employee_type',
        'location',
        'industry',
        'description',
        'ongoing',
        'user_id'
    ];
    
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    
    public function User(){
      return $this->belongsTo(User::class);
    }
    
}
