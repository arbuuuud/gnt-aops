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
				'name' 		=> 'menu_kanan',
				'desc'		=> 'Menu khusus yang ditampilkan di bagian paling kanan atas dari website.',
				'visible'	=> '1'
			],
			[
				'name' 		=> 'footer_left',
				'desc'		=> 'Menu yang ditampilkan pada bagian footer sebelah kiri.',
				'visible'	=> '1'
			],
			[
				'name' 		=> 'footer_center',
				'desc'		=> 'Menu yang ditampilkan pada bagian footer sebelah tengah.',
				'visible'	=> '1'
			],
			[
				'name' 		=> 'footer_right',
				'desc'		=> 'Menu yang ditampilkan pada bagian footer sebelah kanan',
				'visible'	=> '1'
			]
		);

		foreach ($array as $item) {
	      Menu::create($item);
	   	}
	}

}