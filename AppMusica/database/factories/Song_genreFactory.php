<?php

namespace Database\Factories;

use App\Models\Song;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song_genre>
 */
class Song_genreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            'song' => Song::all() -> random() -> id_song,
            'genre' => Genre::all() -> random() -> id_genre,
            
        ];
    }
}
