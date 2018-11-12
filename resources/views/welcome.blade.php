@extends('layouts.app')

@section('content')
<!-- carousel -->
<div id="myCarousel" class="carousel slide" data-ride="carousel" style="height:250px; background:url(https://images.pexels.com/photos/7096/people-woman-coffee-meeting.jpg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940) no-repeat center center; background-size:cover; background-color: #eaeaea;">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
      
        <!-- Wrapper for slides -->
        <div class="carousel-inner container center" >
          <div class="item active" style="">
           
          </div>
      
          <div class="item">
          
          </div>
      
          <div class="item">
         
          </div>
        </div>
      
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

<div class="searchBox">
      <div class="container"> 
        

 <div class="row">

<div class="col-md-5">    
<select class="searchEle" onchange="sort(this.value)" name="category" id="category">
      <option value="">Please Select</option>
      @foreach($categories as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
      @endforeach
  </select>
</div>

<div class="col-md-5">

   <input type="text" class="searchEle" id="search" name="search">

  </div>

  <div class="col-md-2">
  <button onclick="search(document.getElementById('search').value)" class="searchEle">Search</button>
</div>
  </div> 



</div>
</div>
      
      <!-- cources space -->
      <div class="container">

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
@endsection

<script>

  
function search(value){

 $.ajax({
    type:'GET',
    url:'/search?keyword='+value,
    success:function(data){

      if(data.success){
        $('#master').html('');
        $('#master').html(data.html);
      }
       
    }
 });
}



function sort(value){


 $.ajax({
    type:'GET',
    url:'/sort?course_id='+value,
    success:function(data){

      if(data.success){
        $('#master').html('');
        $('#master').html(data.html);
      }
       
    }
 });
}




</script>
