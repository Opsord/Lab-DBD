<?php

namespace Database\Factories;
use App\Models\Payment_method;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment_method>
 */
class Payment_methodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'card_number' => random_int(1000000000000000, 9999999999999999),
            'expiration_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'cardhole_name' => $this->faker->name,
        ];
    }
}
