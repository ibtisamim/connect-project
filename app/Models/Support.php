<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Support extends Model
{
    use HasFactory   , SoftDeletes , HasTranslations ;

    protected $table="supports";
    public $translatable = ['answer' , 'question'];
    protected $fillable = [
        'order',
        'answer',
        'lang',
        'question',
        'status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function supportDetails(){
      return $this->hasMany(Support::class,'support_id');
    }
}
