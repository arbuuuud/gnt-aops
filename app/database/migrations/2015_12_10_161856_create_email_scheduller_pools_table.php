<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmailSchedullerPoolsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('email_scheduller_pools', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('member_id');
			$table->integer('contact_id');
			$table->integer('template_id');
			$table->datetime('execution_date');
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
		Schema::drop('email_scheduller_pools');
	}

}
