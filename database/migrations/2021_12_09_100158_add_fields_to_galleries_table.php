<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->bigInteger('job_offer_id')->unsigned()->nullable();
            $table->foreign('job_offer_id')->references('id')->on('job_offers')->onDelete('cascade');

            $table->integer('request_project_id')->unsigned()->nullable();
            $table->foreign('request_project_id')->references('id')->on('request_projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('galleries', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            $this->dropColumn('job_offer_id');
            $this->dropColumn('request_project_id');
            Schema::enableForeignKeyConstraints();
        });
    }
}
