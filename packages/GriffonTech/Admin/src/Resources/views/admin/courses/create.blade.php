@extends("admin::layouts.master")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5> Create Course </h5>
                    </div>
                    <div class="ibox-content">
                        {!! Form::open(['route' => 'admin.courses.create', 'enctype' => 'multipart/form-data']) !!}
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

                                <div class="form-group">
                                    <label for="name"> Learning Link </label>
                                    {!! Form::text('learning_url', null, ['class' => 'form-control', 'placeholder' => 'Learning Url']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="name"> Learning Link 2 </label>
                                    {!! Form::text('learning_url_2', null, ['class' => 'form-control', 'placeholder' => 'Learning Url 2']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="name"> Number of Course Batch(s) </label>
                                    {!! Form::text('number_of_batch', null, ['class' => 'form-control', 'placeholder' => 'Number of Batch']) !!}
                                </div>

                                <div id="payment_options" style="display: none;">
                                    <div class="form-group">
                                        <label for="total_no_of_referrals_needed"> Number of Referrals Needed (Equivalent of Price)</label>
                                        {!! Form::number('total_no_of_referrals_needed', null, ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        <label for="price"> Price (For Pro Member Paid Courses ) </label>
                                        {!! Form::number('price', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-6">

                                <div class="form-group">
                                    <label for="name"> Summary </label>
                                    {!! Form::textarea('summary', null, ['rows' => 3, 'class' => 'form-control' ]) !!}
                                </div>

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
                                    <label for="total_no_of_users_in_batch">Total Number of Users in a Batch</label>
                                    {!! Form::number('total_no_of_users_in_batch', null, ['class' => 'form-control']) !!}
                                </div>

                            </div>


                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary float-right" value="Create">
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')
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
