<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public function playlists()
    {
        return $this->hasMany('App\Models\Playlist');
    }

    public function favs()
    {
        return $this->hasMany('App\Models\Fav');
    }

    public function views()
    {
        return $this->hasMany('App\Models\View');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    public function rates()
    {
        return $this->hasMany('App\Models\Rate');
    }

    public function genres()
    {
        return $this->hasMany('App\Models\Genre');
    }

    public function addresses()
    {
        return $this->hasMany('App\Models\Address');
    }
}
