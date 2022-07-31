<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('followers', function (Blueprint $table) {

            $table->bigInteger('collection_id')->unsigned()->nullable();
            $table->foreign('collection_id')->references('id')->on('collections')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('followers', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            $this->dropColumn('collection_id');
            Schema::enableForeignKeyConstraints();
        });
    }
}
