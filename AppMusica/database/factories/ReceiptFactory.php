<?php

namespace Database\Factories;

use App\Models\Receipt;
use App\Models\Payment_method;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Receipt>
 */
class ReceiptFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            'amount' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),

            'used_method' => Payment_method::all()->random()->id_method,
        ];
    }
}
