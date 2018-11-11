<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    protected $table = 'employees';
    public $timestamps = false;
    protected $fillable = [ 'user_id' ,'first_name', 'last_name', 'email', 
    'mobile_number', 'home_number', 'address', 
    'city', 'zip_code' ];
}
