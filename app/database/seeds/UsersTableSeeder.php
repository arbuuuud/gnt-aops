<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker\Factory::create();

		$user = User::create(array(
			'first_name'	=> $faker->firstName,
			'last_name'		=> $faker->lastName,
			'password'		=> Hash::make('password'),
			'email'			=> 'admin@localhost.com',
			'role_id'		=> '1'
		  ));
	}

}