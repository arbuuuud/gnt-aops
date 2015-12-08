<?php

class MenuItemsTableSeeder extends Seeder {

	public function run()
	{
		$array = array(
			[
				'name' 		=> 'Beranda',
				'link'		=> '/',
				'order'		=> '0',
				'menu_id'	=> '1',
				'visible'	=> '1'
			]
		);

		foreach ($array as $item) {
	      MenuItem::create($item);
	   	}
	   	
	}

}