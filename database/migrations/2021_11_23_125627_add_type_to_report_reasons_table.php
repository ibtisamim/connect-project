<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToReportReasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('report_reasons', function (Blueprint $table) {
            $table->enum('type',['project' , 'rfq' , 'bussinessprofile' , 'user' , 'job'])->default('project');
            $table->enum('action',['report_all_of_category','report_owner','report_content']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('report_reasons', function (Blueprint $table) {
            $this->dropColumn('type');
            $this->dropColumn('action');
        });
    }
}
