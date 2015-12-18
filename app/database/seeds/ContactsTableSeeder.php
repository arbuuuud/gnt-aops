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
		    'first_name'				=> $faker->firstName,
			'last_name'					=> $faker->lastName,
			'email'						=> $faker->email,
			'last_follow_up'			=> date('Y-m-d H:i:s'),
			'email_sent'				=> $faker->imageUrl($width = 125, $height = 150),
			'active'					=> 1,
			'isAutomaticFollowUp'		=> 1,
			'address'					=> $faker->address,
			'state'						=> $faker->state,
			'city'						=> $faker->city,
			'phone_home'				=> $faker->phoneNumber,
			'phone_mobile'				=> $faker->phoneNumber,
			'province'					=> $faker->state,
			'gender'					=> $faker->numberBetween(1,2),
		  ));
		}
	}

}