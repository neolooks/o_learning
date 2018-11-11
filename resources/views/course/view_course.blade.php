
<h3 class="txtPageTitle">My Courses</h3>



        @if($courses)
        @foreach($courses as $course)

        <div class="course-box">

            <h3>{{$course->title}}</h3>
            <h4>{{$course->sub_title}}</h4>
            <div class="thumbImg" style="background:url({{ url('storage/course_file/'. $course->id . '/'.$course->id.'.jpg') }}) no-repeat center center; background-size:cover; background-color: #eaeaea;">
                
                </div>
                <div class="text-right">
                <a href="view_course?course_id={{$course->id}}" class="btnViewCourse">View Course</a>
                <a href="edit_course?course_id={{$course->id}}" class="btnViewCourse btn">Edit Course</a>
            </div>    
        </div>
        
        @endforeach
        @endif


