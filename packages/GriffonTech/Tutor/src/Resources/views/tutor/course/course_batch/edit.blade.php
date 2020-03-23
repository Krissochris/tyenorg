@extends("tutor::layout.master")

@section('title')
    Edit Course Batch
@stop

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Edit Course Batch</h3>
                        <a href="{{route('tutor.courses.course_batch.index', $course_batch->course_id)}}" class="btn btn-dark float-right">Go Back</a>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => ['tutor.courses.course_batch.edit', $course_batch->id]]) !!}
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="form-group">
                                    <input type="hidden" name="entry_status" value="0">
                                    <label for="entry_status">
                                        <input type="checkbox" name="entry_status" value="1" {{ ($course_batch->entry_status) ? 'checked' : '' }} {{ ($course_batch->entry_status) ? 'disabled' : '' }} >
                                        Entry Status </label>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="is_taken" value="0">
                                    <label for="is_taken">
                                        <input type="checkbox" id="is_taken" name="is_taken" value="1" {{ ($course_batch->is_taken) ? 'checked' : '' }} {{ ($course_batch->is_taken) ? 'disabled' : '' }} >
                                        Is Taken? </label>
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Update">
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
