<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;
     public function users()
    {
        return $this->belongTo('App\Models\User');
    }
     public function users()
    {
        return $this->belongTo('App\Models\User');
    }
}