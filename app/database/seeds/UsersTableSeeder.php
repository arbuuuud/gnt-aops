<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$user = User::create(array(
			'username'	=> 'admin',
			'name'		=> 'AOPS admin',
			'password'		=> Hash::make('password'),
			'role_id'		=> '1'
		  ));

		$user = User::create(array(
			'username' => 'natalius',
			'name' => 'Natalius Sen',
			'password' => Hash::make('password'),
			'welcome_message' => '<p>Saya bersama komunitas GNT Club membuka kesempatan ini hanya dengan 1 alasan utama, yaitu kami ingin membantu Anda yang sungguh-sungguh ingin meraih impian.</p>
<p>Kami sudah bertemu dengan kendaraan yang TEPAT, dan kami sangat yakin bahwa Anda juga akan mencapai impian Anda jika memiliki kendaraan ini.</p>
<p>Saya sangat bersemangat dengan program GNT Club ini, karena Anda akan bisa menikmati dollar pertama Anda dalam bulan ini juga.

</p>
<p>Setulusnya, saya bersama-sama dengan coach Komunitas GNT Club berharap Anda segera take action sekarang, sebagai hadiah terindah yang bisa Anda berikan untuk masa depan orang-orang yang Anda cintai

</p>
<p>Salam Sukses</p>',
			'welcome_photo' => '/uploads/anggota/2.png',
			'welcome_phone_number' => '081298765432',
			'role_id' => '2'
		  ));
	}

}