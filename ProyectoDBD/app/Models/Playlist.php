<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;
    public function song_playlists()
    {
        return $this->hasMany('App\Models\SongPlaylist');
    }
    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
}
