<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Str;
use Auth;

class Project extends Model implements HasMedia {

    

    use HasFactory  , InteractsWithMedia , SoftDeletes , HasTranslations ;

    public $translatable = ['called' , 'description' , 'located'];

    protected $table = "projects";

    protected $appends = ['photo' , 'qrcode' , 'modeltype' ,'sharelink'];

    protected $fillable = [

        'called',
        'slug',
        'description',

        'located',

        'status',

        'wbs_step1',

        'start_time',

        'time_margin',

        'privacy',

        'user_id',

        'save_type',

        'start_date',

        'end_date',

        'lat',

        'long',

        'country_id',

        'city',

        'street',

        'area',

        'post_to_feed'

    ];



    protected $hidden = ['wbs_step1'];



    public function user(){

      return $this->belongsTo(User::class,'user_id');

    }

    

    public function Country(){

      return $this->belongsTo(Country::class);

    }



    public function webstep1(){

      return $this->hasOne(WbsStep1::class,'project_id');

    }



    public function Tasks(){
      return $this->hasMany(Task::class,'project_id');
    }


    public function Comments(){

      return $this->hasMany(Comment::class , 'create_project_id');

    }

    public function CommentsApproved(){

      return $this->hasMany(Comment::class , 'create_project_id')->where('approved','1');

    }



    public function Categories(){
        return $this->belongsToMany(Category::class , 'project_categories' , 'project_id' , 'category_id')->withPivot("business_id");
    }

    
    public function Employees(){
      return $this->belongsToMany(User::class , 'project_users')->withPivot('role', 'slug' ,'unique_code')
      ->where('project_users.type','Employee');
    }

    
    public function Members(){

      return $this->belongsToMany(User::class , 'project_users')->withPivot('role', 'slug' ,'unique_code')

      ->where('project_users.type','Member');

    }

    

    public function Awards(){
      return $this->hasMany(Award::class);
    }    

    

    public function Gallery(){
      return $this->hasMany(Gallery::class);
    }  

    public function registerMediaCollections(): void {
      $this->addMediaCollection('images')->singleFile();
      $this->addMediaCollection('cover')->singleFile();
    }

    
    public function following(){
      return $this->belongsToMany(User::class , 'followers');
    }

    public function Collections(){
         return $this->belongsToMany(Collection::class , "followers"  , "followable_id" , "collection_id")->withPivot('followable_type' , 'user_id');
    }

    
    public function HiddenProjects()
    {
        return $this->belongsToMany(User::class, 'hidden_modelable' , 'modelable_id' , 'user_id')->withPivot('hidden_reason_id' , 'modelable_type');
    }


    public function getPhotoAttribute(){

        $file = $this->getMedia('cover')->first();
        if ($file) {
            return $file->getFullUrl();
        }

        return null;

    }

    public function getModeltypeAttribute(){
        return 'project';
    }


    public function getSharelinkAttribute(){

        $route_name = \Request::route()->getName();
        if ($route_name != 'postsselectAll'){
        $slug = $this->attributes['slug'];
        $title = $this->attributes['called'];
        return $shareComponent = \Share::page(
        URL('project_info/'.$this->attributes['id']),
        $title
        
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()        
        ->reddit();

        }

    }

    
    public function getQrcodeAttribute(){
        //qrcode
        $file = public_path('public/generated/qr/'.$this->attributes['id'].'/qrcode.png');
        if(file_exists($file)){
          return asset('generated/qr/'.$this->attributes['id'].'_qrcode.png');
        }
        return null;
    }

    public static function boot() {

        parent::boot();

        static::retrieved(function($project) { 

            if($project){
                if($project->slug == null){
                    $project->slug = $project->createSlug($project->called.rand()); 
                }
                if($project->getQrcodeAttribute() == null){
                    \QrCode::size(122)
                        ->format('png')
                        ->generate($project->id, public_path('generated/qr/'.$project->id.'_qrcode.png'));                
                }

                $project->save();
            }

        });

        

        //once created/inserted successfully this method fired, so I tested foo 

        static::created(function ($project) {

            if($project){
              $project->slug = $project->createSlug($project->called.rand());  
            \QrCode::size(122)->format('png')->generate($project->id, public_path('generated/qr/'.$project->id.'_qrcode.png')); 
            $project->save();
            }    

        });

    }

    


    private function createSlug($name)
    {
        if (static::whereSlug($slug = Str::slug($name))->exists()) {

            $max = static::whereCalled($name)->latest('id')->skip(1)->value('slug');

            if (isset($max[-1]) && is_numeric($max[-1])) {

                return preg_replace_callback('/(\d+)$/', function ($mathces) {

                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }

}

