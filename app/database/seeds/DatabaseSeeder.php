<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// Struktur yang harus ada
		$this->call('SysparamTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('RolesTableSeeder');
		
		$this->call('MembersTableSeeder');
		$this->call('PostCategoriesTableSeeder');
		$this->call('PostsTableSeeder');
		$this->call('PagesTableSeeder');

		$this->call('GalleryCategoriesTableSeeder');
		$this->call('VideocategoriesTableSeeder');

		$this->call('MenusTableSeeder');
		$this->call('MenuItemsTableSeeder');

		// Dummy database yang optional
		// $this->call('GalleriesTableSeeder');
		// $this->call('PhotosTableSeeder');
		// $this->call('MemberPostsTableSeeder');
		// $this->call('MemberGalleriesTableSeeder');
		// $this->call('QuotesTableSeeder');
		// $this->call('MagazinesTableSeeder');
		// $this->call('GuestmailsTableSeeder');
		// $this->call('ContactmailsTableSeeder');
		// $this->call('VideosTableSeeder');
		// $this->call('DocumentsTableSeeder');
	}

}
