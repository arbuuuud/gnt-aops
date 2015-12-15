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
			$table->integer('member_id')->unsigned();
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
			$table->string('phone_home');
			$table->string('phone_mobile');
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
