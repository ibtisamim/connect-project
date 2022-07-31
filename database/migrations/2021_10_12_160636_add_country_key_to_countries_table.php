<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCountryKeyToCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->string('country_key')->nullable();
            $table->enum('status' ,['Enable','Disable'])->default('Enable');
            $table->softDeletes();
            $table->timestamps();
            $table->index('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('countries', function (Blueprint $table) {
            $this->dropColumn('country_key');
            $this->dropColumn('status');
            $this->dropColumn('deleted_at');
            $this->dropColumn('created_at');
            $this->dropColumn('updated_at');
        });
    }
}
