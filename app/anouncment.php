<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class anouncment extends Model
{
    protected $table = 'announcments';

    protected $fillable = [ 'course_id' ,'user_id', 'title', 'description' ];
}
