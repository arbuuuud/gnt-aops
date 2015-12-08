<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MemberPostsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 500) as $index)
		{
			MemberPost::create([
				'member_id'	=> $faker->numberBetween(1,5),
				'post_id'	=> $faker->numberBetween(1,125)
			]);
		}
	}

}