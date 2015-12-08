<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class VideosTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 100) as $index)
		{
			Video::create(array(
			    'title' => $faker->sentence($nbwords = 5),
			    'slug' => $faker->slug,
			    'content' => $faker->text,
			    'excerpt' => $faker->sentence,
			    'image' => $faker->imageUrl($width = 640, $height = 480),
			    'file'	=> 'uploads/videos/1.mp4',
			    'video_category_id' => $faker->numberBetween(1,8)
			  ));
		}
	}

}