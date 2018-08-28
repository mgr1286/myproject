<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Settings.
 *
 * @author  The scaffold-interface created at 2018-08-28 01:50:00pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Settings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('settings',function (Blueprint $table){

        $table->increments('id');

        $table->String('meta_slug');

        $table->String('meta_value');

        $table->integer('added_by');

        $table->integer('updated_by');

        $table->boolean('status');

        /**
         * Foreignkeys section
         */


        $table->timestamps();


        $table->softDeletes();

        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('settings');
    }
}
