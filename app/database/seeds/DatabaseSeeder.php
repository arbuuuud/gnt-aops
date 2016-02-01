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

		$this->call('MenusTableSeeder');
		$this->call('MenuItemsTableSeeder');
		$this->call('ContactsTableSeeder');
		$this->call('EmailTemplatesTableSeeder');

	}

}
