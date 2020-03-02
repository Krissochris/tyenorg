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
                       {{ $course->description }}
                    </div>

                    <!-- Tutor Details -->
                    <div class="courses_description m-bottom-50">
                        <h5>Tutor Detail</h5>
                    </div>
                    @include("shop::partials.courses.tutor_detail", ['tutor' => $course->tutor ])

                    <!-- Courses Description -->
                    <div class="courses_description m-bottom-50">
                        <h5>Related Courses</h5>
                    </div>

                    <!-- Single Courses Area Start -->
                    <div class="row">
                        <!-- Single Courses Area Start -->
                        <div class="col-12 col-lg-6">
                            <!-- Single Courses Area Start -->
                            <div class="single_courses">
                                <div class="single_courses_thumb">
                                    <div class="courses_badge">
                                        <span>New</span>
                                    </div>
                                    <img src="img/course-img/c-3.jpg" alt="">
                                </div>
                                <div class="single_courses_desc">
                                    <div class="title">
                                        <a href="#">Introduction to Family Engagement in Education</a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, excepturi!</p>
                                    </div>
                                    <div class="price_rating_area d-flex align-items-center">
                                        <div class="price w-50">
                                            <span>$199</span>
                                        </div>
                                        <div class="rating text-right w-50">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                            <span>(4 Vote)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Courses Area Start -->
                        <div class="col-12 col-lg-6">
                            <!-- Single Courses Area Start -->
                            <div class="single_courses">
                                <div class="single_courses_thumb">
                                    <div class="courses_badge">
                                        <span>-25%</span>
                                    </div>
                                    <img src="img/course-img/c-4.jpg" alt="">
                                </div>
                                <div class="single_courses_desc">
                                    <div class="title">
                                        <a href="#">Introduction to Family Engagement in Education</a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, excepturi!</p>
                                    </div>
                                    <div class="price_rating_area d-flex align-items-center">
                                        <div class="price w-50">
                                            <span>$199</span>
                                        </div>
                                        <div class="rating text-right w-50">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                            <span>(4 Vote)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Courses Area End -->
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
                                        <p>1500 Seats</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <video width="320" height="240" controls class="embed-responsive">
                                        <source src="movie.mp4" type="video/mp4">
                                        <source src="movie.ogg" type="video/ogg">
                                        Your browser does not support the video tag.
                                    </video>
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
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </div>
                                <div class="single_share_link">
                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
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
                            <img src="{{ $course->photo }}" class="img-fluid" style="max-height: 200px; width: 100%" alt="Course Image">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="card-title text-light"><h2>{{ $course->name }} </h2></div>
                        <h6 class="text-light"> {{ $course->summary }} </h6>
                        <div>
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
                        <small class="text-light">Created By: <span class="text-light"> {{ $course->tutor->name }} </span></small>
                        <div class="float-right">
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
                    </div>
                </div>
            </div>
            <hr>
            <div class="clearfix">
                <div class="float-right col-sm-4">
                    <video width="320" height="240" controls class="embed-responsive">
                        <source src="movie.mp4" type="video/mp4">
                        <source src="movie.ogg" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>
                    <hr>
                </div >

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"> Description </div>
                        <div class="card-body">
                            {!! $course->description !!}
                        </div>
                    </div>
                    <hr>
                </div>

            <?php if ($course->tutor->tutor_profile) { $tutor = $course->tutor->tutor_profile; $tutor->name = $course->tutor->name;  } else {
                $tutor['name'] = $course->tutor->name;
            }
            ?>
            @include("shop::partials.courses.tutor_detail", ['tutor' => $tutor ])
            </div>
            <hr>

{{--
            @include("shop::partials.courses.related_courses")
--}}
        </div>

        @endif


    </div>
@endsection
