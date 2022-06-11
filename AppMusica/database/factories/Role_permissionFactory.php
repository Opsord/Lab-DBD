<?php

namespace Database\Factories;
use App\Models\Role_permission;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role_permission>
 */
class Role_permissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_role' => Role::all()->random()->id_role,
            'id_permission' => Permission::all()->random()->id_permission
        ];
    }
}
