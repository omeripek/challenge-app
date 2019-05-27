<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
	        PermissionTableSeeder::class,
	        RolesTableSeeder::class,
	        UsersTableSeeder::class,
  		]);
    }
}
