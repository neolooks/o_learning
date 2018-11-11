<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $table = 'courses';

    protected $fillable = [ 'user_id' ,'title', 'category', 'sub_title', 
    'description', 'course_image', 'course_video', 
    'tool_knowledge', 'take_course', 'achievement', 'status' ];
}
