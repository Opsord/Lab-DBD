<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;
use App\Models\Permission;
use App\Models\Role_permission;

class RolePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //El administrador tiene todos los permisos
        $role = Role::find(1);
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            $role_perm = new Role_permission();
            $role_perm->id_role = $role->id_role;
            $role_perm->id_permission = $permission->id_permission;
            $role_perm->save();
        }
        
        //El Usuario solo tiene permisos de playlists
        $role = Role::find(2);
        $permissions = Permission::where('action', 'like', '%playlist%')->get();
        foreach ($permissions as $permission) {
            $role_perm = new Role_permission();
            $role_perm->id_role = $role->id_role;
            $role_perm->id_permission = $permission->id_permission;
            $role_perm->save();
        }

        //El Artista tiene permisos sobre las playlist y canciones
        $role = Role::find(3);
        $permissions = Permission::where('action', 'like', '%playlist%')->get();
        foreach ($permissions as $permission) {
            $role_perm = new Role_permission();
            $role_perm->id_role = $role->id_role;
            $role_perm->id_permission = $permission->id_permission;
            $role_perm->save();
        }
        $permissions = Permission::where('action', 'like', '%song%')->get();
        foreach ($permissions as $permission) {
            $role_perm = new Role_permission();
            $role_perm->id_role = $role->id_role;
            $role_perm->id_permission = $permission->id_permission;
            $role_perm->save();
        }
    }
}
