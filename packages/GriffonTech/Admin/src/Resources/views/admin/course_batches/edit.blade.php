@extends("admin::layouts.master")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Edit Course Batch</h3>
                        <a href="{{route('admin.course_batches.index')}}" class="btn btn-dark float-right">Go Back</a>
                    </div>
                    <div class="card-body">
                        {!! Form::model($course_batch, ['route' => ['admin.course_batches.edit', $course_batch->id] ]) !!}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="course_id">Course Name</label>
                                    <select name="course_id" id="course_id" class="form-control">
                                        <option value="{{ $course_batch->course->id }}">{{ $course_batch->course->name }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tutor_id"> Tutor </label>
                                    <select name="tutor_id" id="tutor_id" class="form-control">
                                        <option value="{{ $course_batch->tutor_id }}">{{ $course_batch->tutor->name }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name"> No of Users </label>
                                    {!! Form::number('no_of_users',null, ['class' => 'form-control', 'disabled' => true,  'placeholder' => 'No of Users']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="type"> Maximum number of Users </label>
                                    {!! Form::number('maximum_number_of_users', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="name"> Entry Status </label>
                                    {!! Form::select('entry_status', ['1' => 'Active', '0' => 'UnActive'], null, [
                                        'class' => 'form-control',
                                     ]) !!}
                                </div>

                                <div class="form-group">
                                    <label for="name"> Is Taken </label>
                                    {!! Form::select('is_taken', ['1' => 'Yes', '0' => 'No'], null, [
                                        'class' => 'form-control',
                                     ]) !!}
                                </div>

                                <div class="form-group">
                                    <label for="name"> Status </label>
                                    {!! Form::select('status', ['1' => 'Active', '0' => 'UnActive'], null, [
                                        'class' => 'form-control',
                                     ]) !!}
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
@endsection
