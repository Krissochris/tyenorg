@extends('shop::layouts.master')

@section('content')
<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <br>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/">Home</a>
        </li>
        <li class="breadcrumb-item active">Course Details</li>
    </ol>

    @if(isset($course))
        <div class="container">
            <div class="row bg-dark" style="padding: 20px 0;">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-img">
                            <img src="{{ asset("images/cover.jpeg") }}" class="card-img" alt="Course Image">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="card-title text-light"><h2> {{ $course->name }} </h2></div>
                        <h6 class="text-light"> {{ $course->summary }} </h6>
                        <div>
                            <span class="bg-warning text-dark" style="border-radius: 0 8px 8px 0; padding: 2px 10px"> Rating...</span>
                            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                        </div>
                        <small class="text-light">Created By: <span class="text-muted">Anderson Mike </span></small>
                        <small class="text-light">Purchased On: <span class="text-muted"> {{ $courseRegistration->created_at }} </span></small>

                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header"> Course Batch </div>
                        <div class="card-body">
                            <ul class="list-group col-lg-12">
                                <li class="list-group-item"> course learning link : <a href="#">{{ $course->learning_url }} </a> </li>
                                <li class="list-group-item"> No of Users : {{ $courseRegistration->course_batch->no_of_users }}  </li>
                                <li class="list-group-item"> Maximum Number of Users : {{ $courseRegistration->course_batch->maximum_number_of_users }}  </li>
                                <li class="list-group-item"> Is Taken : {{ ($courseRegistration->course_batch->is_taken) ? 'Yes' : 'No' }} </li>
                                <li class="list-group-item"> Course Completed on: {{ ($courseRegistration->course_batch->time_completed) ? $courseRegistration->course_batch->time_completed : 'Not Yet' }} </li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"> Course Details </div>
                        <div class="card-body">
                            <ul>
                                <li>Make REAL web applications using cutting-edge technologies</li>
                                <li>Write your own browser-based game</li>
                                <li>Create complex HTML forms with validations</li>
                                <li>Make REAL web applications using cutting-edge technologies</li>
                                <li>Write your own browser-based game</li>
                                <li>Create complex HTML forms with validations</li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>

            <?php if ($course->tutor->tutor_profile) { $tutor = $course->tutor->tutor_profile; $tutor->name = $course->tutor->name;  } else {
                $tutor['name'] = $course->tutor->name;
            }
            ?>
            @include("shop::partials.courses.tutor_detail", ['tutor' => $tutor])
            <hr>

{{--
            @include("shop::partials.courses.related_courses")
--}}

        </div>


    @endif

</div>
<!-- /.container -->
@endsection