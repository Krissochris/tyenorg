@extends("tutor::layout.master")


@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">View Course Batch</h3>
                        <a href="{{route('tutor.courses.course_batch.index', $course_batch->course_id)}}" class="btn btn-dark float-right">Go Back</a>
                    </div>
                    <div class="card-body">
                        @if ($course_batch->course_registrations)
                        <div class="table-responsive">
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <td>Student Name</td>
                                    <td>Student Phone Number</td>
                                    <td>Date Registered</td>
                                </tr>
                                </thead>
                              @foreach($course_batch->course_registrations as $registration )
                                <tr>
                                    <td> {{ $registration->user->name }}</td>
                                    <td> {{ $registration->user->phone_number }}</td>
                                    <td> {{ $registration->created_at }}</td>
                                </tr>
                              @endforeach
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
@endsection
