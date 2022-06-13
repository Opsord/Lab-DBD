<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song_playlist>
 */
class Song_playlistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_song'=> Song::all()->random()->id_song,
            'id_playlist'=> Playlist::all->random()->id_playlist
        ];
    }
}
