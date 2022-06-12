<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Song;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Interaction>
 */
class InteractionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'views'=>$this->faker->numberBetween($min = 0, $max = 99999999),
            'isliked'=>$this->faker->boolean,
            'favs'=>$this->faker->boolean,
            'rated'=>$this->faker->numberBetween($min = 0, $max = 10),
            
            'id_user' => User::all()->random()->id,
            'id_song' => Song::all()->random()->id,
            
        ];
    }
}
