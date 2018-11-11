@extends('layouts.app')

@section('content')



    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

<div class="row">
<div class="col-md-12">

        <div class="col-md-3 text-center">
            @include('employee._partials.lef-col')
        </div>

<div class="col-md-9">

        <h3 class="txtPageTitle">My Courses</h3>



@if($courses)
@foreach($courses as $course)

        <div class="course-box">

            <h3>{{$course->title}}</h3>
            <h4>{{$course->sub_title}}</h4>
            <div class="thumbImg" style="background:url({{ url('storage/course_file/'. $course->course_id . '/'.$course->course_id.'.jpg') }}) no-repeat center center; background-size:cover; background-color: #eaeaea;">
                
                </div>
                <div class="text-right">
                    <a href="view_course?course_id={{$course->course_id}}" class="btnViewCourse">View Course</a>
                </div>   
                
                
        </div>

@endforeach
@endif



</div>

</div>
</div>


  

  
    


@endsection

