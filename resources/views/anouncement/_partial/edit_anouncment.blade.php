<form action="/store_announcement" method="POST">
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

    <div class="form-content" >

        <h4 style="padding-bottom:15px;">ANNOUNCMENT LANDING PAGE</h4>

            <input type="hidden" value="{{$announcment->id}}" class="form-control" id="id" name="id">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                <label for="title" class="">Title:</label>
                <input type="text" value="{{$announcment->title}}" class="form-control" id="title" name="title">

                @if($errors->has('title'))
                    <span class="help-block">{{$errors->first('title')}}</span>
                @endif

            </div>
        

        
                <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                    <label for="description" class="">Description:</label>
                    <textarea name="description" rows="6" class="form-control" id="description">{{$announcment->description}}</textarea>
                @if($errors->has('description'))
                    <span class="help-block">{{$errors->first('description')}}</span>
                @endif
                </div>
        

        
                <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                    <label for="description" class="">For Courses:</label>
                @if($courses)
                @foreach($courses as $course)
                    @forelse($courses_id as $id)
                            @if($course->id == $id)
                                <label class="checkbox-inline"><input type="checkbox" id="course[]" name="course[]" value="{{$course->id}}" checked>{{$course->title}}</label>
                            @elseif($loop->last)
                                <label class="checkbox-inline"><input type="checkbox" id="course[]" name="course[]" value="{{$course->id}}" >{{$course->title}}</label>
                            @endif
                        @empty
                        <label class="checkbox-inline"><input type="checkbox" id="course[]" name="course[]" value="{{$course->id}}">{{$course->title}}</label>
                    @endforelse
                @endforeach
                @endif
                @if($errors->has('description'))
                    <span class="help-block">{{$errors->first('description')}}</span>
                @endif
                </div>
        

        
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        

    </div>

</form>