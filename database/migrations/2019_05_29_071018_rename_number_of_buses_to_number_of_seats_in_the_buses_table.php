<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameNumberOfBusesToNumberOfSeatsInTheBusesTable extends Migration
{
    public function up()
    {
        Schema::table('buses', function(Blueprint $table) {
            $table->renameColumn('number_buses', 'number_seats');
        });
    }


    public function down()
    {
        Schema::table('buses', function(Blueprint $table) {
            $table->renameColumn('number_seats', 'number_buses');
        });
    }
}
