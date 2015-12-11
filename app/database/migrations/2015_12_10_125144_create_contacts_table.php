<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email');
			$table->datetime('last_follow_up');
			$table->string('email_sent');
			$table->integer('active');
			$table->integer('isAutomaticFollowUp');
			$table->string('address');
			$table->string('state');
			$table->string('city');
			$table->integer('phone_home');
			$table->integer('phone_mobile');
			$table->string('province');
			$table->string('gender');
			$table->string('description');
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
		Schema::drop('contacts');
	}

}
