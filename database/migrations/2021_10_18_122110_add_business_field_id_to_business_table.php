<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBusinessFieldIdToBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('businesses', function (Blueprint $table) {
            $table->bigInteger('business_field_id')->unsigned()->nullable();
            $table->foreign('business_field_id')->references('id')->on('business_fields')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('businesses', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            $this->dropColumn('business_field_id');
            Schema::enableForeignKeyConstraints();
        });
    }
}
