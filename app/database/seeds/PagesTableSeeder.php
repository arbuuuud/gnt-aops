<?php

class PagesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker\Factory::create();

		for ($i = 0; $i < 15; $i++)
		{
			Page::create(array(
			    'title'		=> ucwords($faker->sentence($nbWords = 6)),
				'slug'		=> $faker->slug,
				'content'	=> $faker->paragraph($nbSentences = 3),
			));
		}
	}
}