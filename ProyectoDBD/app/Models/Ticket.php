<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    public function subscriptions()
    {
        return $this->belongsTo('App\Models\Subscription');
    }
    public function payment_methods()
    {
        return $this->belongsTo('App\Models\PaymentMethod');
    }
}
