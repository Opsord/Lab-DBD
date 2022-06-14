<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Playlist;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User_playlist>
 */
class User_playlistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_user'=> User::all()->random()->id_user,
            'id_playlist'=> Playlist::all()->random()->id_playlist
        ];
    }
}
