<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schedules', function($table) {
            $table->string('schedule_number')->unique();
            $table->integer('station_id');
            $table->integer('user_id');
            $table->integer('route_id')->nullable();
            $table->integer('schedual_id')->nullable();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedules', function($table) {
            $table->dropColumn('schedule_number');
            $table->dropColumn('station_id');
            $table->dropColumn('user_id');
            $table->dropColumn('route_id');
            $table->dropColumn('schedual_id');
        });
    }
}
