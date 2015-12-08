<?php

class MembersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker\Factory::create();

		// 
		for ($i = 0; $i < 50; $i++)
		{
		  $user = Member::create(array(
		    'first_name'				=> $faker->firstName,
			'last_name'					=> $faker->lastName,
			'slug'						=> $faker->slug,
			'image'						=> $faker->imageUrl($width = 125, $height = 150),
			'pob'						=> $faker->city,
			'dob'						=> $faker->date('Y-m-d','now'),
			'gender'					=> $faker->numberBetween(1,2),
			'email'						=> $faker->email,
			'address'					=> $faker->address,
			'city'						=> $faker->city,
			'province'					=> $faker->state,
			'phone_home'				=> $faker->phoneNumber,
			'phone_mobile'				=> $faker->phoneNumber,
		  ));
		}

	}

}