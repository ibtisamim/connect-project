<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToHiddenReasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hidden_reasons', function (Blueprint $table) {
            $table->enum('type',['project' , 'rfq' , 'bussinessprofile' , 'user' , 'job'])->default('project');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hidden_reasons', function (Blueprint $table) {
           $this->dropColumn('type');
        });
    }
}
