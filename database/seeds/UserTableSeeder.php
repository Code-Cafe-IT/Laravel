<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('12345678');
        $user->save();
        $user->roles()->attach(Role::where('name', 'user')->first());
 
        $admin = new User;
        $admin->name = 'MinhDuc';
        $admin->email = 'minhduc@gmail.com';
        $admin->password = bcrypt('12345678');
        $admin->save();
        $admin->roles()->attach(Role::where('name', 'admin')->first());
    }
}
