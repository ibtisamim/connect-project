<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('link')->nullable();
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
        Schema::table('videos', function (Blueprint $table) {
            $this->dropColumn('title');
            $this->dropColumn('description');
            $this->dropColumn('link');
            $this->dropColumn('lang');
            $this->dropColumn('status');
            $this->dropColumn('deleted_at');
        });
    }
}
