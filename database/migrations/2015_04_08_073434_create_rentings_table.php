<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentingsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentings', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('bike_station_id');
            $table->integer('bike_id');
            $table->integer('card_id')->nullable();
            $table->timestamps();

            $table->foreign('bike_station_id')->references('id')->on('bike_stations');
            $table->foreign('bike_id')->references('id')->on('bike');
            $table->foreign('card_id')->references('card_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rentings');
    }

}