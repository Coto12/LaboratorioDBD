<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\City;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CityUser>
 */
class CityUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'zip_code'=>$this->faker->postcode,
            'id_user' => User::all()->random()->id,
            'id_city' => City::all()->random()->id,
        ];
    }
}
