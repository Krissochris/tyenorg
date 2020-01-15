@extends("admin::layouts.master")

@section("content")
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="float-left"> {{ $course->name }} - {{ $course->tutor->name }} </h4>
                        <a href="{{route('admin.courses.index')}}" class="btn btn-dark float-right">Go Back</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered table-striped">
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
                                <td><img src="{{ $course->photo }}" alt="{{ $course->name }}"> </td>
                            </tr>
                            <tr>
                                <td>Video Link </td>
                                <td><a href="{{ $course->video_url }}"> {{ $course->video_url }} </a> </td>
                            </tr>

                            <tr>
                                <td> Status </td>
                                <td> {{ $course->status }} </td>
                            </tr>

                            </tbody>
                        </table>

{{--
                        {{ Display the tutor detials below  }}
--}}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
