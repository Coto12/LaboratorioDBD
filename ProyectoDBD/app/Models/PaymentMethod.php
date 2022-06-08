<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongTo('App\Models\User');
    }
    public function Subscriptions()
    {
        return $this->hasMany('App\Models\Subscription');
    }
}
