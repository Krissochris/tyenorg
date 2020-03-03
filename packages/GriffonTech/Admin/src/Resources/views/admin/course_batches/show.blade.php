@extends("admin::layouts.master")

@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5> Course Batch</h5>
                </div>
                <div class="ibox-content table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th>Field</th>
                            <th> Value </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Id</td>
                            <td>{{ $course_batch->id }}</td>
                        </tr>
                        <tr>
                            <td>Course Name</td>
                            <td> {{ $course_batch->course->name }}</td>
                        </tr>
                        <tr>
                            <td>Tutor</td>
                            <td>{{ $course_batch->tutor->name }}</td>
                        </tr>
                        <tr>
                            <td>No of Users</td>
                            <td>{{ $course_batch->no_of_users }}</td>
                        </tr>
                        <tr>
                            <td>No of Maximum users</td>
                            <td> {{ $course_batch->maximum_number_of_users }}</td>
                        </tr>
                        <tr>
                            <td>Entry Status </td>
                            <td>{{ $course_batch->entry_status }}</td>
                        </tr>
                        <tr>
                            <td>Is Taken</td>
                            <td>{{ $course_batch->is_taken }}</td>
                        </tr>
                        <tr>
                            <td>Time Course Was Completed</td>
                            <td>{{ $course_batch->time_completed }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>{{ $course_batch->status }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="ibox">
                <div class="ibox-title">
                    <h5> Students Under This Batch </h5>
                </div>
                <div class="ibox-content table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th>Student Name </th>
                            <th> Registered On </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($course_batch->course_registrations)
                            @foreach( $course_batch->course_registrations as $registration)
                                <tr>
                                    <td> {{ $registration->user->name }}</td>
                                    <td> {{ $registration->created_at }}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

@endsection
