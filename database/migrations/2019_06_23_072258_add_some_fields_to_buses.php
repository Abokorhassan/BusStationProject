<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeFieldsToBuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buses', function($table) {
            $table->string('station_name');
            $table->string('driver_first');
            $table->string('driver_second');
            $table->string('driver_third');
            $table->string('user_first');
            $table->string('user_last');

         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('buses', function($table) {
            $table->dropColumn('station_name');
            $table->dropColumn('driver_first');
            $table->dropColumn('driver_second');
            $table->dropColumn('driver_third');
            $table->dropColumn('user_first');
            $table->dropColumn('user_last');
        });
    }
}
