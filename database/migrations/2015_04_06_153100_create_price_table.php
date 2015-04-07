<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Price', function(Blueprint $table)
		{

            $table->double('price');
            $table->integer('bike_id');
			$table->timestamps();

            $table->foreign('bike_id')->references('id')->on('bikes');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Price');
	}

}
