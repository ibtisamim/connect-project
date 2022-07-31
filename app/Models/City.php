<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory  , HasTranslations , SoftDeletes;
    public $translatable = ['name'];
    protected $table = "cities";
    protected $fillable = [
        'name',
        'country_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    public function Country(){
        return $this->belongsTo(Country::class);
    }
}
