<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    public function song_playlist()
    {
        return $this->hasMany('App\Models\SongPlaylists');
    }
    public function interactions()
    {
        return $this->hasMany('App\Models\Interaction');
    }
    public function genre_songs()
    {
        return $this->hasMany('App\Models\GenreSong');
    }
    public function countries()
    {
        return $this->belongsTo('App\Models\Country');
    }
}
