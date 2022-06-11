<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SongPlaylist extends Model
{
    use HasFactory;
    public function playlists()
    {
        return $this->belongsTo('App\Models\Playlist');
    }
    public function songs()
    {
        return $this->belongsTo('App\Models\Song');
    }
}
