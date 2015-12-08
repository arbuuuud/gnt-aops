	<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVideosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('videos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('slug');
            $table->text('content')->nullable();
            $table->string('excerpt')->nullable();
            $table->string('image')->nullable();
            $table->string('file');
            $table->integer('video_category_id')->unsigned();
            $table->integer('author_id')->unsigned();
            $table->integer('editor_id')->unsigned();
            $table->integer('status')->default(1);
            $table->integer('comment_status')->default(1);
            $table->integer('social_status')->default(1);
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
		Schema::drop('videos');
	}

}
