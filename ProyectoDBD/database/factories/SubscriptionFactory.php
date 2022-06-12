<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\PaymentMethod;
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
            'amount' =>$this->faker->numberBetween($min = 1500, $max = 1501),
            'date' =>$this->faker->dateTime($max = 'now', $timezone = null),
            'verification' =>$this->faker->randomElement($array = array ('Acepted' , 'Refused')),

            'id_user' => User::all()->random()->id,
            'id_payment_method' => PaymentMethod::all()->random()->id,
        ];
    }
}
