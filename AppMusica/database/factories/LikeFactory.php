<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
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
            'id_song'=> Song::all()->random()->id_song
        ];
    }
}
