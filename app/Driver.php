<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    // Table name
    protected $table = 'drivers';
    // Primary Key /driver id
    // protected $driver_id;

    
    protected $fillable=[
        'first_name','last_name', 'email','phone_no','address', 

    ];
}
