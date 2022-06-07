<?php

namespace Database\Factories;
use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name_song' => $this->faker->word,
            'duration' => $this->faker->time($format = 'H:i:s', $max = '00:01:00'),
        ];
    }
}
