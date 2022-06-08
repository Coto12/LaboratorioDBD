<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolUser extends Model
{
    use HasFactory;
    public function roles()
    {
        return $this->belongTo('App\Models\Role');
    }
    public function users()
    {
        return $this->belongTo('App\Models\User');
    }
}
