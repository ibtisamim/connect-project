<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;

use Illuminate\Database\Eloquent\SoftDeletes;



class ProjectStatus extends Model{

    use HasFactory  , SoftDeletes, HasTranslations;

    public $translatable = ['title'];
    protected $table = "project_statuses";
    protected $fillable = [
        'title',
        'status',
        'level'
    ];


    protected $hidden = [
        'created_at' , 'updated_at' , 'deleted_at'
    ];

}

