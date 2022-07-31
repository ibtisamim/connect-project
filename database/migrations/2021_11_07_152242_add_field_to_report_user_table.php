<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToReportUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('report_user', function (Blueprint $table) {
            $table->string('item_type')->nullable();
            $table->integer('project_id')->unsigned()->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('report_user', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            $this->dropColumn('item_type');
            $this->dropColumn('project_id');
            Schema::enableForeignKeyConstraints();
        });
    }
}
