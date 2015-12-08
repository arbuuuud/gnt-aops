<?php

class PostCategoriesTableSeeder extends Seeder {

	public function run()
	{
		$array = array(
			[
				'title' => 'Uncategorized',
				'slug'	=> 'uncategorized'
			]
		);

		foreach ($array as $item) {
	      Postcategory::create($item);
	   	}
	}

}