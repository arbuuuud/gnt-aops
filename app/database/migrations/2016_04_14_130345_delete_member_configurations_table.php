<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteMemberConfigurationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::drop('member_configurations');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::create('member_configurations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('member_id');
			$table->string('param_code');
			$table->string('param_value');
			$table->timestamps();
		});
	}

}
