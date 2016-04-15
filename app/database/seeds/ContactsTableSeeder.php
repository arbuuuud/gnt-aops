<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ContactsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		for ($i = 0; $i < 10; $i++)
		{
		  Contact::create(array(
		  	'user_id'					=> 2,
		    'full_name'					=> $faker->firstName,
			'email'						=> $faker->email,
			'last_follow_up'			=> date('Y-m-d H:i:s'),
			'email_sent'				=> "",
			'active'					=> 1,
			'isAutomaticFollowUp'		=> 1,
			'phone_number'				=> $faker->phoneNumber
		  ));
		}

		for ($i = 0; $i < 10; $i++)
		{
		  Contact::create(array(
		  	'user_id'					=> 3,
		    'full_name'					=> $faker->firstName,
			'email'						=> $faker->email,
			'last_follow_up'			=> date('Y-m-d H:i:s'),
			'email_sent'				=> "",
			'active'					=> 1,
			'isAutomaticFollowUp'		=> 1,
			'phone_number'				=> $faker->phoneNumber
		  ));
		}
	}

}