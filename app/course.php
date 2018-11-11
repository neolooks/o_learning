<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $table = 'courses';

    protected $fillable = [ 'user_id' ,'title', 'category', 'sub_title', 
    'description', 'course_image', 'course_video', 
    'tool_knowledge', 'take_course', 'achievement', 'status' ];


    public function getAverage($course_id)
    {
        $average = review::where('review_master.course_id', '=',  $course_id)->avg('review_master.rate');
        //return $this->where('review_master.course_id', '=',  'courses.id')->avg('rate');  

        return $average;
    }

    public function getEnroll($course_id)
    {
        $Enroll = following_course::where('following_courses.course_id', '=',  $course_id)->count();
        //return $this->where('review_master.course_id', '=',  'courses.id')->avg('rate');  

        return $Enroll;
    }
}
