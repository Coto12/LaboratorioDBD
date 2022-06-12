<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Song;
use App\Models\Genre;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GenreSong>
 */
class GenreSongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'genre_song_name'=>$this->faker->sentence($nbWords = 4, $variableNbWords = true),

            'id_song' => Song::all()->random()->id,
            'id_genre' => Genre::all()->random()->id,
        ];
    }
}
