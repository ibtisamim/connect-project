<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestProjectAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_project_applies', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('request_project_id')->unsigned()->nullable();
            $table->foreign('request_project_id')->references('id')->on('request_projects')->onDelete('cascade');            
            
            $table->enum('status' ,['accepted','rejected' ,'pendding' ,'expire'])->default('pendding');
            $table->softDeletes();
            $table->index('id');            
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
        Schema::dropIfExists('request_project_applies');
    }
}
