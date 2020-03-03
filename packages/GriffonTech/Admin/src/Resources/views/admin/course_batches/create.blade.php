@extends("admin::layouts.master")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">New Course Batch</h3>
                        <a href="{{route('admin.course_batches.index')}}" class="btn btn-dark float-right">Go Back</a>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.course_batches.create' ]) !!}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="course_id">Course Name</label>
                                    {!! Form::select('course_id', $courses, null, ['class' => 'form-control']) !!}
                                </div>


                                <div class="form-group">
                                    <label for="type"> Number of Batch(s) </label>
                                    {!! Form::number('number_of_batches', null, ['class' => 'form-control']) !!}
                                </div>


                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary float-right" value="Save">
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
