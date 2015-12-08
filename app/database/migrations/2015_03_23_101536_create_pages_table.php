<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('parent_id')->nullable();
			$table->string('title');
			$table->string('slug');
			$table->text('content')->nullable();
			$table->string('template')->default('default');
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
		Schema::drop('pages');
	}

}
