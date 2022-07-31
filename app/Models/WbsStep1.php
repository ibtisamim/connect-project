<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WbsStep1 extends Model
{
    use HasFactory;

    protected $table = "wbs_step1";

    protected $guarded = [];

    public function project(){
      return $this->belongsTo(Project::class,'project_id');
    }
}
