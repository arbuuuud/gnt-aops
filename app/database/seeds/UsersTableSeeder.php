<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$user = User::create(array(
			'first_name'	=> 'admin',
			'last_name'		=> '',
			'password'		=> Hash::make('password'),
			'email'			=> 'admin@localhost.com',
			'role_id'		=> '1'
		  ));
	}

}