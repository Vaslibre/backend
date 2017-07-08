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
			$table->integer('id', true);
			$table->text('titulo', 65535);
			$table->text('intro', 65535);
			$table->text('texto');
			$table->string('url');
			$table->string('postea', 30);
			$table->integer('fecha');
			$table->integer('hits');
			$table->timestamps();
			$table->index(['titulo','intro','texto'], 'titulo');
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
