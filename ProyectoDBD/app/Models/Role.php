<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public function rol_users()
    {
        return $this->hasMany('App\Models\RolUser');
    }
    public function permission_rols()
    {
        return $this->hasMany('App\Models\PermissionRol');
    }
}
