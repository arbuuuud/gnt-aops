<?php

class MenuItemsTableSeeder extends Seeder {

	public function run()
	{
		$array = array(
			[
				'name' 		=> 'Peluang',
				'link'		=> 'peluang',
				'order'		=> '0',
				'menu_id'	=> '1',
				'visible'	=> '1'
			],
			[
				'name' 		=> 'Artikel',
				'link'		=> 'kategori/uncategorized',
				'order'		=> '1',
				'menu_id'	=> '1',
				'visible'	=> '1'
			],
			[
				'name' 		=> 'Terms & Conditions',
				'link'		=> 'pages/terms-conditions',
				'order'		=> '0',
				'menu_id'	=> '2',
				'visible'	=> '1'
			],
			[
				'name' 		=> 'Privacy Policy',
				'link'		=> 'pages/privacy-policy',
				'order'		=> '1',
				'menu_id'	=> '2',
				'visible'	=> '1'
			],
			[
				'name' 		=> 'Disclaimer',
				'link'		=> 'pages/disclaimer',
				'order'		=> '2',
				'menu_id'	=> '2',
				'visible'	=> '1'
			]
		);

		foreach ($array as $item) {
	      MenuItem::create($item);
	   	}
	   	
	}

}