<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToWorkExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('work_experiences', function (Blueprint $table) {
            $table->text('title');
            $table->enum('employee_type', ['full_time', 'part_time' ,'remotly'])->default('full_time');
            $table->text('location');
            $table->text('industry');
            $table->text('description');
            $table->boolean('ongoing')->default(false);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('work_experiences', function (Blueprint $table) {
            $this->dropColumn('title');
            $this->dropColumn('employee_type');
            $this->dropColumn('ongoing');
            $this->dropColumn('location');
            $this->dropColumn('industry');
            $this->dropColumn('description');
            $this->dropColumn('deleted_at');
            
        });
    }
}
