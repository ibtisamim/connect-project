<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
//use Illuminate\Database\Eloquent\SoftDeletes;


class HiddenReason extends Model
{
    use HasFactory   , HasTranslations ;
    public $translatable = ['title'];
    protected $table = "hidden_reasons";
    protected $fillable = [
        'title',
        'status',
        'action',
        'type'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
