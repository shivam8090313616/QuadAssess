<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email','uid', 'password', 'country', 'state', 
        'account_type', 'phone', 'address', 'designation', 'position'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
