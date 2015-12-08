<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GuestmailsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		for ($i = 0; $i < 25; $i++)
		{
		  $mail = Guestmail::create(array(
		    'name' => $faker->name,
		    'address' => $faker->address,
		    'city' => $faker->city,
		    'phone' => $faker->phoneNumber,
		    'email'	=> $faker->email,
		    'title' => $faker->sentence($nbwords = 5),
		    'content' => $faker->text,
		    'status' => 1
		  ));
		}
	}

}