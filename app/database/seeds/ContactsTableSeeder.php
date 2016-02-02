<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ContactsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		for ($i = 0; $i < 50; $i++)
		{
		  Contact::create(array(
		  	'member_id'					=> 1,
		    'full_name'					=> $faker->firstName,
			'email'						=> $faker->email,
			'last_follow_up'			=> date('Y-m-d H:i:s'),
			'email_sent'				=> $faker->imageUrl($width = 125, $height = 150),
			'active'					=> 1,
			'isAutomaticFollowUp'		=> 1,
			'phone_number'				=> $faker->phoneNumber
		  ));
		}
	}

}