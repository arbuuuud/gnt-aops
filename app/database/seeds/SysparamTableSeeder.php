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
			],
			[
				'key'	=> 'conf_follow_up_date',
				'desc'	=> 'Durasi Follow-up email untuk kontak',
				'type'	=> 'string'
			],
			[
				'key'	=> 'web_replika',
				'desc'	=> 'microsite for user access in website format: (<url aops>/<username>)',
				'type'	=> 'string'
			]
		);

		foreach ($array as $item) {
	      Sysparam::create($item);
	   	}

	   	$array = array(
			[
				'sysparam_key_id'	=> '1',
				'content'	=> 'img/logo_white.png'
			],
			[
				'sysparam_key_id'	=> '2',
				'content'	=> 'admin@localhost.com'
			],
			[
				'sysparam_key_id'	=> '3',
				'content'	=> 'GNT Club'
			],
			[
				'sysparam_key_id'	=> '4',
				'content'	=> 'GNT Club System'
			],
			[
				'sysparam_key_id'	=> '5',
				'content'	=> 'gnt'
			],
			[
				'sysparam_key_id'	=> '6',
				'content'	=> 'PT. Guna Natur Tulen'
			],
			[
				'sysparam_key_id'	=> '7',
				'content'	=> 'img/default-pic.jpg'
			],
			[
				'sysparam_key_id'	=> '8',
				'content'	=> 'http://localhost/aops-client/login.php'
			],
			[
				'sysparam_key_id'	=> '9',
				'content'	=> '3'
			],
			[
				'sysparam_key_id'	=> '10',
				'content'	=> 'http://localhost/gnt-aops/public/@'
			]
		);

		foreach ($array as $item) {
	      Sysparamvalue::create($item);
	   	}
	}

}