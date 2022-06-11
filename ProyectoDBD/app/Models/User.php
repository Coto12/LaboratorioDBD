<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public function rol_users()
    {
        return $this->hasMany('App\Models\RolUser');
    }
    public function payment_methods()
    {
        return $this->hasMany('App\Models\PaymentMethod');
    }
    public function subscriptions()
    {
        return $this->hasMany('App\Models\Subscription');
    }
    public function follows()
    {
        return $this->hasMany('App\Models\Follow');
    }
    public function interactions()
    {
        return $this->hasMany('App\Models\Interaction');
    }
    public function playlists()
    {
        return $this->hasMany('App\Models\Playlist');
    }
    public function city_users()
    {
        return $this->hasMany('App\Models\CityUser');
    }


}
