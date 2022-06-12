<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Country;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'song_name' => $this->faker->sentence($nbWords = 4, $variableNbWords = true),
            'age_restriction' => $this->faker->boolean,
            'image' => $this->faker->imageUrl($width = 256, $height = 256),
            'lyrics' => $this->faker->text($maxNbChars = 200),

            'id_country' => Country::all()->random()->id,
        ];
    }
}
