<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPosttofeedToRequestProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request_projects', function (Blueprint $table) {
            $table->boolean('post_to_feed')->default(false);
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
        Schema::table('request_projects', function (Blueprint $table) {
            $this->dropColumn('post_to_feed');
            $this->dropColumn('deleted_at');
        });
    }
}
