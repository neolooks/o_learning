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
                        <li class="active"><a data-toggle="pill" href="#course">Courses</a></li>
                        <li><a data-toggle="pill" href="#announcement">Announcment</a></li>
                </ul>

                <div class="tab-content">
                        <div id="course" class="tab-pane fade in active">
                            <div class="pageTopBar">
                            <a href="/create_course" class="btnCreate">Create A Course</a>
                            </div>

                            <div>
                               @include('course.view_course')                                
                            </div>
                          
                        </div>

                        <div id="announcement" class="tab-pane fade">
                            <div class="pageTopBar">
                                <a href="/create_announcment" class="btnCreate"> Create A Anouncment</a>
                            </div>

                            <div>
                                @include('anouncement._partial.view_anouncment')                                
                            </div>

                          
                          
                        </div>                      
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


@section('custom_js')
<script>

</script>
@endsection