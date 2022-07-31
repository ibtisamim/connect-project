<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class RequestProject extends Model implements HasMedia
{

    use HasFactory , InteractsWithMedia;

    protected $table = "request_projects";
    protected $appends = ['gallary' ,'sharelink'];
    protected $fillable = [
        "title",
        "description",
        "location",
        "category_id",
        "deadline",
        "user_id",
    	"post_to_feed",
        "budget"
    ];    

    

    public function User(){
    	return $this->belongsTo(User::class);
    }

    public function Category(){
    	return $this->belongsTo(Category::class);
    }

    public function rfqApplyUsers(){
        return $this->belongsToMany(User::class , 'request_project_applies' , 'request_project_id' , 'user_id')->withPivot('status');
    }

    public function getSharelinkAttribute(){
        $slug = $this->attributes['id'];
        $title = $this->attributes['title'];
        return $shareComponent = \Share::page(
        URL($slug),
        $title ,
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()        
        ->reddit();
    }

    public function Gallery(){
      return $this->hasMany(Gallery::class);
    } 

    public function registerMediaCollections(): void {
      $this->addMediaCollection('requestprojectgallary');
    } 

    public function getGallaryAttribute(){
        $files  = $this->getMedia('requestprojectgallary');
        if($files){
            $gallary = [];
            foreach($files as $key => $file){
                $gallary[$key]['id'] =  $file->id;
                $gallary[$key]['file']          =  $file->getUrl();
                $gallary[$key]['property']      =  $file->getCustomProperty('name');
            }
            return $gallary;
        }
        return null;
    }

}

