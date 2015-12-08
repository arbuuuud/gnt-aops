<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PhotosTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 500) as $index)
		{
			Photo::create(array(
			    'title' => $faker->sentence($nbwords = 5),
			    'image' => $faker->imageUrl($width = 640, $height = 480),
			    'gallery_id' => $faker->numberBetween(1,50)
			  ));
		}
	}

}