<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportReason extends Model
{
    use HasFactory , SoftDeletes , HasTranslations ;
    public $translatable = ['reason'];
    protected $table = "report_reasons";
    protected $fillable = [
        'reason',
        'status',
        'model_type',
        'type',
        'action'
    ];
    
    protected $hidden = ['deleted_at' , 'updated_at' , 'created_at'];
    
    
    public function Users(){
        return $this->belongsToMany(User::class , 'report_user' , 'report_reason_id' , 'user_id')->withPivot('item_type' , 'project_id');
    }
    
}
