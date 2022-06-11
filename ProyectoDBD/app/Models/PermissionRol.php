<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRol extends Model
{
    use HasFactory;
    public function roles()
    {
        return $this->belongsTo('App\Models\Role');
    }
    public function permissions()
    {
        return $this->belongsTo('App\Models\Permission');
    }
}