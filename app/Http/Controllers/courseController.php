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

class courseController extends Controller
{


    public function index(){
        $is_user = Auth::check();
        //dd($userdemo);
        
        if($is_user)
        {
            $user = User::Find(Auth::user()->id);
            $following_course = following_course::where('user_id', '=', Auth::user()->id)->get();
            $courses = course::where('user_id', '!=', Auth::user()->id)->get();

            /*foreach($courses as $course)
            {
                $average = review::where('review_master.course_id', '=',  $course->id)->avg('rate');
                echo $average. '-' . $course->id.',';
            }*/

            //dd($courses);
            return view('welcome', compact( 'courses', 'following_course'));
        }

        else
        {
            $courses = course::get();
            return view('welcome', compact( 'courses'));
        }

        /*$courses = course::get();
        return view('welcome', compact( 'courses'));*/
    }

    
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function view()
    {
        //dd('hi');
        $courses = course::where('user_id', '=', Auth::user()->id)->get();
        $announcments =  anouncment::where('user_id', '=', Auth::user()->id)->get();  
        //dd($announcments);    
        return view('home', compact('courses', 'announcments'));
    }

    public function create()
    {
        $categories = category::get();
        $courses = course::where('user_id', '=', Auth::user()->id)->get();               
        return view('course.create_course', compact('categories', 'courses'));
    }

    public function edit_course(request $request)
    {
        $categories = category::get();
        $course = Course::Join('categories', 'categories.id', '=', 'courses.category')
        ->where('courses.id', '=', $request->course_id)
        ->select('courses.*', 'categories.name')->first();   
        $courses = course::where('user_id', '=', Auth::user()->id)->get();           
        $announcments = anouncment::where('announcments.course_id', 'like', '%' .  $request->course_id. '%')->get();
        return view('course.update_course', compact('categories', 'course', 'courses','announcments'));
    }

    public function store(request $request)
    {   
        $user = User::Find(Auth::user()->id);

        if($request->id)
        {
            $course = course::where('id', '=', $request->id)->first();
            //dd($request->description);
            $course->title = $request->title;
            $course->category = $request->category;
            $course->sub_title = $request->sub_title;
            $course->description = $request->description;
            $course->tool_knowledge   = $request->tool_knowledge;
            $course->take_course =$request->take_course;
            $course->achievement =  $request->achievement;

            $course->save();

            $file = $request->file('course_image');
                if($file)
                {
                $file_name = 'course_file/'. $course->id.'/'.$course->id.'.jpg';
                Storage::disk('public')->put($file_name, File::get($file));
                //dd('done');
                }

                $file = $request->file('course_video');
                if($file)
                {
                $file_name = 'course_file/'. $course->id.'/'.$course->id.'.mp4';
                Storage::disk('public')->put($file_name, File::get($file));
               
                }
                return redirect()->guest('/home');
        }

        else{
        //dd($user->id);
        $this->validate($request, [
            'title' => 'required',
            'sub_title' =>  'required',
            'category' =>  'required',
            'description' =>  'required',
            'course_image' =>  'required',
            'course_video' => 'required'
        ]);
        
       $course = course::create([
           'user_id' => $user->id,
           'title' => $request->title,
           'category' => $request->category,
           'sub_title' => $request->sub_title,
           'description' => $request->description,
           'course_image' => $request->course_image,
           'course_video' => $request->course_video,
           'tool_knowledge' => $request->tool_knowledge,
           'take_course' => $request->take_course,
           'achievement' => $request->achievement,
           'status' => true
           ]);

        
        $file = $request->file('course_image');
        if($file)
        {
        $file_name = 'course_file/'. $course->id.'/'.$course->title.'_'.$course->id.'.jpg';
        Storage::disk('public')->put($file_name, File::get($file));
        //dd('done');
        }

        $file = $request->file('course_video');
        if($file)
        {
        $file_name = 'course_file/'. $course->id.'/'.$course->title.'_'.$course->id.'.mp4';
        Storage::disk('public')->put($file_name, File::get($file));
 
        }

        return redirect()->guest('/home');
    }

    }

