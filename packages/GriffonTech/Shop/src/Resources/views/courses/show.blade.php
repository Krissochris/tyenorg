@extends("shop::layouts.master")


@section("content")

    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <br>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Home</a>
            </li>
            <li class="breadcrumb-item active">Course Details</li>
        </ol>

        @if (isset($course))

        <div class="container">
            <div class="row bg-dark" style="padding: 20px 0">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-img">
                            <img src="{{ asset('images/cover.jpeg') }}" class="card-img" alt="Course Image">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="card-title text-light"><h2>{{ $course->name }} </h2></div>
                        <h6 class="text-light"> {{ $course->summary }} </h6>
                        <div>
                            <span class="bg-warning text-dark" style="border-radius: 4px 4px 0 0; padding: 0px 10px"> Rating...</span>
                            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>

                            <p class="text-light">
                                @switch($course->type)
                                @case('free')
                                {{ __('Free') }}
                                @break
                                @case('pro_user_free')
                                {{ __('Pro user free') }}
                                @break
                                @case('pro_user_paid')
                                ${{ $course->price }}
                                @break
                                @default
                                {{''}}
                                @endswitch
                            </p>
                        </div>
                        <small class="text-light">Created By: <span class="text-muted"> {{ $course->tutor->name }} </span></small>
                        <div class="float-right">
                            @if (isset(auth('user')->user()->id) && isset($courseRegistered) )
                                <a class="btn btn-primary" href="{{ route('user.course.show', $course->url_key) }}"> View Course</a>
                            @else
                                @switch($course->type)
                                @case('free')
                                @case('pro_user_free')
                                <a class="btn btn-primary" href="{{ route('courses.join', $course->url_key) }}">Join Course</a>
                                @break
                                @case('pro_user_paid')
                                <a class="btn btn-primary" href="{{ route('courses.checkout', $course->url_key) }}">Purchase Course</a>
                                @break
                                @default
                                {{''}}
                                @endswitch
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"> Description </div>
                        <div class="card-body">
                            {!! $course->description !!}
                        </div>
                    </div>
                    <hr>
                </div>

            </div>
            <?php if ($course->tutor->tutor_profile) { $tutor = $course->tutor->tutor_profile; $tutor->name = $course->tutor->name;  } else {
                $tutor['name'] = $course->tutor->name;
            }
            ?>
            @include("shop::partials.courses.tutor_detail", ['tutor' => $tutor ])
            <hr>

{{--
            @include("shop::partials.courses.related_courses")
--}}
        </div>

        @endif


    </div>
@endsection