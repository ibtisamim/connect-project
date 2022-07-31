<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RssFeed extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = "rss_feeds";
    protected $fillable = [
        "title",
        "rss_link",
        "status"
    ];  

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

}
