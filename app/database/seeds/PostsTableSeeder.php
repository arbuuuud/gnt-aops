<?php

class PostsTableSeeder extends Seeder {

	public function run()
	{

		$faker = Faker\Factory::create();

		for ($i = 0; $i < 25; $i++)
		{
		  $user = Post::create(array(
		    'title' => $faker->sentence($nbwords = 5),
		    'slug' => $faker->slug,
		    'content' => $faker->text,
		    'excerpt' => $faker->sentence,
		    'image'	=> $faker->imageUrl($width = 640, $height = 480),
		    'post_category_id' => '1'
		  ));
		}
	}

}