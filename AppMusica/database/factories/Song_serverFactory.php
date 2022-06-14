<?php

namespace Database\Factories;
use App\Models\Song;
use App\Models\Server;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song_server>
 */
class Song_serverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'id_song' => Song::all() -> random() -> id_song,
            'id_server' => Server::all() -> random() -> id_server
        ];
    }
}
