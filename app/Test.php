<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

    
class Test extends Model
{
    // Table name
    protected $table = 'driver_tbl';
    // Primary Key /driver id
    protected $driver_id;
 
    // Password
    protected $password;
 

    protected $fillable=[
        'first_name','last_name', 'email','phone_no','address'

    ];
 
}
