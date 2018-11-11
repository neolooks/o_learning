<form action="/store_course" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
    <div class="col-md-12 form-content" >
    
        <h4 style="padding-bottom:15px;">COURSE LANDING PAGE</h4>

        <div class="col-md-12 col-md-6">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                <label for="title" class="">Course Title:</label>
                <input type="text" value="Laravel" class="form-control" id="title" name="title">

                @if($errors->has('title'))
                    <span class="help-block">{{$errors->first('title')}}</span>
                @endif

            </div>
        </div>

        <div class="col-md-12 col-md-6">
            <div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}"">
                <label for="title" class="">Course Category:</label>
                <select class="form-control" name="category" id="category">
                    <option value="">Please Slect</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

                @if($errors->has('category'))
                    <span class="help-block">{{$errors->first('category')}}</span>
                @endif

            </div>
        </div>

        <div class="col-md-12 col-md-12">
                <div class="form-group {{ $errors->has('sub_title') ? 'has-error' : ''}}">
                    <label for="sub_title" class="">Sub Title:</label>
                    <input type="text" value="Laravel For Beginners" name="sub_title" class="form-control" id="sub_title">
                @if($errors->has('sub_title'))
                    <span class="help-block">{{$errors->first('sub_title')}}</span>
                @endif
                </div>
        </div>

        <div class="col-md-12 col-md-12">
                <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                    <label for="description" class="">Description:</label>
                    <textarea name="description" rows="6" class="form-control" id="description"> Test Description </textarea>
                @if($errors->has('description'))
                    <span class="help-block">{{$errors->first('description')}}</span>
                @endif
                </div>
        </div>

        <div class="col-md-12 col-md-6">
                <div class="form-group {{ $errors->has('course_image') ? 'has-error' : ''}}">
                    <label for="course_image" class="">Course Image:</label>
                    <input type="file" class="form-control" id="course_image" name="course_image">
                @if($errors->has('course_image'))
                    <span class="help-block">{{$errors->first('course_image')}}</span>
                @endif
                </div>
            </div>

            <div class="col-md-12 col-md-6">
                    <div class="form-group {{ $errors->has('course_video') ? 'has-error' : ''}}">
                        <label for="course_video" class="">Course Video:</label>
                        <input type="file" name="course_video" class="form-control" id="course_video">
                    @if($errors->has('course_video'))
                        <span class="help-block">{{$errors->first('course_video')}}</span>
                    @endif
                    </div>
            </div>

    </div>

    <div class="col-md-12 form-content" >

        <h4 style="padding-bottom:15px;">TARGET STUDENTS</h4>

        <div class="col-md-12 col-md-6">
            <div class="form-group">
                <label for="tool_knowledge" class="">What knowledge & tools are required?</label>
                <input type="text" value="Software IT Guys" class="form-control" id="tool_knowledge" name="tool_knowledge">
            </div>
        </div>

 

        <div class="col-md-12 col-md-6">
                <div class="form-group">
                    <label for="take_course" class="">Who should take this course?</label>
                    <input type="text" value="Smart Students" name="take_course" class="form-control" id="take_course">
                </div>
        </div>

        <div class="col-md-12 col-md-12">
                <div class="form-group">
                    <label for="achievement" class="">What will students achieve or be able to do after taking your course?</label>
                    <textarea name="achievement" rows="8" class="form-control" id="achievement"> Able to Code</textarea>
                </div>
        </div>


            <div class="col-md-12 col-md-12 text-right">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </div>

    </div>

</form>
