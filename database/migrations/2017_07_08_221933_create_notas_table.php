<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('titulo');
			$table->text('intro');
			$table->text('texto');
			$table->string('url');
			$table->string('postea')->nullable();
			$table->integer('fecha')->nullable();
			$table->integer('hits')->nullable();
			$table->integer('user_id');
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
		Schema::drop('notas');
	}

}
