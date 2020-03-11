@extends("tutor::layout.master")


@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">{{ $course->name }}</h3>
                        <a href="{{route('tutor.courses.index')}}" class="btn btn-dark float-right">Go Back</a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <td> Field</td>
                                    <td> Value </td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th> Course Name</th>
                                    <td> {{ $course->name }}</td>
                                </tr>
                                <tr>
                                    <th> Learning Link </th>
                                    <td><a href="{{ $course->learning_url }}">{{ $course->learning_url }}</a></td>
                                </tr>
                                <tr>
                                    <th> Summary </th>
                                    <td>{{ $course->summary }}</td>
                                </tr>

                                <tr>
                                    <th>Description</th>
                                    <td>{!! $course->description !!}</td>
                                </tr>
                                <tr>
                                    <th> Category </th>
                                    <td>{{ $course->course_category->name }}</td>
                                </tr>
                                <tr>
                                    <th>Course Default Photo </th>
                                    <td><img src="{{ $course->photo }}" alt="{{ $course->name }}"></td>
                                </tr>
                                <tr>
                                    <th>Course Type</th>
                                    <td> {{ $course->type }}</td>
                                </tr>
                                @if ($course->type === \GriffonTech\Course\Repositories\CourseRepository::PRO_MEMBER_PAID)
                                <tr>
                                    <th>Course Price in USD($)</th>
                                    <td> {{ $course->price }} </td>
                                </tr>
                                <tr>
                                    <th>Course Price in Referrals</th>
                                    <td> {{ $course->total_no_of_referrals_needed }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Status </th>
                                    <td>{{ ($course->status) ? 'Active' : 'UnActive' }}</td>
                                </tr>
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
@endsection
