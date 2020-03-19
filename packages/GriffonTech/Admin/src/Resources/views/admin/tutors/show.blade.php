@extends("admin::layouts.master")

@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Tutors </h5>
                </div>
                <div class="ibox-content table-responsive">

                    <div class="row">
                        <div class="col-md-2">
                            @if($tutor->photo)
                                <img src="{{ $tutor->photo }}" class="card-img" alt="{{ $tutor->name }}">
                            @else
                                <img src="{{ asset('images/26238.png')}}" class="card-img" alt="{{ $tutor->name }}">
                            @endif
                            <div class="card-footer">
                                <a href="#">
                                    <button class="btn btn-dark text-center"><i class="fa fa-envelope-open-text"></i> Message</button>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <table class="table table-hover table-bordered table-striped">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Field</th>
                                    <th>Value</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Full Name:</td>
                                    <td> {{ $tutor->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Title</td>
                                    <td> {{ $tutor->title }}</td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td> {{ $tutor->email }} </td>
                                </tr>
                                <tr>
                                    <td>Phone Number:</td>
                                    <td> {{ $tutor->phone }} </td>
                                </tr>
                                <tr>
                                    <td> Description :</td>
                                    <td> {{ $tutor->description }} </td>
                                </tr>

                                <tr>
                                    <td> Created On:</td>
                                    <td> {{ $tutor->created_at }}</td>
                                </tr>
                                <tr>
                                    <td> Wallet Balance </td>
                                    <td> ${{ number_format($tutor->amount_balance, 2) }}</td>
                                </tr>
                                <tr>
                                    <td> Total Earned Amount</td>
                                    <td> ${{ number_format($tutor->total_earned_amount, 2) }}</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Tutor Courses </h5>
                </div>
                <div class="ibox-content table-responsive">
                    @if($tutor->courses)
                        <table class="table">
                            <thead>
                            <tr>
                                <td>Name</td>
                                <td>Type</td>
                                <td>Price</td>
                                <td>Status</td>
                                <td>Registered On</td>
                                <td>Batches</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tutor->courses as $course)
                                <tr>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->type }}</td>
                                    <td>{{ $course->price }}</td>
                                    <td>{{ $course->status }}</td>
                                    <td>{{ $course->created_at }}</td>
                                    <td>{{ $course->course_batches->count() }}</td>
                                    <td>
                                        <a href="{{ route('admin.courses.show', $course->id) }}">view</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    @endif
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Applied Courses </h5>
                </div>
                <div class="ibox-content table-responsive">
                    @if($tutor->application_courses)
                        @foreach($tutor->application_courses as $applied_course)
                            <table class="table table-bordered">
                                <tr>
                                    <th> Course Name </th>
                                    <td> {{ $applied_course->course_name }} </td>
                                </tr>
                                <tr>
                                    <th>Course Experience and Qualification</th>
                                    <td> {{ $applied_course->course_experience_and_qualification }}</td>
                                </tr>
                                <tr>
                                    <th>How well can you tutor this course</th>
                                    <td> {{ $applied_course->how_well_can_u_tutor_course }} (1 - 10) </td>
                                </tr>
                                <tr>
                                    <th>How much would you charge per student ?</th>
                                    <td>${{ $applied_course->how_much_would_you_charge_per_student }}</td>
                                </tr>
                                <tr>
                                    <th>Would you be willing to repeat a batch</th>
                                    <td>{{ ($applied_course->would_you_be_willing_to_repeat_a_batch) ? 'Yes' : 'No' }}</td>
                                </tr>
                                <tr>
                                    <th>Do you agree to students along after batch ends ?</th>
                                    <td>{{ ($applied_course->do_you_agree_to_carry_student_along_after_batch_ends) ? 'Yes' : 'No' }}</td>
                                </tr>
                            </table>
                        @endforeach

                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection
