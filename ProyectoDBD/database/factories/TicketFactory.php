<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Subscription;
use App\Models\PaymentMethod;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date'=>$this->faker->dateTime($max = 'now', $timezone = null),
            'amount' =>$this->faker->numberBetween($min = 1500, $max = 1501),

            'id_subscription' => Subscription::all()->random()->id,
            'id_payment_method' => PaymentMethod::all()->random()->id,
        ];
    }
}
