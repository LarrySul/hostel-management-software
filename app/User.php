<?php

namespace App;

use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'fname','gender', 'matric', 'college', 'email', 'kinName','course','phone','relationship','password'
    ];

}

