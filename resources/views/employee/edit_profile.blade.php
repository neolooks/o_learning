@extends('layouts.app')

@section('content')

<form action="/store_employee" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

    <div class="col-md-12">

        <div class="col-md-3 text-center">
        @if($employee)
        <img id="pro_pic" src="{{ url('storage/employee/'.$employee->user_id. '/'.$employee->user_id.'.jpg') }}" alt="Image Preview">
        @else
        <img id="pro_pic" src="{{ url('img/avatarDefault.png') }}" alt="Image Preview">
        @endif    
            
            <span style="width: 80%;" class="btn btn-default btn-file">
                    Browse… <input type="file" id="profile_pic" name="profile_pic">
            </span>
        </div>

<div class="col-md-9">

        

        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                <label for="title" class="">User Name:</label>
                <input type="text" value="{{$user->name}}" readonly class="form-control" id="first_name" name="first_name">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label for="title" class="">Signed in Type:</label>
                <input type="text" value="{{$user->type}}" readonly class="form-control" id="last_name" name="last_name">
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                <label for="title" class="">First Name:</label>
                <input type="text" @if($employee) value="{{$employee->first_name}}" @endif  class="form-control" id="first_name" name="first_name">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label for="title" class="">Last Name:</label>
                <input type="text" @if($employee) value="{{$employee->last_name}}" @endif  class="form-control" id="last_name" name="last_name">
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                <label for="title" class="">Email:</label>
                <input type="email" @if($employee) value="{{$employee->email}}" @endif   class="form-control" id="email" name="email">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                <label for="title" class="">Mobile Number:</label>
                <input type="Number" @if($employee) value="{{$employee->mobile_number}}" @endif   class="form-control" id="mobile_number" name="mobile_number">
                </div>
            </div>

             <div class="col-md-4">
                <div class="form-group">
                <label for="title" class="">Home Number:</label>
                <input type="Number" @if($employee) value="{{$employee->home_number}}" @endif  class="form-control" id="home_number" name="home_number">
                </div>
            </div>

        </div>

         <div class="row">

            <div class="col-md-12">
                <div class="form-group">
                <label for="title" class="">Address:</label>
                <input type="text" @if($employee) value="{{$employee->address}}" @endif   class="form-control" id="address" name="address">
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                <label for="title" class="">City:</label>
                <input type="text" @if($employee) value="{{$employee->city}}" @endif  class="form-control" id="city" name="city">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                <label for="title" class="">Zip Code:</label>
                <input type="text" @if($employee) value="{{$employee->zip_code}}" @endif  class="form-control" id="zip_code" name="zip_code">
                </div>
            </div>

        </div>

        <div class="row text-right">

            <div class="col-md-12">
                <button class="btn btn-primary"  type="submit" >UPDATE</button>
            </div>
        </div>



</div>

</div>

  
</form>
  
    


@endsection

