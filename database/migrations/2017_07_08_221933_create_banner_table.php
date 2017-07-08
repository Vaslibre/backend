<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBannerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banner', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('titulo', 30)->default('');
			$table->string('url_site', 60)->default('');
			$table->string('url_banner', 100)->default('');
			$table->integer('mostrado')->default(0);
			$table->integer('click')->default(0);
			$table->string('fecha', 10)->default('');
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
		Schema::drop('banner');
	}

}
