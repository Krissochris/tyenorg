@extends("admin::layouts.master")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>{{ $course->name }} - {{ $course->tutor->name }}  </h5>
                    </div>
                    <div class="ibox-content table-responsive">

                        <table class="table table-hover table-bordered table-striped no-margins">
                            <thead class="thead-dark">
                            <tr>
                                <th>Field</th>
                                <th>Value</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td> Name:</td>
                                <td> {{ $course->name }}</td>
                            </tr>
                            <tr>
                                <td> Type :</td>
                                <td> {{ $course->type }}</td>
                            </tr>
                            <tr>
                                <td> Category :</td>
                                <td> {{ $course->course_category->name }}</td>
                            </tr>
                            <tr>
                                <td> Summary :</td>
                                <td> {{ $course->summary }}</td>
                            </tr>
                            <tr>
                                <td> Learning Url:</td>
                                <td> {{ $course->learning_url }}</td>
                            </tr>
                            <tr>
                                <td> Learning Url 2:</td>
                                <td> {{ $course->learning_url_2 }}</td>
                            </tr>
                            <tr>
                                <td> Description:</td>
                                <td> {!!  $course->description !!}</td>
                            </tr>
                            <tr>
                                <td> Total User in a Batch:</td>
                                <td> {{ $course->total_no_of_users_in_batch }}</td>
                            </tr>
                            @if ($course->type === \GriffonTech\Course\Repositories\CourseRepository::PRO_MEMBER_PAID)
                                <tr>
                                    <td> Price :</td>
                                    <td> {{ $course->price }}</td>
                                </tr>
                                <tr>
                                    <td> Number of Referrals :</td>
                                    <td> {{ $course->total_no_of_referrals_needed }}</td>
                                </tr>
                            @endif
                            <tr>
                                <td> Photo:</td>
                                <td><img src="{{ $course->photo }}" alt="{{ $course->name }}" width="300" height="200"> </td>
                            </tr>
                            <tr>
                                <td>Video Link </td>
                                <td><a href="{{ $course->video_url }}"> {{ $course->video_url }} </a> </td>
                            </tr>

                            <tr>
                                <td> Status </td>
                                <td> {{ ($course->status) ? 'Active' : 'Not Active' }} </td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                </div>


                <div class="ibox ">
                    <div class="ibox-title">
                        <h5> Course Batches  </h5>
                    </div>
                    <div class="ibox-content table-responsive">

                        <table class="table table-hover table-bordered table-striped no-margins">
                            <thead class="">
                            <tr>
                                <th>Id</th>
                                <th>No of Users In Batch</th>
                                <th>Maximum number of users needed</th>
                                <th>Entry Status</th>
                                <th>Is Taken</th>
                                <th>Time Completed</th>
                                <th>Status</th>
                                <th>Created On</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($course->course_batches)
                                @foreach($course->course_batches as $course_batch)
                                    <tr>
                                        <td>{{ $course_batch->id }}</td>
                                        <td>{{ $course_batch->no_of_users }}</td>
                                        <td>{{ $course_batch->maximum_number_of_users }}</td>
                                        <td>{{ ($course_batch->entry_status) ? 'Active' : 'UnActive' }}</td>
                                        <td>{{ ($course_batch->is_taken) ? 'Yes' : 'No' }}</td>
                                        <td>{{ $course_batch->time_completed }}</td>
                                        <td>{{ ($course_batch->status) ? 'Yes' : 'No' }}</td>
                                        <td>{{ $course_batch->created_at }}</td>
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                        </table>

                    </div>
                </div>




                <div class="ibox ">
                    <div class="ibox-title">
                        <h5> Course Registrations  </h5>
                    </div>
                    <div class="ibox-content table-responsive">

                        <table class="table table-hover table-bordered table-striped no-margins">
                            <thead class="">
                            <tr>
                                <th>Name</th>
                                <th>Date Registered</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if($course->course_registrations)
                                    @foreach($course->course_registrations as $registration)
                                        <tr>
                                            <td>{{ $registration->user->name }}</td>
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
