<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserData extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'user_data';

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id',
        'user_name',
        'email', 
        'password',
        'phone_number',
        'gender',
        'age',
        'address',
        'type',
        'isActive'
    ];

    public $timestamps = false;
}
