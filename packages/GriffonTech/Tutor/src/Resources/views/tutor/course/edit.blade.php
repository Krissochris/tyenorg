@extends("tutor::layout.master")


@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Edit Course</h3>
                        <a href="{{route('tutor.courses.index')}}" class="btn btn-dark float-right">Go Back</a>
                    </div>
                    <div class="card-body">
                        {!! Form::model($course, ['route' => ['tutor.courses.edit', $course->url_key],'enctype' => 'multipart/form-data' ]) !!}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="course_category_id">Category</label>
                                    {!! Form::select('course_category_id', $categories, null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="name"> Name</label>
                                    {!! Form::text('name',null, ['class' => 'form-control',  'placeholder' => 'Course Name']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="name"> Learning Link </label>
                                    {!! Form::text('learning_url', null, ['class' => 'form-control', 'placeholder' => 'Learning Url']) !!}
                                </div>


                                <div class="form-group">
                                    <label for="name"> Summary </label>
                                    {!! Form::textarea('summary', null, ['rows' => 3, 'class' => 'form-control' ]) !!}
                                </div>

                            </div>

                            <div class="col-sm-6">


                                <div class="form-group">
                                    <label for="description">Description</label>
                                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="photo">Course Feature Photo</label>
                                    {!! Form::file('photo') !!}
                                </div>

                                <div class="form-group">
                                    <label for="video_url">Course Feature Video Url</label>
                                    {!! Form::text('video_url', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="status"> Status </label>
                                    {!! Form::select('status', $courseStatus, null, ['class' => 'form-control'] ) !!}
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary float-right" value="Update">
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
    <script>
        $('#course_type').change(function(event) {
            if (event.target.value === '<?= \GriffonTech\Course\Repositories\CourseRepository::PRO_MEMBER_PAID ?>') {
                $("#payment_options").show();
            } else {
                $("#payment_options").hide();
            }
        })
    </script>
@endsection
