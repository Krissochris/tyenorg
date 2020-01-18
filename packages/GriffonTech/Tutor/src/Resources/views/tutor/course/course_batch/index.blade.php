@extends("tutor::layout.master")

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('tutor.courses.course_batch.create', $course->id) }}">
                <button class="btn btn-dark float-right">
                    <i class="fa fa-book-medical"></i>
                    Add Course Batch
                </button>
            </a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-hover table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>S/N</th>
                    <th>No of Users</th>
                    <th>Maximum No of Users</th>
                    <th>Entry Status</th>
                    <th>is Taken</th>
                    <th>Time Completed</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($course->course_batches as $course_batch)
                    <tr>
                        <td> {{ $course_batch->id }}</td>
                        <td> {{ $course_batch->no_of_users }}</td>
                        <td> {{ $course_batch->maximum_number_of_users }}</td>
                        <td> {{ $course_batch->entry_status }}</td>
                        <td> {{ $course_batch->is_taken }}</td>
                        <td> {{ $course_batch->time_completed }}</td>
                        <td> {{ $course_batch->status }}</td>
                        <td> {{ $course_batch->created_at }}</td>
                        <td> {{ $course_batch->updated_at }}</td>
                        <td>
                            <a href="{{ route('tutor.courses.course_batch.edit', $course_batch->id) }}">edit</a>
                            <a class="text-danger" href="">delete </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
