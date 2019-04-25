<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusstopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('busstops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bstop_num')->unique();
            $table->string('name');
            $table->decimal('lat',10,7);
            $table->decimal('long',10,7);
            $table->integer('user_id');
            $table->integer('route_id');
            $table->integer('station_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('busstops');
    }
}
