<?php



use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;



class AddFieldsToUserSettingNotificationsTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::table('user_setting_notifications', function (Blueprint $table) {

            $table->enum('status' ,['Enable','Disable'])->default('Enable');

        });

    }



    /**

     * Reverse the migrations.

     *

     * @return void

     */

    public function down()

    {

        Schema::table('user_setting_notifications', function (Blueprint $table) {
           $this->dropColumn('status');
        });

    }

}

