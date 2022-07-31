<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class CertificatesCv extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;

    protected $table="certificates_cvs";
    protected $appends = ['photo'];
    protected $fillable = [
    	"title" ,
    	"description" ,
    	"certificate_date" ,
    	"user_id" ,
    ];
    
    protected $hidden = [
        'created_at' , 'updated_at' , 'deleted_at'
    ];

    public function User(){
      return $this->belongsTo(User::class);
    }
    
    public function registerMediaCollections(): void {
      $this->addMediaCollection('images')->singleFile();
    }
    
    public function getPhotoAttribute(){
        $file = $this->getMedia('images')->first();
        if ($file) {
            return $file->getFullUrl();
        }
        return null;
    }
    
}
