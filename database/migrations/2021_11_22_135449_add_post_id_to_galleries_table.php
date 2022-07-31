<?php



use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;







class AddPostIdToGalleriesTable extends Migration

{





    /**

     * Run the migrations.

     *

     * @return void

     */





    public function up(){

        Schema::table('galleries', function (Blueprint $table) {

            $table->bigInteger('post_id')->unsigned()->nullable();

            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

        });







    }















    /**







     * Reverse the migrations.



     * @return void

     */

    public function down(){







        Schema::table('galleries', function (Blueprint $table) {


            Schema::disableForeignKeyConstraints();
            $this->dropColumn('post_id');
            Schema::enableForeignKeyConstraints();






        });







    }







}







