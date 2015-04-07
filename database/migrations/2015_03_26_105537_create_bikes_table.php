<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBikesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        /**
         * The bike_station_id references table bike_stations on their id field
         *
         */
        Schema::create('bikes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('bike_station_id');
            $table->string('type');
            $table->string('vendor');
            $table->text('features');
            $table->integer('model');
            $table->timestamps();

            $table->foreign('bike_station_id')->references('id')->on('bike_stations');
        });

        Schema::create('bike_user', function(Blueprint $table)
        {
           $table->integer('bike_id')->unsigned()->index();
           $table->foreign('bike_id')->references('id')->on('bikes')->onDelete('cascade');

           $table->integer('user_id')->unsigned()->index();
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
		Schema::drop('bikes');
        Schema::drop('bike_user');
	}

}
