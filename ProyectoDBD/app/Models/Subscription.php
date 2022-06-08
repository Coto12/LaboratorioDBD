<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    public function payment_methods()
    {
        return $this->belongTo('App\Models\PaymentMethod');
    }
    public function users()
    {
        return $this->belongTo('App\Models\User');
    }
    public function follows()
    {
        return $this->belongTo('App\Models\Follow');
    }
}
