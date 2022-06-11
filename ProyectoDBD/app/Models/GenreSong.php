<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenreSong extends Model
{
    use HasFactory;
    public function genres()
    {
        return $this->belongsTo('App\Models\Genre');
    }
    public function songs()
    {
        return $this->belongsTo('App\Models\Song');
    }
}
