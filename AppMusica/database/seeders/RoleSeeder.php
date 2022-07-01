<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creacion de los 3 roles
        //Admin
        $rol_01 = new Role();
        $rol_01->name_role = 'Administrador';
        $rol_01->save();
        //User
        $rol_02 = new Role();
        $rol_02->name_role = 'Usuario';
        $rol_02->save();
        //Artista
        $role_03 = new Role();
        $role_03->name_role = 'Artista';
        $role_03->save();
    }
}
