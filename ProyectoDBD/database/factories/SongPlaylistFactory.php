<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Song;
use App\Models\Playlist;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SongPlaylist>
 */
class SongPlaylistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_song' => Song::all()->random()->id,
            'id_playlist' => Playlist::all()->random()->id,
        ];
    }
}
