@extends('layouts.app')

@section('content')


<div class="container">
        <div class="sidebar">
            <div class="sidebar-inner">

            @include('employee._partials.lef-col')
</div>
        </div>

        <div class="mainbody">

            @if($user != null)
                  <div class="vCourseEnroll text-right">
                        @if(!$following_course->isEmpty())                  
                        <button id="" style="border: none;" class="btnLight btnEnroll">Enrolled</button>
                        @else
                              @if(!($user->id == $course->user_id))
                              <button id="enroll" style="border: none;" class="btnLight btnEnroll">Enroll Now</button>                    
                              @endif
                        @endif
                  </div>
            @endif

            <img src="{{ url('storage/course_file/'. $course->id . '/'.$course->id.'.jpg') }}" alt="Image Preview">

            <hr>

            <input type="text" hidden id="course_id" value="{{$course->id}}">

              <div class="vCourseHeader">

                        <div>{{$course->getEnroll($course->id)}} Enrolled for this course</div>
                    <div class="row">
                          <div class="col-md-12">
                                <div class="text-left">
                                      <div class="vCourseTitle">{{$course->title}}</div>
                                      <div class="row">
                                            <div class="col-md-6">
                                                  <div class="text-left">
                                                  <div class="vCourseSubTitle">{{$course->sub_title}}</div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="text-right">
                                                  <div class="vCourseSubTitle">{{$course->sub_title}}</div>
                                                  </div>
                                            </div>
                                      </div>
                                      <hr>
                                </div>
                          </div>
                    </div>
                    <div class="vCourseDescription">{{$course->description}}</div>
              </div>

              

<!-- 
     
              <div>
                    {{$course->title}}
              </div>

              <hr>

              <div>
                    {{$course->sub_title}}
              </div>

              <hr>

              <div>
                    {{$course->description}}
              </div>

              <hr>

              <div>
                    {{$course->tool_knowledge}}
              </div>

              <hr>

              <div>
                    {{$course->take_course}}
              </div>

              <hr>

              <div>
                    {{$course->achievement}}
              </div>

              <hr>

              <div>
                    {{$course->name}}
              </div>

              -->

              <hr>

            <div>

            @forelse($reviews as $review)
            <div class="ratebox">

            <h3 class="lblRateName">{{$review->name}}</h3>
            <h3 class="lblRateDate">{{Carbon\Carbon::parse($review->created_at)->diffForHumans()}}</h3>

            <form class="user-rating-form" id="user-rating-form" >
                  <div class="starRateonPage">
                  <span class="user-rating">
                  <input disabled @if($review->rate == 5) checked  @endif type="radio" value="5"><span class="star"></span>
                  <input disabled @if($review->rate == 4) checked  @endif type="radio" value="4"><span class="star"></span>
                  <input disabled @if($review->rate == 3) checked  @endif type="radio" value="3"><span class="star"></span>
                  <input disabled @if($review->rate == 2) checked  @endif type="radio" value="2"><span class="star"></span>
                  <input disabled @if($review->rate == 1) checked  @endif type="radio" value="1"><span class="star"></span>
                  </span>
                  </div>
                  <p id="content" class="txtRateComment">{{$review->content}}</p>
            </form>

            </div>
            @empty
            <div>No Reviews So Far</div>
            @endforelse

<div>

             @if(!$following_course->isEmpty())                 
             <video width="400" controls>
                <source src="{{ url('storage/course_file/'. $course->id . '/'.$course->id.'.mp4') }}" type="video/mp4">
            </video>


            <div class="ratebox">

            <h3 class="lblRateTitle">Rate this Course</h3>
            
            <form class="user-rating-form" id="user-rating-form" action="/create_review" method="POST" enctype="multipart/form-data">
                  <div class="starRateonPage">
                        <span class="user-rating {{ $errors->has('rating') ? 'has-error' : ''}}">
                        <input type="radio" id="rating" name="rating" value="5"><span class="star"></span>
                        <input type="radio" id="rating" name="rating" value="4"><span class="star"></span>
                        <input type="radio" id="rating" name="rating" value="3"><span class="star"></span>
                        <input type="radio" id="rating" name="rating" value="2"><span class="star"></span>
                        <input type="radio" id="rating" name="rating" value="1"><span class="star"></span>
                        </span>
                  </div>
                  @if($errors->has('rating'))
                        <span class="help-block">{{$errors->first('rating')}}</span>
                  @endif
                  <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" hidden>
                  <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}" hidden>
                              
            <textarea id="content" name="content" class="txtRate {{ $errors->has('content') ? 'has-error' : ''}}"></textarea>
            @if($errors->has('content'))
                  <span class="help-block">{{$errors->first('content')}}</span>
            @endif
            <button class="txtRateSubmit">Submit</button>
            </form>
            
            </div>

            <div>

            <!-- comments container -->
		<div class="comment_block">

		 <div class="create_new_comment">

			<!-- current #{user} avatar -->
		 	<div class="user_avatar">
                   @if(file_exists(public_path('storage/employee/'.$user->id.'/'.$user->id.'.jpg')))               
                              <img id="pro_pic" src="{{ url('storage/employee/'.$user->id.'/'.$user->id.'.jpg') }}">
                        @else
                        
                        <img id="pro_pic" src="{{ url('img/avatarDefault.png') }}" alt="Image Preview">
                         @endif
                  </div><!-- the input field --><div class="input_comment text-right">
                         
                         <form action="/create_comment" id="comment" method="POST">
                              <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                              <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}" hidden>
                              
                              <input type="text" class="{{ $errors->has('title') ? 'has-error' : ''}}" name="content" id="content">
                              @if($errors->has('content'))
                                    <span class="help-block">{{$errors->first('content')}}</span>
                              @endif
                              <button class="btn btn-primary"><i class="fa fa-check-circle"></i></button>
                         
                         </form>
		 	</div>

		 </div>

            @forelse($comments as $comment)
		 <!-- new comment -->
		 <div class="new_comment">

			<!-- build comment -->
		 	<ul class="user_comment">

		 		<!-- current #{user} avatar -->
			 	<div class="user_avatar">
                         @if(file_exists(public_path('storage/employee/'.$comment->user_id.'/'.$comment->user_id.'.jpg')))               
                              <img id="pro_pic" src="{{ url('storage/employee/'.$comment->user_id.'/'.$comment->user_id.'.jpg') }}">
                        @else
                        
                        <img id="pro_pic" src="{{ url('img/avatarDefault.png') }}" alt="Image Preview">
                         @endif
                              </div><!-- the comment body --><div class="comment_body">
			 		<p>{{$comment->content}}</p>
			 	</div>

			 	<!-- comments toolbar -->
			 	<div class="comment_toolbar">

			 		<!-- inc. date and time -->
			 		<div class="comment_details">
			 			<ul>
			 				<li><i class="fa fa-clock-o"></i> {{Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</li>
			 				<li><i class="fa fa-calendar"></i> {{Carbon\Carbon::parse($comment->created_at)->format('d-m-Y i')}}</li>
			 				<li><i class="fa fa-pencil"></i> <span class="user">{{$comment->name}}</span></li>
			 			</ul>
			 		</div>

			 	</div>
		 	</ul>

             </div>
            @empty
            <div>No Comment</div>
            @endforelse
		</div>
            
            </div>
 
             @endif

            
            </div>
                   

        </div>

    </div>
</div>





@endsection

<style>
video {
    width: 100%;
    height: auto;
}
</style>


@section('custom_js')
<script>




$(document).ready(function(){

    $("#enroll").click(function(){

          swal({
            title: 'Are you sure?',
            text: "You Will See this Course in My Course Page",
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Enroll Now!'
            }).then((result) => {
                  if (result.value) {

                  var id = $('#course_id').val();

                  
                  window.location.href = '/following_course/?course_id='+ id;
                  }
            })
   
     
    });
});
document.getElementById('body').onkeyup = function(e) {
      if (e.keyCode === 13) {
      document.getElementById('comment').submit();
      }
      return true;
      }

</script>
@endsection

