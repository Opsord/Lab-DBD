<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Crear usuaro
        $permission_01 = new Permission();
        $permission_01->action = 'Create an user';
        $permission_01->command = '/create user';
        $permission_01->save();
        //Borrar usuario
        $permission_02 = new Permission();
        $permission_02->action = 'Delete a Song';
        $permission_02->command = '/delete user';
        $permission_02->save();
        //Actualizar usuario
        $permission_03 = new Permission();
        $permission_03->action = 'Update user credentials';
        $permission_03->command = '/update user';
        $permission_03->save();
        //Subir canción
        $permission_04 = new Permission();
        $permission_04->action = 'Upload a song';
        $permission_04->command = '/upload song';
        $permission_04->save();
        //Borrar canción
        $permission_05 = new Permission();
        $permission_05->action = 'Delete a song';
        $permission_05->command = '/delete song';
        $permission_05->save();
        //Crear playlist
        $permission_06 = new Permission();
        $permission_06->action = 'Create a playlist';
        $permission_06->command = '/create playlist';
        $permission_06->save();
        //Borrar playlist
        $permission_07 = new Permission();
        $permission_07->action = 'Delete a playlist';
        $permission_07->command = '/delete playlist';
        $permission_07->save();
        //Agreagar canción a playlist
        $permission_08 = new Permission();
        $permission_08->action = 'Add a song to a playlist';
        $permission_08->command = '/add song playlist';
        $permission_08->save();
        //Borrar canción de playlist
        $permission_09 = new Permission();
        $permission_09->action = 'Delete a song from a playlist';
        $permission_09->command = '/delete song playlist';
        $permission_09->save();
        //Añadir restriccion geografica a canción
        $permission_10 = new Permission();
        $permission_10->action = 'Restrict a song from a country';
        $permission_10->command = '/add country song';
        $permission_10->save();
        //Borrar restriccion geografica de canción
        $permission_11 = new Permission();
        $permission_11->action = 'Unrestrict a song from a country';
        $permission_11->command = '/delete country song';
        $permission_11->save();
    }
}