<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomefieldsToRiderModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('riders', function($table) {
            $table->integer('station_id');
            $table->integer('bus_id');
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
            $table->dropColumn('station_id');
            $table->dropColumn('bus_id');
        });
    }
}
