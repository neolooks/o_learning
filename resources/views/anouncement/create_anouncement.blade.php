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

                <ul class="nav nav-pills">
                        <li><a data-toggle="pill" href="#course">Courses</a></li>
                        <li class="active" ><a data-toggle="pill" href="#announcement">Announcment</a></li>
                </ul>

                <div class="tab-content">

                    
                        <div id="course" class="tab-pane fade ">
                        <div class="pageTopBar">
                                <a href="/home" class="btnCreate"> List Courses</a>
                            </div>

                           <h3 class="txtPageTitle">Create Course</h3>
                                @include('course._partials._create')
                          
                        </div>

                        <div id="announcement" class="tab-pane fade in active">
                         
                        <div class="pageTopBar">
                                        <a href="/home" class="btnCreate"> List Announcment</a>
                                    </div>
        
                                    <h3 class="txtPageTitle">Create Announcment</h3>
                                        @include('anouncement._partial.create_anouncment')

                         
                        </div>                      
                </div>
        </div>

    </div>
@else
<div>
    Under Construction
</div>
@endif

@endsection

