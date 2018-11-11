<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class following_course extends Model
{
    public $timestamps = false;
    protected $table = 'following_courses';

    protected $fillable = [ 'user_id', 'course_id' ];
}
