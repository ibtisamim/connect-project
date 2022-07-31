<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use NotificationChannels\WebPush\HasPushSubscriptions;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use App\Models\SettingNotification;
use Auth;


class User extends Authenticatable implements HasMedia{

    use HasFactory, Notifiable,HasRoles,HasPushSubscriptions,InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     * @var array
     */

    protected $appends = ['photo' , 'profilecover' , 'applyrfq' , 'commercialregister' , 'modeltype' , 'questiongallary' ,'job_apply_media'];

    protected $fillable = [

        'name',
        'email',
        'password',
        'fb_id',
        'google_id',
        'status',
        'company',
        'phone',
        'website',
        'address',
        'role',
        'username',
        'manager_id'

    ];

    /**



     * The attributes that should be hidden for arrays.

     *

     * @var array

     */

    protected $hidden = [
        'remember_token',
    ];



    /**

     * The attributes that should be cast to native types.

     *

     * @var array

     */


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function profile(){
      return $this->hasOne(Profile::class );
    }


    public function JobOffer(){

      return $this->hasMany(JobOffer::class);

    }

    public function PostLike(){
      return $this->belongsToMany(Post::class , 'postlikes_users' ,'user_id' , 'post_id');
    }

    public function JobApply(){
      return $this->belongsToMany(JobOffer::class , 'job_applies')->withPivot('status','id');

    }


    public function RequestProjects(){
      return $this->hasMany(RequestProject::class);
    }    


    public function Collections(){
      return $this->hasMany(Collection::class);
    }

    public function Educations(){
      return $this->hasMany(EducationCv::class);
    }

    public function Certificates(){
      return $this->hasMany(CertificatesCv::class);
    }

    public function Question(){
      return $this->hasMany(Question::class);
    }

    public function Answer(){
      return $this->hasMany(Answer::class);
    }


    public function WorkExperiences(){
      return $this->hasMany(WorkExperience::class);
    }


    public function Milestones(){
      return $this->hasMany(Milestone::class);
    }


    public function Business(){
      return $this->hasOne(Business::class,'user_id');
    }


    public function project(){
      return $this->hasMany(Project::class);
    }


    public function projectsWorkedOn(){

      return $this->belongsToMany(Project::class , 'project_users')->withPivot('role', 'slug' , 'unique_code')
      ->where('project_users.type','Member');
     // ->where('project_users.status' , 'approved');

    }


    public function employeeOf(){
      return $this->belongsToMany(Project::class , 'project_users')->withPivot('role', 'slug' ,'unique_code')
      ->where('project_users.type','Employee');
    //  ->where('project_users.status' , 'approved');

    }


    public function getQuestionmediaAttribute(){
        $file = $this->getMedia('questionmedia')->first();
        if ($file) {
            return $file->getFullUrl();
        }
        return null;
    }

    public function Comments(){
      return $this->hasMany(Comment::class);
    }

    public function card(){ //It is Task
        return $this->hasOne(CardCreateProject::class ,'assigned_to');
    }


    public function templates(){ // also for tasks
      return $this->hasMany(TemplateProject::class , 'user_id');
    }

    public function following() {
        return $this->belongsToMany(Project::class, 'followers', 'user_id' ,'followable_id')->withPivot('followable_type');
    }



    public function projectFollowing() {
        return $this->belongsToMany(Project::class, 'followers', 'user_id' ,'followable_id')->where('followers.followable_type' , 'App\Models\Project');
    }



    public function businessFollowing() {
        return $this->belongsToMany(User::class, 'followers', 'user_id' ,'followable_id')->where('followers.followable_type','App\Models\User');
    }


    public function blogsFollowing() {
        return $this->belongsToMany(Blog::class, 'followers', 'user_id' ,'followable_id')->where('followers.followable_type','App\Models\Blog');
    }



    public function registerMediaCollections(): void {

      $this->addMediaCollection('images')->singleFile();
      $this->addMediaCollection('thumbprofile')->singleFile();
      $this->addMediaCollection('profile_cover')->singleFile();
      $this->addMediaCollection('applyrfq')->singleFile();
      $this->addMediaCollection('commercialregister')->singleFile();
      $this->addMediaCollection('questiongallary');
      $this->addMediaCollection('job_apply_media');//->useDisk('jobapplyFiles');
    }

