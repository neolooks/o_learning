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

<div class="container-fluid">
        <div class="row">
        <div class="md-col-6">
                <ul class="nav-pills">
                        <li class="active"><a data-toggle="pill" href="#course">Courses</a></li>
                        <li><a data-toggle="pill" href="#announcement">Announcment</a></li>
                </ul>
        </div>
        <div class="md-col-6">
        
        </div>
        </div>
        </div>
                

                <div class="tab-content">
                        <div id="course" class="tab-pane fade in active">
                            <div class="pageTopBar">
                            <button onclick="location.href='/create_course';" class="btnJumbo">Create A Course</button>
                            </div>

                            <div>
                               @include('course.view_course')                                
                            </div>
                          
                        </div>

                        <div id="announcement" class="tab-pane fade">
                            <div class="pageTopBar">
                                <button onclick="location.href='/create_announcment';" class="btnJumbo">Create A Anouncment</button>
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