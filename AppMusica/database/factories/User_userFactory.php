<?php

namespace Database\Factories;
use App\Models\User_user;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User_user>
 */
class User_userFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_user' => User::all()->random()->id_user,
            'id_user2' => User::all()->random()->id_user
        ];
    }
}
