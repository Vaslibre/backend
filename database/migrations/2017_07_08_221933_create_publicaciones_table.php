<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePublicacionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('publicaciones', function(Blueprint $table)
		{
			$table->integer('id');
			$table->string('titulo');
			$table->text('intro');
			$table->string('url');
			$table->string('postea');
			$table->integer('fecha');
			$table->integer('hits');
			$table->string('publicacion');
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
		Schema::drop('publicaciones');
	}

}
