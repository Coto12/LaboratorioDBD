<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;
    public function songs()
    {
        return $this->belongsTo('App\Models\Song');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
}
