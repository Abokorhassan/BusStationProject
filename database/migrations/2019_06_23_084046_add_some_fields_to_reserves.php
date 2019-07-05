<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeFieldsToReserves extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reserves', function($table) {
            $table->string('station_name');
            $table->string('user_first');
            $table->string('user_last');
            $table->string('schedule_number');
            $table->string('rider_first');
            $table->string('rider_second');
            $table->string('rider_third');

         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reserves', function($table) {
            $table->dropColumn('station_name');
            $table->dropColumn('user_first');
            $table->dropColumn('user_last');
            $table->dropColumn('schedule_number');
            $table->dropColumn('rider_first');
            $table->dropColumn('rider_second');
            $table->dropColumn('rider_third');

        });
    }
}
