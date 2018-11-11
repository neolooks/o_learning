<div class="mainContainer">
<h4>View Announcment</h4> <br>

 @forelse($announcments as $announcment)


<div class="course-box">

<div class="coursesHeader">
            <h3 class="coursesTitle">{{$announcment->title}}</h3>
            <h4 class="coursesSubTitle">{{$announcment->description}}</h4>
            </div>
            <div class="coursesFooter">
            <div class="row">
            <div class="col-md-12">
            <div class="text-right">
            <button onclick="location.href='/edit_announcement/{{$announcment->id}}';" class="btnLight">View and Edit Announcment</button>
            </div>
            </div>
            </div>

            </div>
                    
            
          </div>


@empty
<div>
No Announcment
</div>

@endforelse


</div>
