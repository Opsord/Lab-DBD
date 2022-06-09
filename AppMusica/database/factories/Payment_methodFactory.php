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
            'card_alias' => $this->faker->word,
            'card_holder' => $this->faker->name,
            'card_number' => $this ->faker->creditCardNumber,
            'expiration_date' => $this->faker->creditCardExpirationDate,
            'security_code' => random_int(100, 999),
        ];
    }
}
