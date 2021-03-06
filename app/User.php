<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    //public $table="user";
    public $timestamps=false;

    protected $fillable = 
    [
        'name', 'last_name', 'age', 'date_of_birth', 'phone_number', 'password','api_token'
    ];

        protected $reg =
    [
            'password'
    ];
}