    public function getUserImage($filename){

       // dd(storage_path() . "\app\public\course_file\\16\\1.jpg");
        //return response()->file("C:/xampp/xamppp/htdocs/websites/o_learning/storage/app/public/course_file/16/p1");
         $str =  preg_replace('/\D/', '', $filename);
         $filecontent = Storage::disk('local')->get("/public/course_file/16/hulk.jpg");
         $headers = array(
            'Content-Type: ' . mime_content_type(storage_path() . "/app/public/course_file/16/hulk.jpg"),
        );

         return response($filecontent, 200)->header('Content-Type jpeg');


    }

    public function view_course(request $request)
    {

        if (Auth::guest()){
            $course = Course::Join('categories', 'categories.id', '=', 'courses.category')
                 ->where('courses.id', '=', $request->course_id)
                 ->select('courses.*', 'categories.name')->first();  

            $following_course = collect(new following_course);

            $comments = collect(new comment);

            $reviews = review::join('users', 'users.id', '=', 'review_master.user_id')
                        ->where('course_id', '=', $request->course_id)
                        ->select('review_master.*', 'users.name')
                        ->orderBy('review_master.created_at' ,'DESC')
                        ->get();

            $announcments = collect(new anouncment);
            $user = null;
            //dd($announcments);

            return view('course.see_course', compact('course', 'following_course', 'comments', 'user', 'reviews', 'announcments'));
        }

        else{
        //dd(Auth::user()->id);
       $course = Course::Join('categories', 'categories.id', '=', 'courses.category')
                 ->where('courses.id', '=', $request->course_id)
                 ->select('courses.*', 'categories.name')->first();  
               
        
        $comments = comment::join('users', "users.id", "=", 'comments.user_id')
                 ->where('course_id', '=', $request->course_id)
                 ->select('comments.*', 'users.name')
                 ->orderBy("created_at", "DESC")
                 ->get();

        $reviews = review::join('users', 'users.id', '=', 'review_master.user_id')
                        ->where('course_id', '=', $request->course_id)
                        ->select('review_master.*', 'users.name')
                        ->orderBy('review_master.created_at' ,'DESC')
                        ->get();
        

        $following_course = following_course::where('user_id', '=', Auth::user()->id)
                                            ->where('course_id', '=', $request->course_id)
                                            ->get();

        $announcments = anouncment::where('announcments.course_id', 'like', '%' .  $request->course_id. '%')->get();
       
                                            
        $user = User::Find(Auth::user()->id);
            return view('course.see_course', compact('course', 'following_course', 'comments', 'user', 'reviews', 'announcments'));
        }
    }

    public function follwing_course(request $request)
    {
        $user = User::Find(Auth::user()->id);
        //dd($course_id);
        if($user)
        {
            $course = Course::Join('categories', 'categories.id', '=', 'courses.category')
            ->where('courses.id', '=', $request->course_id)
            ->select('courses.*', 'categories.name')->first();  

            $following_course = following_course::create(
            [
                'user_id' => $user->id,
                'course_id' => $request->course_id
            ]);
         
            return redirect('/view_course?course_id='.$request->course_id);
        }

        else
        {
            return redirect('/login');
        }

       

        
    }


    public function create_comment(request $request)
    {

        $this->validate($request, [
            'content' => 'required'
        ]);
        $comment = comment::create([
            'user_id' => Auth::user()->id,
            'course_id'=>$request->course_id,
            'content'=> $request->content
        ]);
        
    return redirect('following_course/?course_id='.$request->course_id);
    }


    public function create_review(request $request)
    {
     
        $this->validate($request, [
            'content' => 'required',
            'rating' => 'required'
        ]);

        $review = review::create([
            'user_id' => Auth::user()->id,
            'course_id'=>$request->course_id,
            'content'=> $request->content,
            'rate'=> $request->rating[0]
           
        ]);

        return redirect('following_course/?course_id='.$request->course_id);
    }

    public function get_rate_average(request $request)
    {
        $average = review::where('course_id', '=', $request->course_id)->avg('rate');
    }


}
