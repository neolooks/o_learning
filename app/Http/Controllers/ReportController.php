<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\category;
use App\course;
use App\User;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use App\following_course;
use Storage;
use App\comment;
use App\anouncment;
use App\review;

class ReportController extends Controller
{
   public function get_course_number()
   {
       $courseCount = course::count();
       dd($courseCount);

   }

   public function get_student_number()
   {
       $studentCount = User::where('type', '=', 'student')->count();
       dd($studentCount);

   }

   public function get_lecture_number()
   {
       $lectureCount = User::where('type', '=', 'instructor')->count();
       dd($lectureCount);

   }

   
}
