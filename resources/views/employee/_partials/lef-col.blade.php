
@if($user!= null)

<div class="profileBox">
    
    <div class="pbProfilePic" style="background-size:cover; background-image:url({{ url('storage/employee/'.$user->id. '/'.$user->id.'.jpg') }}"></div>
    <div class="pbTitle">{{$user->name}}</div>
    <div class="pbNormalLbl">Kandy, Srilanka</div>

    <br>

    <div class="row text-center">
        <div class="col-md-12">
            <a href="/edit_profile/{{$user->id}}" class="btnLight btnEdit">Edit Profile</a>
        </div>
    </div>

    

</div>



@else

<div class="profileBox">

<div class="row text-center">
    <div class="col-md-12">
        <button onclick="location.href''" class="btnLight btnEdit">Register</button>
    </div>
</div>



</div>

@endif

<hr>

@if(Request::url() !== 'http://olearning.local/home')

@forelse($announcments as $announcment)
<div class="profileBox">
    
      <div class="pbTitle">{{$announcment->title}}</div>
    <br>

    <div class="row text-center">
        <div class="col-md-12">
           <p>{{$announcment->description}}</p>
        </div>
    </div>

 

</div>

@empty
<div>
</div>
@endforelse 
@endif

