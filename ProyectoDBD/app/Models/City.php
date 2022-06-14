<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public function city_users()
    {
        return $this->hasMany('App\Models\CityUser');
    }
    public function countries()
    {
        return $this->belongsTo('App\Models\Country');
    }
}
