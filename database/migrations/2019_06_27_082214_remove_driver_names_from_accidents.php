<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveDriverNamesFromAccidents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accidents', function($table) {
            $table->dropColumn('driver_first');
            $table->dropColumn('driver_second');
            $table->dropColumn('driver_third');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accidents', function($table) {
            $table->string('driver_first');
            $table->string('driver_second');
            $table->string('driver_third');

         });
    }
}
