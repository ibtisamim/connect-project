<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('testimonials', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->text('description')->nullable();
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
        Schema::table('testimonials', function (Blueprint $table) {
            $this->dropColumn('title');
            $this->dropColumn('sub_title');
            $this->dropColumn('description');
            $this->dropColumn('lang');
            $this->dropColumn('status');
            $this->dropColumn('deleted_at');
        });
    }
}
