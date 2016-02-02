<?php

class MenusTableSeeder extends Seeder {

	public function run()
	{
		$array = array(
			[
				'name' 		=> 'menu_utama',
				'desc'		=> 'Menu utama yang ditampilkan di atas halaman website.',
				'visible'	=> '1'
			],
			[
				'name' 		=> 'footer_center',
				'desc'		=> 'Menu yang ditampilkan pada bagian footer sebelah tengah.',
				'visible'	=> '1'
			]
		);

		foreach ($array as $item) {
	      Menu::create($item);
	   	}
	}

}