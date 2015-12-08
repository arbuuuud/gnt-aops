<?php

class GalleryCategoriesTableSeeder extends Seeder {

	public function run()
	{
		$array = array(
			[
				'title' 		=> 'Rapat Konsultasi',
				'slug'			=> 'rapat-konsultasi',
				'menu_order'	=> 2
			],
			[
				'title' => 'Seminar',
				'slug'	=> 'seminar',
				'menu_order'	=> 4
			],
			[
				'title' => 'Kegiatan Pimpinan',
				'slug'	=> 'kegiatan-pimpinan',
				'menu_order'	=> 3
			],
			[
				'title' => 'Sosialisasi',
				'slug'	=> 'sosialisasi',
				'menu_order'	=> 1
			],
			[
				'title' => 'Kegiatan Sekretariat',
				'slug'	=> 'kegiatan-sekretariat',
				'menu_order'	=> 5
			]
		);

		foreach ($array as $item) {
	      Gallerycategory::create($item);
	   	}
	}

}