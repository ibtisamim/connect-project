<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applies', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->bigInteger('job_offer_id')->unsigned()->nullable();
            $table->foreign('job_offer_id')->references('id')->on('job_offers')->onDelete('cascade');
            
            $table->enum('status', ['approved', 'pending' ,'reject' , 'cancelled'])->default('pending');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('job_applies');
        Schema::enableForeignKeyConstraints();
    }
}
