@extends('admin::layouts.master')

@section('title')
    Tutor Application Review
@stop

@section('content')

    <div class="row">
        <div class="col-lg-12" style="margin-bottom: 10px;">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>New Tutor Application Details</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content table-responsive">
                    <h5> Tutor Personal Detail </h5>
                    <table class="table table-bordered">
                        <tr>
                            <td>Name</td>
                            <td>{{ $tutor_application_submission->tutor_application->name }}</td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td>{{ $tutor_application_submission->tutor_application->title }}</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>{{ $tutor_application_submission->tutor_application->phone }}</td>
                        </tr>
                        <tr>
                            <td>About Me</td>
                            <td>{{ $tutor_application_submission->tutor_application->description }}</td>
                        </tr>
                    </table>



                  {{--  <h4> Courses To Tutor </h4>
                    @if($tutor_application->tutor_application->tutor_application_courses)

                        @foreach($tutor_application->tutor_application->tutor_application_courses as $course)
                            <table class="table table-bordered">
                                <tr>
                                    <td>Course Name</td>
                                    <td>{{ $course->course_name }}</td>
                                </tr>
                                <tr>
                                    <td>Experience and qualification</td>
                                    <td>{{ $course->course_experience_and_qualification }}</td>
                                </tr>
                                <tr>
                                    <td>How well can you tutor this course (1-10)</td>
                                    <td>{{ $course->how_well_can_u_tutor_course }}</td>
                                </tr>
                                <tr>
                                    <td>How much would you charge per student </td>
                                    <td>${{ $course->how_much_would_you_charge_per_student }}</td>
                                </tr>
                                <tr>
                                    <td>Would you be willing to repeat a batch</td>
                                    <td>{{ ($course->would_you_be_willing_to_repeat_a_batch) ? 'Yes' : 'No' }}</td>
                                </tr>
                                <tr>
                                    <td>Do you agree to carry students along after batch ends</td>
                                    <td>{{ ($course->do_you_agree_to_carry_student_along_after_batch_ends) ? 'Yes' : 'No' }}</td>
                                </tr>
                            </table>
                        @endforeach
                    @endif
--}}




                    <div>
                        <h5> Tutor Agreement </h5>
                        @if(isset($tutor_agreement))
                            <table class="table table-bordered">
                                @foreach($agreement_attributes as $attribute)
                                    <tr>
                                        <th> {{ $attribute->admin_name }} </th>
                                        @if($attribute->type === 'boolean')

                                            <td> {{ ($tutor_agreement[$attribute->code]) ? 'Yes' : 'No' }} </td>

                                        @elseif($attribute->type === 'select')

                                            <td>
                                                @if($tutor_agreement[$attribute->code])
                                                    {{ @$attribute->options()->pluck('admin_name', 'id')->toArray()[$tutor_agreement[$attribute->code]] }}
                                                @else
                                                    {{ 'Not option selected' }}
                                                @endif
                                            </td>
                                        @else
                                            <td> {{ $tutor_agreement[$attribute->code] }} </td>
                                        @endif
                                    </tr>
                                @endforeach

                            </table>
                        @endif
                    </div>

                    <div>
                        <form method="POST" id="approve" action="{{ route('admin.tutor_application_submissions.approve', $tutor_application_submission->id) }}">
                            @csrf
                        </form>
                        <form method="POST" id="reject" action="{{ route('admin.tutor_application_submissions.reject', $tutor_application_submission->id) }}">
                            @csrf
                        </form>
                        <button onclick="event.preventDefault();
                                        var confirmAccept = confirm('Are you you want to accept this application');
                                        if (confirmAccept) {
                                            document.getElementById('approve').submit();
                                        }
                                        " class="btn btn-success">Approve</button>


                        <button onclick="event.preventDefault();
                                        var confirmAccept = confirm('Are you you want to reject this application');
                                        if (confirmAccept) {
                                            document.getElementById('reject').submit();
                                        }
                                        "
                                class="btn btn-danger">Reject</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
