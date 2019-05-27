<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('create','edit', 'delete', 'manage', 'challenge');
 
        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo('challenge');
    }
}
