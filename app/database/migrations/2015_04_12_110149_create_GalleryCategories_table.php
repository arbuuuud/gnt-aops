<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGalleryCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gallerycategories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('slug');
			$table->integer('author_id')->unsigned();
            $table->integer('editor_id')->unsigned();
            $table->integer('status')->default(1);
            $table->integer('menu_order')->default(0);
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
		Schema::drop('gallerycategories');
	}

}
