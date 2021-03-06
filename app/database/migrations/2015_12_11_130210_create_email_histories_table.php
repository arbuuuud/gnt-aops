<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmailHistoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('email_histories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('template_id')->unsigned();
			$table->integer('member_id');
			$table->string('status');
			$table->integer('contact_id')->unsigned();
			$table->datetime('date_sent');
			$table->integer('is_automatic');
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
		Schema::drop('email_histories');
	}

}
