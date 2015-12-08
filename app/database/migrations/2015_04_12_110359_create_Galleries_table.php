<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGalleriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('galleries', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('slug');
            $table->text('content')->nullable();
            $table->string('excerpt')->nullable();
            $table->integer('gallery_category_id')->unsigned();
            $table->integer('author_id')->unsigned();
            $table->integer('editor_id')->unsigned();
            $table->integer('status')->default(1);
            $table->integer('comment_status')->default(1);
            $table->integer('social_status')->default(1);
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
		Schema::drop('galleries');
	}

}
