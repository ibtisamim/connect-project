<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('supports', function (Blueprint $table) {
            $table->text('question')->nullable();
            $table->text('answer')->nullable();
            $table->enum('lang' ,['en','ar'])->default('en');
            $table->enum('status' ,['Enable','Disable'])->default('Enable');
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
        Schema::table('supports', function (Blueprint $table) {
            $this->dropColumn('question');
            $this->dropColumn('answer');
            $this->dropColumn('lang');
            $this->dropColumn('status');
            $this->dropColumn('deleted_at');
        });
    }
}
