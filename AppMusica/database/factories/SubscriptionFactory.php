<?php

namespace Database\Factories;

use App\Models\Subscription;
use App\Models\Payment_method;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'state' => $this->faker->boolean($chanceOfGettingTrue = 00),
            'start_date' => $this->faker->dateTimeThisDecade($max = 'now', $timezone = null),
            'end_date' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+6 months', $timezone = null),
            'payment_method' => Payment_method::all()->random()->id_method,
        ];
    }
}
