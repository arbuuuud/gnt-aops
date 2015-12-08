<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MemberGalleriesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 500) as $index)
		{
			MemberGallery::create([
				'member_id'		=> $faker->numberBetween(1,5),
				'gallery_id'	=> $faker->numberBetween(1,50)
			]);
		}
	}

}