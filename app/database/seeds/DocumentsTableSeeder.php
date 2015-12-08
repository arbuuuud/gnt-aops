<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class DocumentsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$array = array(
			[
				'path' => 'uploads/documents/dummy.pdf',
				'documentable_id'	=> '1',
				'documentable_type' => 'page'
	      	],
	      	[
				'path' => 'uploads/documents/dummy.pdf',
				'documentable_id'	=> '1',
				'documentable_type' => 'page'
			]
		);

		foreach ($array as $item) {
	      	Document::create($item);
	   	}
	}

}