<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class VideocategoriesTableSeeder extends Seeder {

	public function run()
	{
		$array = array(
			[
				'title' => 'Sidang',
				'slug'	=> 'sidang'
			],
			[
				'title' => 'Peringatan Hari Besar',
				'slug'	=> 'peringatan-hari-besar'
			],
			[
				'title' => 'Seminar',
				'slug'	=> 'seminar'
			],
			[
				'title' => 'Sambutan',
				'slug'	=> 'sambutan'
			],
			[
				'title' => 'Konferensi Pers',
				'slug'	=> 'konferensi-pers'
			],
			[
				'title' => 'LCC 4 Pilar',
				'slug'	=> 'lcc-4-pilar'
			],
			[
				'title' => 'Kegiatan Pimpinan',
				'slug'	=> 'kegiatan-pimpinan'
			],
			[
				'title' => 'Sosialisasi',
				'slug'	=> 'sosialisasi'
			]
		);

		foreach ($array as $item) {
	      Videocategory::create($item);
	   	}
	}

}