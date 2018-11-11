@extends('layouts.app')

@section('content')

@if($user->type == 'instructor')
<div class="container">
        <div class="sidebar">
            <div class="sidebar-inner">

            @include('employee._partials.lef-col')
            </div>
        </div>

        <div class="mainbody">


                            <h3 class="txtPageTitle">Update Course</h3> <hr>

@include('course._partials._update')
                          
                        </div>

                                  
                      </div>
                </div>
@else
<div>
    Under Construction
</div>
@endif

@endsection
