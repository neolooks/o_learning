<?php

namespace App\Http\Controllers;
use App\User;
use App\employee;
use Illuminate\Support\Facades\Auth;
use Storage;    
use Illuminate\Support\Facades\File;
use App\course;
use App\anouncment;

use Illuminate\Http\Request;

class employeeController extends Controller
{
    public function view_employee($employee_id)
    {
        $user = User::find($employee_id);
        $employee= employee::where('user_id', '=', $employee_id)->first();
        return view('employee.edit_profile', compact( 'user', 'employee'));
    }

    public function following_course()
    {
      $courses =  course::join('following_courses', 'following_courses.course_id', '=', 'courses.id')
        ->where('following_courses.user_id', '=', Auth::user()->id)
        ->get();
        //dd($courses);
        $announcments = collect(new anouncment);

        return view('employee.following_course', compact( 'courses', 'announcments'));
    }

    public function store(request $request)
    {
        $employee= employee::where('user_id', '=', Auth::user()->id )->first();
        if($employee)
        {
            $employee->user_id = Auth::user()->id;
            $employee->first_name = $request->first_name;
            $employee->last_name = $request->last_name;
            $employee->email = $request->email;
            $employee->mobile_number = $request->mobile_number;
            $employee->home_number = $request->home_number;
            $employee->address   = $request->address;
            $employee->city =$request->city;
            $employee->zip_code =  $request->zip_code;

            $employee->save();

            $file = $request->file('profile_pic');
        //dd($file);
            if($file)
                {
                $file_name = 'employee/'. Auth::user()->id.'/'.Auth::user()->id.'.jpg';
                Storage::disk('public')->put($file_name, File::get($file));
                }
        }

        else{
        $employee = employee::create([
            'user_id' => Auth::user()->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'home_number' => $request->home_number,
            'address' => $request->address,
            'city' => $request->city,
            'zip_code' => $request->zip_code
        ]);
        }
        $file = $request->file('profile_pic');
        //dd($file);
        if($file)
        {
            $file_name = 'employee/'. Auth::user()->id.'/'.Auth::user()->id.'.jpg';
            Storage::disk('public')->put($file_name, File::get($file));
        //dd('done');
        }
        //dd('done');

        return view('employee.edit_profile', compact( 'employee'));
    }
}