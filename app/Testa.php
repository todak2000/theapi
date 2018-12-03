<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testa extends Model
{
    // Table name
    protected $table = 'testas';
    // Primary Key /driver id
    // protected $driver_id;
    protected $fillable=[
        'first_name','last_name', 'email','phone_no'

    ];
}
