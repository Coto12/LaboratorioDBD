<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function subscriptions()
    {
        return $this->hasMany('App\Models\Subscription');
    }
    public function ticket()
    {
        return $this->hasMany('App\Models\Subscription');
    }
}
