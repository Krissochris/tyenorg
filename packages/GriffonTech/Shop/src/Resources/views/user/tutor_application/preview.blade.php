@extends("shop::layouts.master")

@section('title')
    {{ __('Tutor Application Form Preview') }}
@stop

@section('content')
    <div class="container section_padding_100">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left"> Tutor Application Form Preview </h3>
                    </div>
                    <div class="card-body">
                        <table class="table">

                            <tr>
                                <td> Name </td>
                                <td> {{ $tutorApplication->name }} </td>
                            </tr>
                            <tr>
                                <td> Title </td>
                                <td> {{ $tutorApplication->title }} </td>
                            </tr>
                            <tr>
                                <td> Phone Number </td>
                                <td> {{ $tutorApplication->phone }} </td>
                            </tr>
                            <tr>
                                <td> Description </td>
                                <td> {{ $tutorApplication->description }} </td>
                            </tr>
                        </table>
                        <div class="">
                            <h4> Courses I Want To Teach </h4>
                            @foreach($tutorCourses as $course)
                            <table class="table table-bordered">
                                <tr>
                                    <td>Course Name</td>
                                    <td>{{ $course->course_name }}</td>
                                </tr>
                                <tr>
                                    <td>Course Experience and Qualification</td>
                                    <td>{{ $course->course_experience_and_qualification }}</td>
                                </tr>
                                <tr>
                                    <td>How well can you tutor course</td>
                                    <td>{{ $course->how_well_can_u_tutor_course }}</td>
                                </tr>
                                <tr>
                                    <td>How much would you charge per student</td>
                                    <td>{{ $course->how_much_would_you_charge_per_student }}</td>
                                </tr>
                                <tr>
                                    <td>Would you be willing to repeat a batch</td>
                                    <td>{{ ($course->would_you_be_willing_to_repeat_a_batch) ? 'Yes' : 'No' }}</td>
                                </tr>
                                <tr>
                                    <td>Do you agree to carry students along after batch ends?</td>
                                    <td>{{ ($course->do_you_agree_to_carry_student_along_after_batch_ends) ? 'Yes' : 'No' }}</td>
                                </tr>
                            </table>
                            @endforeach
                        </div>
                        <div>
                            <a class="btn btn-default" href="{{ route('user.tutor_application.add_courses') }}">Go Back to add courses</a>
                        </div>
                        <div style="margin-top: 20px;">
                            {!! Form::open(['route' => 'user.tutor_application.submit']) !!}

                            <label for="tos">
                                <input id="tos" type="checkbox" name="term_and_service_agreement" value="true"> Yes I agree to the terms and conditions.
                            </label>

                            <div class="form-group float-right">
                                <button class="btn btn-primary"> Submit Application </button>
                            </div>

                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
@endsection
