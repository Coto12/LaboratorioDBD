<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Role::factory(10)->create();
        \App\Models\RolUser::factory(10)->create();
        \App\Models\Country::factory(10)->create();
        \App\Models\Song::factory(10)->create();
        \App\Models\PaymentMethod::factory(10)->create();
        \App\Models\Interaction::factory(10)->create();
        \App\Models\Subscription::factory(10)->create();
        \App\Models\City::factory(10)->create();
        \App\Models\Ticket::factory(10)->create();
        \App\Models\Genre::factory(10)->create();
        \App\Models\GenreSong::factory(10)->create();
        \App\Models\Follow::factory(10)->create();
        \App\Models\City::factory(10)->create();
        \App\Models\CityUser::factory(10)->create();
        \App\Models\District::factory(10)->create();
        \App\Models\Playlist::factory(10)->create();
        \App\Models\SongPlaylist::factory(10)->create();
    }
}
