@extends("admin::layouts.master")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="ibox ">
                    <div class="ibox-title">
                        <h5> Course Registrations  </h5>
                    </div>
                    <div class="ibox-content table-responsive">

                        <table class="table table-hover table-bordered table-striped no-margins">
                            <thead class="">
                            <tr>
                                <th>Name</th>
                                <th>Course Name</th>
                                <th>Date Registered</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($course_registrations)
                                @foreach($course_registrations as $registration)
                                    <tr>
                                        <td>{{ $registration->user->name }}</td>
                                        <td>{{ $registration->course->name }}</td>
                                        <td>{{ $registration->created_at }}</td>
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
