<?php

class PostCategoriesTableSeeder extends Seeder {

	public function run()
	{
		$array = array(
			[
				'title' => 'Artikel',
				'slug'	=> 'uncategorized'
			]
		);

		foreach ($array as $item) {
	      Postcategory::create($item);
	   	}
	}

}