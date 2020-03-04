@extends('shop::layouts.master')

@section('content')
    <!-- Breadcumb area start -->
    <section class="breadcumb_area" style="background-image: url({{ asset('lms/img/bg-pattern/breadcumb.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcumb_section">
                        <!-- Breadcumb page title start -->
                        <div class="page_title">
                            <h3>My Courses</h3>
                        </div>
                        <!-- Breadcumb page pagination start -->
                        <div class="page_pagination">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                <li>My Courses</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcumb area end -->

    <!-- ===================== Popular Courses Area Start ===================== -->
    <div class="popular_coureses_area all_courses grid_list section_padding_100">
        <div class="container">

            @if(!auth('user')->user()->is_pro_user)
                <div class="alert alert-success">
                    Become a pro member to enjoy the full benefits of this system. Click <a href="#">Here</a> to become a pro member
                </div>
            @endif

            <div class="row">

                @if($courses)

                    @foreach($courses as $course)
                        <!-- Single Courses Area Start -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <!-- Single Courses Area Start -->
                                <div class="single_courses">
                                    <div class="single_courses_thumb">
                                        <img src="{{ $course->photo }}" alt="{{ $course->name }}">
                                    </div>
                                    <div class="single_courses_desc">
                                        <div class="title">
                                            <a href="{{ route('user.course.show', $course->url_key) }}">Introduction to Family Engagement in Education</a>
                                            <p>{{ $course->summary }}</p>
                                        </div>
                                        <div class="price_rating_area d-flex align-items-center">
                                            <div class="rating w-50">
                                                @if($course->course_average_rating )
                                                    @for($num = 1; $num <= 5; $num++)
                                                        @if($num <= $course->course_average_rating)
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        @else
                                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                                        @endif
                                                    @endfor

                                                <span>({{ $course->total_reviews }} Review)</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Courses Area End -->
                    @endforeach

                @endif

            </div>
        </div>
    </div>
    <!-- ===================== Popular Courses Area End ===================== -->

@endsection
