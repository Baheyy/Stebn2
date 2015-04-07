<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBikeStationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('bike_stations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('BatchSize');
            $table->string('location');
            $table->integer('maxCapacity');
            $table->boolean('functional');
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
		Schema::drop('bike_stations');
	}

}
