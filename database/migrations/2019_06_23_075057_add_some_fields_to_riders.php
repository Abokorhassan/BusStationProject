<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeFieldsToRiders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('riders', function($table) {
            $table->string('station_name');
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
        Schema::table('riders', function($table) {
            $table->dropColumn('station_name');
            $table->dropColumn('user_first');
            $table->dropColumn('user_last');
        });
    }
}
