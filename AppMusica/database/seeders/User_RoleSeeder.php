<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Role;
use App\Models\User_Role;

class User_RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = User::all();
        $roles = Role::all();

        foreach ($users as $user) {
            $role = $roles->random();
            $user_role = new User_Role();
            $user_role->id_user = $user->id_user;
            $user_role->id_role = $role->id_role;
            $user_role->save();
        }
    }
}
