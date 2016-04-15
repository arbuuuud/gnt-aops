<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::drop('members');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::create('members', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('parent_id')->unsigned();
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email');
			$table->integer('active')->default(1);
			$table->string('address');
			$table->string('city');
			$table->string('phone_home');
			$table->string('phone_mobile');
			$table->string('province');
			$table->string('gender');
			$table->string('slug');
			$table->string('image')->nullable();
			$table->string('pob');
			$table->string('dob');
			$table->timestamps();
		});
	}

}
