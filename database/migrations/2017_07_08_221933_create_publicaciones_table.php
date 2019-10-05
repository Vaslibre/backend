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
            $table->bigIncrements('id');
			$table->string('titulo');
			$table->text('intro');
			$table->string('url');
			$table->string('postea')->nullable();
			$table->integer('fecha')->nullable();
			$table->integer('hits')->nullable();
            $table->unsignedBigInteger('user_id');
			$table->string('publicacion')->nullable();
			$table->boolean('publicado')->default(false);
			$table->timestamps();

            //relation
			$table->foreign('user_id')
				->references('id')
				->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
