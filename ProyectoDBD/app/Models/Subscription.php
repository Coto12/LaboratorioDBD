<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    public function payment_methods()
    {
        return $this->belongsTo('App\Models\PaymentMethod');
    }
    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function ticket()
    {
        return $this->hasOne('App\Models\Ticket');
    }
}
