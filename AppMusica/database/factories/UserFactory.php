<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name_user' => $this->faker->name,
            'pass_user' => $this->faker->password,
            'email' => $this->faker->safeEmail,
            'birthday' => $this->faker->dateTimeThisDecade($max = 'now', $timezone = null),
            'genre' => $this->faker->randomElement(['F', 'M', 'O']),
            'id_subscription' => Subscription::all()->random()->id_subscription
        ];
    }
}
