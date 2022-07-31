<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationCv extends Model
{
    use HasFactory;

    protected $table="education_cvs";

    protected $guarded =[];
    protected $fillable = [    
        'education_feild',
        'education_degree',
        'starting_date',
        'ending_date',
        'school',
        'grade',
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
