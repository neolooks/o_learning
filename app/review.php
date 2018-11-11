<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $table = 'review_master';

    protected $fillable = [ 'course_id' ,'user_id', 'rate', 'content'];
}
