<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         // create  users
         $role1 = Role::where(['name' => 'Super-Admin'])->first();
         $user = \App\Models\User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@reviewerjunction.com',
            'password'=>Hash::make('admin@123'),
        ]);
        $user->assignRole($role1);
    }
}
