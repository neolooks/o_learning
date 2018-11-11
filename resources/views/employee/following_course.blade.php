@extends('layouts.app')

@section('content')



    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
<div class="container">
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

<div class="coursesHeader">
            <h3 class="coursesTitle">{{$course->title}}</h3>
            <h4 class="coursesSubTitle">{{$course->sub_title}}</h4>
            </div>
            <div class="coursesImgs">
            <div class="thumbImg" style="background:url({{ url('storage/course_file/'. $course->id . '/'.$course->id.'.jpg') }}) no-repeat center center; background-size:cover; background-color: #eaeaea;"></div>
            </div>
            <div class="coursesFooter">
            <div class="row">
            <div class="col-md-6">
            <div class="text-left">

<form class="user-rating-form" id="user-rating-form" >
                  <div class="starRateonPage">
                  <span class="user-rating">
                  <input disabled @if($course->getAverage($course->id) == 5) checked  @endif type="radio" value="5"><span class="star"></span>
                  <input disabled @if($course->getAverage($course->id) == 4) checked  @endif type="radio" value="4"><span class="star"></span>
                  <input disabled @if($course->getAverage($course->id) == 3) checked  @endif type="radio" value="3"><span class="star"></span>
                  <input disabled @if($course->getAverage($course->id) == 2) checked  @endif type="radio" value="2"><span class="star"></span>
                  <input disabled @if($course->getAverage($course->id) == 1) checked  @endif type="radio" value="1"><span class="star"></span>
                  </span>
                  </div>
</form>

            </div>
            </div>
            <div class="col-md-6">
            <div class="text-right">
            <button onclick="location.href='view_course?course_id={{$course->id}} ';" class="btnLight">View Course</button>
            </div>
            </div>
            </div>

            </div>
                    
            
          </div>

@endforeach
@endif



</div>

</div>
</div>


  
  </div>
  
    


@endsection

