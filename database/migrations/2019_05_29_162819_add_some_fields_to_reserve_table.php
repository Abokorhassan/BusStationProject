<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeFieldsToReserveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reserves', function($table) {
            $table->string('reserve_number');

            $table->integer('queue_id');
            $table->string('bus_number');

            $table->integer('schedule_id');

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
            $table->dropColumn('reserve_number');
            $table->dropColumn('queue_id');
            $table->dropColumn('bus_number');
            $table->dropColumn('schedule_id');
        });
    }
}
