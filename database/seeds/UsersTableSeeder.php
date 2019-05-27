<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        User::truncate();

        $admin = User::create([
           'name'    => 'Ömer Test',
           'email'  =>  'test@test.com',
           'password' => '123456'
        ]);
 

        for ($i=0; $i<20; $i++){
            $user = User::create([
                'name'    => $faker->name,
                'email'  =>  $faker->unique()->safeEmail,
                'password'  =>  '12345'
            ]);
            $user->assignRole('user');
        }

        $admin->assignRole('admin');

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
