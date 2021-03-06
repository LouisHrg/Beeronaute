<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bars', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->text('location', 65535)->nullable();
			$table->string('phone', 191)->nullable();
			$table->string('email', 191)->nullable();
			$table->timestamps();
			$table->integer('manager')->unsigned()->index('bars_manager_foreign');
			$table->string('slug', 267)->unique();
			$table->text('description', 65535);
			$table->integer('place')->unsigned()->index('bars_place_foreign');
			$table->string('schedule', 191);
			$table->boolean('status');
			$table->integer('mood')->unsigned()->index('bars_mood_foreign');
			$table->integer('price');
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bars');
	}

}
