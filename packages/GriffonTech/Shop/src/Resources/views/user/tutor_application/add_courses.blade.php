@extends("shop::layouts.master")

@section('title')
    {{ __('Tutor Courses Form') }}
@stop

@section('content')
    <div class="container p-30">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left"> Tutor Courses Form </h3>
                    </div>
                    <div class="card-body">

                        <div class="">
                            <table class="table">
                                @foreach($tutorCourses as $course)
                                    <tr>
                                        <td>{{ $course->course_name }}</td>
                                        <td> {{ $course->course_expeirence_and_qualification }} </td>
                                        <td> {{ $course->how_well_can_u_tutor_course }} </td>
                                        <td> {{ $course->how_much_would_you_charge_per_student }} </td>
                                        <td> {{ ($course->would_you_be_willing_to_repeat_a_batch) ? 'Yes' : 'No' }} </td>
                                        <td> {{ ($course->do_you_agree_to_carry_student_along_after_batch_ends) ? 'Yes' : 'No' }} </td>
                                        <td> <a onclick=" event.preventDefault();
                                                        var confirm_remove = confirm('Are you sure you want to remove course ?');
                                                        if (confirm_remove) {
                                                            document.getElementById('{{$course->id}}').submit();
                                                        }
                                                        " class="text-danger" href="javascript:;"> Remove </a>
                                            <form method="POST" id="{{ $course->id }}" action="{{ route('user.tutor_application.delete_course', $course->id) }}">
                                                @csrf
                                                <input type="hidden" name="_method" value="delete">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                        {!! Form::open(['route' => 'user.tutor_application.add_courses']) !!}

                        <div style="margin-top: 30px;">
                            <h4> Courses You Would like To Teach </h4>


                            {!! Form::hidden('tutor_id', $tutorProfile->id) !!}
                            <div id="courses_to_teach" class="courses_to_teach">
                                <div id="course_1">
                                    <div class="form-group">
                                        {!! Form::label('courses[1][course_name]', 'Course Name') !!}
                                        {!! Form::text('courses[1][course_name]', null, ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('courses[1][course_experience_and_qualification]', 'Course Experience And Qualification') !!}
                                        {!! Form::text('courses[1][course_experience_and_qualification]', null, ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('courses[1][how_well_can_u_tutor_course]', 'How Well Can You Tutor This Course') !!}
                                        @for($num =1; $num <= 10; $num++)
                                            <input name="courses[1][how_well_can_u_tutor_course]" type="radio" value="{{ $num }}"> {{ $num }}
                                        @endfor
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('courses[1][how_much_would_you_charge_per_student]', 'How Much Would You Charge Per Student ($)') !!}
                                        {!! Form::number('courses[1][how_much_would_you_charge_per_student]', null, ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('courses[1][would_you_be_willing_to_repeat_a_batch]', 'Would You Be Willing To Repeat A Batch?') !!}
                                        <input name="courses[1][would_you_be_willing_to_repeat_a_batch]" type="radio" value="1">Yes
                                        <input name="courses[1][would_you_be_willing_to_repeat_a_batch]" type="radio" value="0">No
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('courses[1][do_you_agree_to_carry_student_along_after_batch_ends]', 'Do You Agree To Carry Students Along After Batch Ends?') !!}

                                        <input name="courses[1][do_you_agree_to_carry_student_along_after_batch_ends]" type="radio" value="1">Yes
                                        <input name="courses[1][do_you_agree_to_carry_student_along_after_batch_ends]" type="radio" value="0">No
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <a class="btn btn-primary" href="javascript:;" id="add_extra_course">+ add another course</a>

                            <button class="btn btn-success"> Save and Continue </button>
                        </div>

                        {!! Form::close() !!}
                        <a href="{{ route('user.tutor_application.create_agreement') }}"> << Go Back </a>
                        @if (!$tutorCourses->isEmpty())
                        <a class="pull-right" href="{{ route('user.tutor_application.preview') }}"> Preview and Submit</a>
                        @endif
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')
    <script>
        (function(){
            var number_of_courses = 2;

            $('#add_extra_course').click(function (event) {
                event.preventDefault();
                $.get("{{ route('user.tutor_application.new_course_form') }}?form_number="+number_of_courses, function (data, statusText) {
                    if (data && statusText === "success") {
                        $(data).appendTo('#courses_to_teach');
                        number_of_courses++;
                    }
                });

            });


        })();

    </script>
@endsection
