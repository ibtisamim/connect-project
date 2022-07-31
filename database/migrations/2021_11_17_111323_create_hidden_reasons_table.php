<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHiddenReasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hidden_reasons', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->enum('action',['hidden_all_of_category','hidden_related_projects','hidden_all_of_owner']);
            $table->enum('status' ,['Enable','Disable'])->default('Enable');
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
        Schema::dropIfExists('hidden_reasons');
    }
}
