<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToEducationCvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('education_cvs', function (Blueprint $table) {
            $table->text('school');
            $table->text('grade');
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
        Schema::table('education_cvs', function (Blueprint $table) {
            $this->dropColumn('school');
            $this->dropColumn('grade');
            $this->dropColumn('description');
            $this->dropColumn('ongoing');
            $this->dropColumn('deleted_at');
        });
    }
}
