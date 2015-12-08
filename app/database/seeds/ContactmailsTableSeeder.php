<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ContactmailsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			$mail = Contactmail::create(array(
		    'name' => $faker->name,
		    'phone' => $faker->phoneNumber,
		    'email'	=> $faker->email,
		    'content' => $faker->text,
		  ));
		}
	}

}