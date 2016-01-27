<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class EmailTemplatesTableSeeder extends Seeder {

	public function run()
	{
		$array = array(
			[
				'html_body' => 'followup1',
				'subject'	=> 'Manfaat Buah Mengkudu Bagi Kesehatan',
				'sequence'	=> 1
			],
			[
				'html_body' => 'followup2',
				'subject'	=> 'Buah Lokal Indonesia Banyak Manfaatnya lhooch…!',
				'sequence'	=> 2
			],
			[
				'html_body' => 'followup3',
				'subject'	=> 'Cara Mengatasi Bau Kaki',
				'sequence'	=> 3
			],
			[
				'html_body' => 'followup4',
				'subject'	=> 'Kandungan gizi ikan lele',
				'sequence'	=> 4
			],
			[
				'html_body' => 'followup5',
				'subject'	=> 'Cara menghilangkan Bulu ketiak',
				'sequence'	=> 5
			],
			[
				'html_body' => 'followup6',
				'subject'	=> '9 Makanan Paling Buruk Di Dunia',
				'sequence'	=> 6
			],
			[
				'html_body' => 'followup7',
				'subject'	=> 'Kentut itu sehat',
				'sequence'	=> 7
			],
			[
				'html_body' => 'followup8',
				'subject'	=> 'Cara Alami Menghilangkan Kapalan',
				'sequence'	=> 8
			]
		);

		foreach ($array as $item) {
	      EmailTemplate::create($item);
	   	}
	}

}