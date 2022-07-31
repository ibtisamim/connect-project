<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;

use Illuminate\Database\Eloquent\SoftDeletes;



class SettingNotification extends Model

{

    use HasFactory , SoftDeletes ; //, HasTranslations;



  //  public $translatable = ['title'];

    protected $table = "setting_notifications";

    protected $fillable = [

        'title',

        'status',

        'model_type',

        'alert_type',

        'alert_notification',

        'direct_messages'

    ];



    protected $hidden = [

        'created_at' , 'updated_at' , 'deleted_at'

    ];



    public function User(){

        return $this->belongsToMany(User::class , 'user_setting_notifications', 'setting_notification_id' , 'user_id' )->withPivot('status','model_type','alert_type');

    } 

}

