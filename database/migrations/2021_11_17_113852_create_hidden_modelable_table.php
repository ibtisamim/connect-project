<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHiddenModelableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hidden_modelable', function (Blueprint $table) {
            $table->id();
            $table->morphs('modelable');
            $table->bigInteger('hidden_reason_id')->unsigned()->nullable();
            $table->foreign('hidden_reason_id')->references('id')->on('hidden_reasons')->onDelete('cascade');
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
        Schema::dropIfExists('hidden_modelable');
    }
}