    public function getNameAttribute(){
        return $this->attributes['name'] ;
    }



    public function getPhotoAttribute(){

        $file = $this->getMedia('thumbprofile')->first();
        if ($file) {
            return $file->getFullUrl();
        }else{
            $bg_color = '568EB7';//sprintf( "%3x", mt_rand(0, 0xFFFFFF) );
            $url = 'https://ui-avatars.com/api/?background='.$bg_color.'&color=fff&name='.preg_replace('/\s+/', '+', $this->getNameAttribute());
            $this->addMediaFromUrl($url)->toMediaCollection('thumbprofile');
            return  $url;
        }
    
    }

    public function getModeltypeAttribute(){
        return $this->attributes['role'];
    }

    public function getProfilecoverAttribute(){
        $file = $this->getMedia('profile_cover')->first();
        if ($file) {
            return $file->getFullUrl();
        }
        return null;
    }   

    public function getApplyrfqAttribute(){
        $file = $this->getMedia('applyrfq')->first();
        if ($file) {
            return $file->getFullUrl();
        }
        return null;
    } 

    public function getCommercialregisterAttribute(){
        $file = $this->getMedia('commercialregister')->first();
        if ($file) {
            return $file->getFullUrl();
        }

        return null;
    } 

    public function BusinessField() {
      return $this->belongsToMany(BusinessField::class, 'user_business_fields', 'user_id' ,'business_field_id');
    }
    // chat relation by Eng.yousef Q    

    public function sessionMessages() {
      return $this->belongsToMany(User::class, 'session_messages', 'from_user' ,'to_user');
    }

    public function Reported(){
        return $this->belongsToMany(ReportReason::class , 'report_user' , 'user_id' , 'report_reason_id')->withPivot('item_type' , 'project_id');
    }    

    public function HiddenProjects(){
        return $this->belongsToMany(Project::class, 'hidden_modelable' , 'user_id' , 'modelable_id')->withPivot('hidden_reason_id' , 'modelable_type');
    }    


    public function HiddenBusinessProfiles(){
        return $this->belongsToMany(User::class, 'hidden_modelable' , 'user_id' , 'modelable_id')->withPivot('hidden_reason_id' , 'modelable_type');
    }


    public function rfqApply(){
        return $this->belongsToMany(RequestProject::class , 'request_project_applies' , 'user_id' , 'report_reason_id')->withPivot('status');
    }   

    public function inboxMegs(){
        return $this->hasMany(Message::class, 'to_user');
    } 


    public function outboxMegs(){
        return $this->hasMany(Message::class, 'from_user');
    } 


    public function employees(){
        return $this->belongsTo(self::class , 'manager_id');
    }


    public function SettingNotification(){
        return $this->belongsToMany(SettingNotification::class , 'user_setting_notifications' , 'user_id' , 'setting_notification_id')->withPivot('status');
    }   


    public function getQuestiongallaryAttribute(){
        $files = $this->getMedia('questiongallary');
        if ($files) {
            return $files;
        }
        return [];
    }

    public function getJobApplyMediaAttribute(){

        $files = $this->getMedia('job_apply_media');
        if ($files) {
            return $files;
        }
        return [];
    }

    public static function boot() {

        parent::boot();
        static::retrieved(function($user) { 
            if($user){ 
                if($user->SettingNotification()->count() == 0){
                    $setting_notifications = SettingNotification::where('status','Enable')->pluck('id')->toArray(); 
                    $user->SettingNotification()->sync($setting_notifications);  
                    $user->save(); 
                }
            }

        });

        

        //once created/inserted successfully this method fired, so I tested foo 

        static::created(function ($user) {
            if($user){
                if($user->SettingNotification()->count() == 0){
                    $setting_notifications = SettingNotification::where('status','Enable')->pluck('id')->toArray(); 
                    $user->SettingNotification()->sync($setting_notifications);  
                    $user->save(); 
                }
            }   

        });

    }

}







