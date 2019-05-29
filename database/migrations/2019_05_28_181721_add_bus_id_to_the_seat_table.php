<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBusIdToTheSeatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seats', function($table) {
            $table->integer('bus_id');
            $table->string('bus_number');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seats', function($table) {
            $table->dropColumn('bus_id');
            $table->dropColumn('bus_number');
        });
    }
}
