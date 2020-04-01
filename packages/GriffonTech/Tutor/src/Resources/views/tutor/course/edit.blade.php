@extends("tutor::layout.master")

@section('title')
    Edit Course : {{ $course->name }}
@stop

@section("content")

    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center justify-content-between">
            <h1 class="m-0">Edit Course</h1>
        </div>
    </div>





    <div class="container page__container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    {!! Form::model($course, ['route' => ['tutor.courses.edit', $course->url_key],'enctype' => 'multipart/form-data' ]) !!}
                    <div class="card-form__body card-body">

                        <div class="form-group">
                            <label for="fname">Slug (URL)</label>
                            <div class="help-block my-1 p-1 text-muted bg-light border rounded">
                                /{{ $course->url_key }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="course_category_id">Category</label>
                            {!! Form::select('course_category_id', $categories, null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="name"> Name</label>
                            {!! Form::text('name',null, ['class' => 'form-control',  'placeholder' => 'Course Name']) !!}
                        </div>

                        @if(!$course->active)
                            <div class="form-group">
                                <label for="type">Course Type </label>
                                {!! Form::select('type', $courseTypes, null, ['class' => 'form-control', 'id' => 'course_type']) !!}
                            </div>
                            <div id="payment_options" style="display: none;">
                                <div class="form-group">
                                    <label for="total_no_of_referrals_needed">Total Number of Referrals Needed</label>
                                    {!! Form::number('total_no_of_referrals_needed', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="price"> Price (For Pro Member Paid Courses ) </label>
                                    {!! Form::number('price', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name"> Learning Link </label>
                                {!! Form::text('learning_url', null, ['class' => 'form-control', 'placeholder' => 'Learning Url']) !!}
                            </div>

                            <div class="form-group">
                                <label for="name"> Learning Link 2 </label>
                                {!! Form::text('learning_url_2', null, ['class' => 'form-control', 'placeholder' => 'Learning Url']) !!}
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="name"> Summary </label>
                            {!! Form::textarea('summary', null, ['rows' => 3, 'class' => 'form-control' ]) !!}
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            {!! Form::textarea('description', null, ['class' => 'form-control tinymce_editor']) !!}
                        </div>

                        <div class="form-group">
                            <label for="photo">Course Feature Photo</label>
                            {!! Form::file('photo') !!}
                        </div>

                        <div class="form-group">
                            <label for="video_url">Course Feature Video Url</label>
                            {!! Form::text('video_url', null, ['class' => 'form-control']) !!}
                        </div>

                    </div>
                    <div class="card-body text-center">

                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>

        </div>

    </div>




@endsection

@section('page-footer-script')
    <script>
        $('#course_type').change(function(event) {
            if (event.target.value === '<?= \GriffonTech\Course\Repositories\CourseRepository::PRO_MEMBER_PAID ?>') {
                $("#payment_options").show();
            } else {
                $("#payment_options").hide();
            }
        })
    </script>
@stop
