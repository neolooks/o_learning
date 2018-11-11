<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\category;
use App\course;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\anouncment;

class anouncmentController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $categories = category::get();
        $courses = course::where('user_id', '=', Auth::user()->id)->get();       

        return view('anouncement.create_anouncement', compact('categories', 'courses'));
    }

    public function store(request $request)
    {  
        if($request->id)
        {

            $course_id = "";
            foreach($request->course as $course){
                $course_id .= $course.',';
            }

            $newcourse_id=rtrim($course_id,", ");

            $anouncment = anouncment::find($request->id);

            $anouncment->title = $request->title;
            $anouncment->description = $request->description;
            $anouncment->course_id = $newcourse_id;

            $anouncment->save();

        }

        else{

            $course_id = "";
        foreach($request->course as $course){
            $course_id .= $course.',';
        }

        $newcourse_id=rtrim($course_id,", ");
        //dd($newcourse_id);

        $user = User::Find(Auth::user()->id);

        $this->validate($request, [
            'title' => 'required',
            'description' =>  'required',
            'course' =>  'required'          
        ]);
        
       $anouncment = anouncment::create([
           'course_id' => $newcourse_id,
           'user_id' => $user->id,
           'title' => $request->title,
           'description' => $request->description
           ]);

        }
        

        

        return redirect('/home');

        }

    public function edit_announcment($announcment_id)
    {
        $announcment = anouncment::where('id', '=', $announcment_id)->first();
        $categories = category::get();
        $courses = course::where('user_id', '=', Auth::user()->id)->get();    
        $announcments = collect(new anouncment);
        $courses_id = explode(',', $announcment->course_id);

        return view('anouncement.edit_anouncement', compact('categories', 'courses', 'announcment', 'courses_id', 'announcments'));
    }
    
}
