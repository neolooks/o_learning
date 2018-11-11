<div class="mainContainer">
<h4>View Announcment</h4> <br>

 @forelse($announcments as $announcment)

<div class="course-box">

    <h3>{{$announcment->title}}</h3> <br>
    <p>{{$announcment->description}}</p>

        <div class="text-right">
        <a href="/edit_announcement/{{$announcment->id}}" class="btnViewCourse">View and Edit Announcment </a>
    </div>    
</div>

@empty
<div>
No Announcment
</div>

@endforelse


</div>
