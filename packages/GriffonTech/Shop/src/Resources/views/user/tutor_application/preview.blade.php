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
                        <table class="table ">
                            <tr>
                                <td> Name </td>
                                <td> {{ $tutorProfile->name }} </td>
                            </tr>
                            <tr>
                                <td> Title </td>
                                <td> {{ $tutorProfile->title }} </td>
                            </tr>
                            <tr>
                                <td> Phone Number </td>
                                <td> {{ $tutorProfile->phone_number }} </td>
                            </tr>
                            <tr>
                                <td> Description </td>
                                <td> {{ $tutorProfile->description }} </td>
                            </tr>
                        </table>
                        <div class="">
                            <h4> Courses I Want To Teach </h4>
                            <table class="table">
                                @foreach($tutorCourses as $course)
                                    <tr>
                                        <td>{{ $course->course_name }}</td>
                                        <td> {{ $course->course_expeirence_and_qualification }} </td>
                                        <td> {{ $course->how_well_can_u_tutor_course }} </td>
                                        <td> {{ $course->how_much_would_you_charge_per_student }} </td>
                                        <td> {{ ($course->would_you_be_willing_to_repeat_a_batch) ? 'Yes' : 'No' }} </td>
                                        <td> {{ ($course->do_you_agree_to_carry_student_along_after_batch_ends) ? 'Yes' : 'No' }} </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        {!! Form::open(['route' => 'user.tutor_application.submit']) !!}

                        <label for="tos">
                            <input id="tos" type="checkbox" name="tos" value="true"> Yes I agree to the terms and conditions.
                        </label>

                        <div class="form-group">
                            <button class="btn btn-primary"> Submit Application </button>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
@endsection
