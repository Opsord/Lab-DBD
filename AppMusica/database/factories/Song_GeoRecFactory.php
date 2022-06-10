<?php

namespace Database\Factories;

use App\Models\Song;
use App\Models\Geographic_restriction;
use App\Models\Song_GeoRec;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SongRG>
 */
class Song_GeoRecFactory extends Factory
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
            'song' => Song::all() -> random() -> id_song,
            'restricted_to' => Geographic_restriction::all() -> random() -> id_country,
        ];
    }
}
