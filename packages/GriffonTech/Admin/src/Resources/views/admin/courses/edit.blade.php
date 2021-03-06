@extends("admin::layouts.master")

@section('title')
    {{ __('Edit Course:'. $course->name) }}
@stop


@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Edit Course</h3>
                        <a href="{{route('admin.courses.index')}}" class="btn btn-dark float-right">Go Back</a>
                    </div>
                    <div class="card-body">
                        {!! Form::model($course, ['route' => ['admin.courses.edit', $course->id],'enctype' => 'multipart/form-data' ]) !!}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="course_category_id">Category</label>
                                    {!! Form::select('course_category_id', $categories, null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="tutor_id"> Tutor </label>
                                    {!! Form::select('tutor_id', $tutors, null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="name"> Name</label>
                                    {!! Form::text('name',null, ['class' => 'form-control',  'placeholder' => 'Course Name']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="type">Course Type </label>
                                    {!! Form::select('type', $courseTypes, null, ['class' => 'form-control', 'id' => 'course_type']) !!}
                                </div>
                                <div id="payment_options" @if($course->type != \GriffonTech\Course\Repositories\CourseRepository::PRO_MEMBER_PAID ) style="display: none;" @endif >
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

                                <div class="form-group">
                                    <label for="name"> Summary </label>
                                    {!! Form::textarea('summary', null, ['rows' => 3, 'class' => 'form-control' ]) !!}
                                </div>

                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    {!! Form::textarea('description', null, ['class' => 'form-control summernote']) !!}
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
                                    <label for="total_no_of_users_in_batch">Number of Batches to Create</label>
                                    {!! Form::number('number_of_batches', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="approved_on" value="0">
                                    <label for="approved_on">
                                        <input id="approved_on" type="checkbox" name="approved_on" value="1" {{ ($course->approved_on ? 'checked' : '') }}>
                                        Approved
                                    </label>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="active" value="0">
                                    <label for="active">
                                        <input id="active" type="checkbox" name="active" value="1" {{ ($course->active ? 'checked' : '') }}>
                                        Active
                                    </label>
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
