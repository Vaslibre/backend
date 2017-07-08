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
			$table->integer('id', true);
			$table->text('titulo', 65535);
			$table->text('intro', 65535);
			$table->string('url');
			$table->string('postea', 30);
			$table->integer('fecha');
			$table->integer('hits');
			$table->string('publicacion', 254);
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
