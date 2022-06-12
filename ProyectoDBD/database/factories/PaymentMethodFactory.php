<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaymentMethod>
 */
class PaymentMethodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'credit_card'=>$this->faker->creditCardType,
            'transaction_number'=>$this->faker->unique()->randomNumber,
            'id_user' => User::all()->random()->id,
        ];
    }
}
