@extends("tutor::layout.master")

@section('title')
    Add New Course
@stop

@section("content")


    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center justify-content-between">
            <h1 class="m-0">Create Course</h1>
        </div>
    </div>


    <div class="container page__container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">

                    {!! Form::open(['route' => 'tutor.courses.create', 'enctype' => 'multipart/form-data']) !!}

                    <div class="card-form__body card-body">

                        <div class="form-group">
                            <label for="course_category_id">Category</label>
                            {!! Form::select('course_category_id', $categories, null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="name"> Name</label>
                            {!! Form::text('name',null, ['class' => 'form-control',  'placeholder' => 'Course Name']) !!}
                        </div>

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
                            <label for="name"> Learning Url 1 </label>
                            {!! Form::text('learning_url', null, ['class' => 'form-control', 'placeholder' => 'Learning Url']) !!}
                        </div>

                        <div class="form-group">
                            <label for="name"> Learning Link Url 2 </label>
                            {!! Form::text('learning_url_2', null, ['class' => 'form-control', 'placeholder' => 'Learning Url']) !!}
                        </div>

                        <div class="form-group">
                            <label for="name"> Course Summary </label>
                            {!! Form::textarea('summary', null, [
                            'rows' => 3,
                             'class' => 'form-control',
                             'placeholder' => 'Please summarize your course details here'
                              ]) !!}
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            {!! Form::textarea('description', null, [
                            'class' => 'form-control tinymce_editor',
                            'rows' => 7,
                            'placeholder' => 'Please enter the description']) !!}
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
                            <label for="total_no_of_users_in_batch">Maximum Number of Users in a Batch</label>
                            {!! Form::number('total_no_of_users_in_batch', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label for="name"> Number of Batches To Create </label>
                            {!! Form::text('number_of_batch', null, ['class' => 'form-control', 'placeholder' => 'Number of Batch']) !!}
                        </div>



                        {{--<div class="form-group">
                            <label for="subscribe">Published</label><br>
                            <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                <input checked="" type="checkbox" id="subscribe" class="custom-control-input">
                                <label class="custom-control-label" for="subscribe">Yes</label>
                            </div>
                            <label for="subscribe" class="mb-0">Yes</label>
                        </div>--}}

                        {{--<div class="form-group">
                            <label>Course Preview</label>
                            <div class="dz-clickable media align-items-center" data-toggle="dropzone" data-dropzone-url="http://" data-dropzone-clickable=".dz-clickable" data-dropzone-files='["{{ asset('assets/images/account-add-photo.svg') }}"]'>
                                <div class="dz-preview dz-file-preview dz-clickable mr-3">
                                    <div class="avatar avatar-lg">
                                        <img src="{{ asset('assets/images/account-add-photo.svg') }}" class="avatar-img rounded" alt="..." data-dz-thumbnail>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <button class="btn btn-sm btn-light dz-clickable">Choose photo</button>
                                </div>
                            </div>
                        </div>--}}
                    </div>
                    <div class="card-body text-center">

                        <button type="submit" class="btn btn-success">Create Course</button>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
            <div class="col-md-4">

                <!-- Lessons -->
                <div class="card">
                    <div class="card-header card-header-large bg-light d-flex align-items-center">
                        <div class="flex">
                            <h4 class="card-header__title">Course Creation Rules</h4>
                        </div>
                    </div>

                    <ul class="list-group list-group-fit">
                        <li class="list-group-item">
                            <div class="media">
                                <div class="media-body">
                                    <p>1. You must enter a descriptive course name</p>
                                </div>
                            </div>
                        </li>
                    </ul>
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
    <!-- Dropzone -->
    <script src="{{ asset('assets/vendor/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone.js') }}"></script>
@stop
