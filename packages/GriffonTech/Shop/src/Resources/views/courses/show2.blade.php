@extends("shop::layouts.master")


@section("content")

    <!-- Breadcumb area start -->
    <section class="breadcumb_area" style="background-image: url({{ asset('lms/img/bg-pattern/breadcumb.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcumb_section">
                        <!-- Breadcumb page title start -->
                        <div class="page_title">
                            <h3> {{ $course->name }} </h3>
                        </div>
                        <!-- Breadcumb page pagination start -->
                        <div class="page_pagination">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                <li>Course Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcumb area end -->

    <!-- ============================== Courses Details Area Start ============================== -->
    <section class="courses_details_area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-8">

                    <!-- Courses Details Thumb Area Start -->
                    <div class="courses_details_thumb">
                        <img src="{{ asset('lms/img/course-img/event-details.jpg') }}" alt="">
                        <!-- Courses Details Thumb Caption Area Start -->
                    </div>
                    <!-- Courses Details Thumb Area End -->
                    <div style="margin-bottom: 30px;">
                        @if (isset(auth('user')->user()->id) && (isset($course->is_registered) && $course->is_registered === true) )
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


                    <!-- Courses Overview -->
                    <div class="courses_overview">
                        <h5>Courses Overview</h5>
                    </div>

                    <!-- Courses Overview Content -->
                    <div class="couress_overview_content">
                        <p>
                            {{ $course->summary }}
                        </p>
                    </div>

                    <!-- Courses Description -->
                    <div class="courses_description">
                        <h5>Course Description</h5>
                    </div>

                    <!-- Courses Description Content -->
                    <div class="courses_description_content">
                       {!! $course->description !!}
                    </div>

                    <!-- Tutor Details -->
                    <div class="courses_description m-bottom-50">
                        <h5>Tutor Detail</h5>
                    </div>
                    @include("shop::partials.courses.tutor_detail", ['tutor' => $course->tutor ])

                    <div class="courses_description m-bottom-50">
                        <h5>Reviews</h5>
                    </div>
                    @if($course->course_reviews)

                    <div class="testimonial_slides">
                        @foreach($course->course_reviews as $course_review)
                            <div class="single_testimonial text-center">
                                <div class="testimonial_text">
                                    <p>{{ $course_review->review }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endif

                </div>

                <!-- ==================== Sidebar Area Start ==================== -->
                <div class="col-12 col-md-5 col-lg-4">
                    <div class="sidebar_area">

                        <!-- Single Sidebar Content Start -->
                        <div class="single_sidebar_content">
                            <div class="row">

                                <!-- Single Option -->
                                <div class="col-6 clearfix">
                                    <div class="single_option clearfix">
                                        <i class="fa fa-usd" aria-hidden="true"></i>
                                        <p>Fee:</p>
                                        @switch($course->type)
                                            @case('free')
                                            <p>{{ __('Free') }}</p>
                                            @break
                                            @case('pro_user_free')
                                            <p>{{ __('Pro user free') }}</p>
                                            @break
                                            @case('pro_user_paid')
                                            <p>${{ $course->price }}</p>
                                            @break
                                            @default
                                            {{''}}
                                        @endswitch
                                    </div>
                                </div>

                                <!-- Single Option -->
                                <div class="col-6 clearfix">
                                    <div class="single_option clearfix">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                        <p>Total Batches:</p>
                                        <p>{{ $course->course_batches->count() }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    @if ($course->video_url)
                                        <iframe width="420" height="315"
                                                src="{{ $course->video_url }}">
                                        </iframe>
                                    @else
                                        <video width="320" height="240" controls class="embed-responsive">
                                            <source src="movie.mp4" type="video/mp4">
                                            <source src="movie.ogg" type="video/ogg">
                                            Your browser does not support the video tag.
                                        </video>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <!-- Single Sidebar Content End -->

                        <!-- Single Sidebar Content Start -->
                        <div class="single_sidebar_content">
                            <!-- Event Share Links -->
                            <div class="event_share_links">
                                <div class="single_share_link">
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </div>
                                <div class="single_share_link">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('courses.show', $course->url_key) }}" target="_blank">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Sidebar Content End -->
                    </div>
                </div>
                <!-- Sidebar Area End -->
            </div>
        </div>
    </section>
    <!-- =============== Courses Details Area End =============== -->
@endsection
