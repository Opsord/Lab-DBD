<?php

namespace Database\Factories;

use App\Models\Album;
use App\Models\Distributor;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name_album' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'release_date' => $this->faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),

            'distributed_by' => Distributor::all() -> random() -> id_distributor,

        ];
    }
}
