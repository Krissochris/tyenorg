@extends("tutor::layout.master")


@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Create Course Batch</h3>
                        <a href="{{route('tutor.courses.course_batch.index', $course->id)}}" class="btn btn-dark float-right">Go Back</a>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => ['tutor.courses.course_batch.create', $course->id]]) !!}
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="course_category_id"> Maximum number of Users </label>
                                    {!! Form::number('maximum_number_of_users', $course->total_no_of_users_in_batch, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name"> Number of Batches </label>
                                    {!! Form::number('number_of_batch', null, ['class' => 'form-control']) !!}
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
                <hr>
            </div>
        </div>
    </div>
@endsection