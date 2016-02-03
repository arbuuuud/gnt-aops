<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SysparamTableSeeder extends Seeder {

	public function run()
	{
		$array = array(
			[
				'key'	=> 'main_logo',
				'desc'	=> 'Logo utama dari website',
				'type'	=> 'file'
			],
			[
				'key'	=> 'admin_email',
				'desc'	=> 'Alamat email yang digunakan sebagai penerima berbagai notifikasi email dari website',
				'type'	=> 'string'
			],
			[
				'key'	=> 'web_title',
				'desc'	=> 'Judul utama dari website',
				'type'	=> 'string'
			],
			[
				'key'	=> 'web_meta_description',
				'desc'	=> 'Deskripsi meta dari website',
				'type'	=> 'string'
			],
			[
				'key'	=> 'web_meta_keywords',
				'desc'	=> 'Keyword meta dari website',
				'type'	=> 'string'
			],
			[
				'key'	=> 'web_meta_author',
				'desc'	=> 'Author meta dari website',
				'type'	=> 'string'
			],
			[
				'key'	=> 'post_default_pic',
				'desc'	=> 'Default gambar yang ditampilkan untuk post yang tidak memiliki gambar',
				'type'	=> 'file'
			],
			[
				'key'	=> 'master_web_dashboard',
				'desc'	=> 'Default Link Master GNT Dashboard (GNT CLUB)',
				'type'	=> 'string'
			]
		);

		foreach ($array as $item) {
	      Sysparam::create($item);
	   	}

	   	$array = array(
			[
				'sysparam_key_id'	=> '1',
				'content'	=> 'img/default-logo.png'
			],
			[
				'sysparam_key_id'	=> '2',
				'content'	=> 'admin@localhost.com'
			],
			[
				'sysparam_key_id'	=> '3',
				'content'	=> 'Company Name'
			],
			[
				'sysparam_key_id'	=> '4',
				'content'	=> 'Laravel CMS'
			],
			[
				'sysparam_key_id'	=> '5',
				'content'	=> 'cms'
			],
			[
				'sysparam_key_id'	=> '6',
				'content'	=> 'Company Name'
			],
			[
				'sysparam_key_id'	=> '7',
				'content'	=> 'img/default-pic.jpg'
			],
			[
				'sysparam_key_id'	=> '8',
				'content'	=> 'http://localhost/aops-client/login.php'
			]
		);

		foreach ($array as $item) {
	      Sysparamvalue::create($item);
	   	}
	}

}