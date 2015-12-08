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
				'key'	=> 'homepage_slider',
				'desc'	=> 'Slider utama yang ditampilkan pada halaman home website',
				'type'	=> 'file'
			],
			[
				'key'	=> 'facebook_link',
				'desc'	=> 'Alamat Facebook yang digunakan pada icon Facebook di bagian footer website',
				'type'	=> 'string'
			],
			[
				'key'	=> 'twitter_link',
				'desc'	=> 'Alamat Twitter yang digunakan pada icon Twitter di bagian footer website',
				'type'	=> 'string'
			],
			[
				'key'	=> 'contact_email',
				'desc'	=> 'Alamat email yang digunakan pada icon email di bagian footer website',
				'type'	=> 'string'
			],
			[
				'key'	=> 'footer_address',
				'desc'	=> 'Alamat yang ditampilkan pada bagian footer website',
				'type'	=> 'text'
			],
			[
				'key'	=> 'footer_copyright',
				'desc'	=> 'Tulisan copyright yang ditampilkan pada bagian footer website',
				'type'	=> 'string'
			],
			[
				'key'	=> 'admin_email',
				'desc'	=> 'Alamat email yang digunakan sebagai penerima berbagai notifikasi email dari website',
				'type'	=> 'string'
			],
			[
				'key'	=> 'gallery_min_width',
				'desc'	=> 'Ukuran lebar minimal untuk gambar pada galeri foto',
				'type'	=> 'string'
			],
			[
				'key'	=> 'gallery_min_height',
				'desc'	=> 'Ukuran tinggi minimal untuk gambar pada galeri foto',
				'type'	=> 'string'
			],
			[
				'key'	=> 'homepage_popup_status',
				'desc'	=> 'Aktif / nonaktifkan fitur popup di homepage',
				'type'	=> 'integer'
			],
			[
				'key'	=> 'homepage_popup_img',
				'desc'	=> 'Konten dari popup yang ditampilkan di homepage',
				'type'	=> 'file'
			],
			[
				'key'	=> 'homepage_popup_link',
				'desc'	=> 'Link ketika diklik pada konten popup',
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
			// ,[
			// 	'key'	=> 'twitter_autopost',
			// 	'desc'	=> 'Aktif / nonaktifkan fitur autopost ke akun Twitter @MPRgoid untuk setiap berita baru yang di ditampilkan',
			// 	'type'	=> 'integer'
			// ],
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
				'content'	=> 'img/default-banner.jpg'
			],
			[
				'sysparam_key_id'	=> '3',
				'content'	=> 'http://facebook.com/asclarindonesia'
			],
			[
				'sysparam_key_id'	=> '4',
				'content'	=> 'http://twitter.com/asclarindonesia'
			],
			[
				'sysparam_key_id'	=> '5',
				'content'	=> 'admin@asclar.com'
			],
			[
				'sysparam_key_id'	=> '6',
				'content'	=> '<h4>Asclar Indonesia</h4><p>Jl. Terogong Raya No. 2, Lantai 2<br>Jakarta Selatan 12430<br> <abbr title="Phone">Telp:</abbr> (+62) 21 5789 5063<br><abbr title="Phone">Fax:</abbr> (+62) 21 5789 5178</p>'
			],
			[
				'sysparam_key_id'	=> '7',
				'content'	=> 'Hak Cipta &copy; Asclar Indonesia 2015'
			],
			[
				'sysparam_key_id'	=> '8',
				'content'	=> 'admin@asclar.com'
			],
			[
				'sysparam_key_id'	=> '9',
				'content'	=> '600'
			],
			[
				'sysparam_key_id'	=> '10',
				'content'	=> '400'
			],
			[
				'sysparam_key_id'	=> '11',
				'content'	=> '0'
			],
			[
				'sysparam_key_id'	=> '12',
				'content'	=> '0'
			],
			[
				'sysparam_key_id'	=> '13',
				'content'	=> ''
			],
			[
				'sysparam_key_id'	=> '14',
				'content'	=> 'Asclar Indonesia'
			],
			[
				'sysparam_key_id'	=> '15',
				'content'	=> 'Asclar Indonesia Laravel CMS'
			],
			[
				'sysparam_key_id'	=> '16',
				'content'	=> 'cms, asclar, indonesia'
			],
			[
				'sysparam_key_id'	=> '17',
				'content'	=> 'Asclar Indonesia'
			],
			[
				'sysparam_key_id'	=> '18',
				'content'	=> 'img/default-pic.jpg'
			]
		);

		foreach ($array as $item) {
	      Sysparamvalue::create($item);
	   	}
	}

}