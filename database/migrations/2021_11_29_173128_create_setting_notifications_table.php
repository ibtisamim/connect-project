<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_notifications', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->enum('status' ,['Enable','Disable'])->default('Enable');
            $table->enum('model_type' ,['App\Models\Comment','App\Models\Project','App\Models\Blog','App\Models\Message' , 'App\Models\Task' , 'App\Models\Testimonial' , 'App\Models\User'])->default('App\Models\Comment');
            $table->enum('alert_type' ,['alert_notification' ,'direct_messages' ,'both'])->default('alert_notification');
            $table->boolean('alert_notification')->default('1');
            $table->boolean('direct_messages')->default('1');
            $table->index('id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting_notifications');
    }
}
