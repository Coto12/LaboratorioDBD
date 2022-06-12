<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Playlist>
 */
class PlaylistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'playlist_name'=>$this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'playlist_description'=>$this->faker->text($maxNbChars = 200),
            
            'id_user' => User::all()->random()->id,
        ];
    }
}
