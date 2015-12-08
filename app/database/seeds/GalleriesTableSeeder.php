<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GalleriesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		for ($i = 0; $i < 50; $i++)
		{
		  Gallery::create(array(
		    'title' => $faker->sentence($nbwords = 5),
		    'slug' => $faker->slug,
		    'content' => $faker->text,
		    'excerpt' => $faker->sentence,
		    'gallery_category_id' => $faker->numberBetween(1,5)
		  ));
		}
	}

}