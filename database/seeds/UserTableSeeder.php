<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $role_admin = Role::where('name', 'admin')->first();

	    $admin = new User();
	    $admin->name = 'Administrator';
	    $admin->email = 'admin@example.com';
	    $admin->password = Hash::make('secret');
	    $admin->save();
	    $admin->roles()->attach($role_admin);
    }
}
