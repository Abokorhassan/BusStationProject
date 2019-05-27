<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveWrongSpelledScheduleId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('queues', function($table) {
            $table->dropColumn('schedual_id');
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
        Schema::table('queues', function($table) {
            $table->integer('schedual_id');
            $table->dropColumn('schedule_id');
         });
    }
}
