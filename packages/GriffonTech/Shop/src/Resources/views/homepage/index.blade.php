@extends('shop::layouts.master')



@section('content')

    <!-- ===================== Welcome Area Start ===================== -->
    <section class="welcome_area clearfix" id="home">
        <div class="welcome_slides">
            <!-- Single Slide -->
            <div class="single_slide text-center" style="background-image: url({{ asset('lms/img/bg-pattern/edu-1.jpg') }});">
                <div class="slide_text">
                    <div class="table">
                        <div class="table_cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <h2 data-animation="fadeInUp" data-delay="200ms" data-duration="500ms">Taking the lead for education quality</h2>
                                        <p data-animation="fadeInUp" data-delay="500ms" data-duration="500ms">Educating the mind without educating the heart is no education at all.</p>
                                        <a href="#" class="btn welcome-btn" data-animation="fadeInUp" data-delay="800ms" data-duration="500ms">Start A Course <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Slide -->
            <div class="single_slide text-center" style="background-image: url({{ asset('lms/img/bg-pattern/edu-2.jpg') }});">
                <div class="slide_text">
                    <div class="table">
                        <div class="table_cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <h2 data-animation="fadeInUp" data-delay="200ms" data-duration="500ms">The number one source for education</h2>
                                        <p data-animation="fadeInUp" data-delay="500ms" data-duration="500ms">Education is the most powerful weapon which you can use to change the world.</p>
                                        <a href="#" class="btn welcome-btn" data-animation="fadeInUp" data-delay="800ms" data-duration="500ms">Learn More <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Slide -->
            <div class="single_slide text-center" style="background-image: url({{ asset('lms/img/bg-pattern/edu-1.jpg') }});">
                <div class="slide_text">
                    <div class="table">
                        <div class="table_cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <h2 data-animation="fadeInUp" data-delay="200ms" data-duration="500ms">Taking the lead for education quality</h2>
                                        <p data-animation="fadeInUp" data-delay="500ms" data-duration="500ms">Educating the mind without educating the heart is no education at all.</p>
                                        <a href="#" class="btn welcome-btn" data-animation="fadeInUp" data-delay="800ms" data-duration="500ms">Start A Course <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Slide -->
            <div class="single_slide text-center" style="background-image: url({{ asset('lms/img/bg-pattern/edu-2.jpg') }});">
                <div class="slide_text">
                    <div class="table">
                        <div class="table_cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <h2 data-animation="fadeInUp" data-delay="200ms" data-duration="500ms">The number one source for education</h2>
                                        <p data-animation="fadeInUp" data-delay="500ms" data-duration="500ms">Education is the most powerful weapon which you can use to change the world.</p>
                                        <a href="#" class="btn welcome-btn" data-animation="fadeInUp" data-delay="800ms" data-duration="500ms">Learn More <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===================== Welcome Area End ===================== -->

    <!-- ===================== Search Courses Area Start ===================== -->
    <div class="search_courses_area section_padding_100" style="padding: 20px 0; ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Search Text -->
                    <div class="search_text">
                        <h2>Search For Courses</h2>
                        <p>search for your favorite courses.</p>
                    </div>
                    <!-- Search Form -->
                    <div class="search_form">
                        {!! Form::open(['route' => 'courses.index', 'method' => 'GET']) !!}
                            <div class="form-row">
                                <div class="form-group col-12 col-md-10">
                                    <input name="_q" type="text" class="form-control keyword" value="{{ request()->query('_q') }}" placeholder="Type your keywords">
                                </div>
                                <div class="form-group col-12 col-md-2">
                                    <button type="submit" class="btn submit-btn btn-primary w-100">Search</button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ===================== Search Courses Area End ===================== -->

    <!-- ===================== Awesome Feature Area Start ===================== -->
    <section class="awesome_features_area clearfix">
        <!-- Single Feature Area Start -->
        <div class="single_feature">
            <div class="feature_img">
                <i class="icon-genius" aria-hidden="true"></i>
            </div>
            <div class="feature_text">
                <h5>Effective Courses</h5>
            </div>
        </div>
        <!-- Single Feature Area Start -->
        <div class="single_feature">
            <div class="feature_img">
                <i class="icon-profile-male" aria-hidden="true"></i>
            </div>
            <div class="feature_text">
                <h5>Best Teachers</h5>
            </div>
        </div>
        <!-- Single Feature Area Start -->
        <div class="single_feature">
            <div class="feature_img">
                <i class="icon-compass" aria-hidden="true"></i>
            </div>
            <div class="feature_text">
                <h5>Practical Classes</h5>
            </div>
        </div>
        <!-- Single Feature Area Start -->
        <div class="single_feature">
            <div class="feature_img">
                <i class="icon-gift" aria-hidden="true"></i>
            </div>
            <div class="feature_text">
                <h5>Organised Classroom</h5>
            </div>
        </div>
    </section>
    <!-- ===================== Awesome Feature Area End ===================== -->

    <!-- ===================== Popular Courses Area Start ===================== -->
    <section class="popular_coureses_area section_padding_100_70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading Area Start -->
                    <div class="section_heading">
                        <h2>Discover Our Popular Courses</h2>
                        <p>
                            Take a look at our most popular courses.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="popular_coureses_slides">
                        @if(isset($courses))

                            @foreach($courses as $course)
                                <!-- Single Courses Area Start -->
                                <div class="single_courses">
                                        <div class="single_courses_thumb">
                                            <div class="courses_badge">
                                                <span>New</span>
                                            </div>
                                            <img src="{{ $course->photo  }}" alt="{{ $course->name }}">
                                        </div>
                                        <div class="single_courses_desc">
                                            <div class="title">
                                                <a href="{{ route('courses.show', $course->url_key) }}">{{ $course->name }} </a>
                                                <p>{{ $course->summary }} </p>
                                            </div>
                                            <div class="price_rating_area d-flex align-items-center">
                                                <div class="price w-50">
                                                    @switch($course->type)
                                                        @case('free')
                                                        <span>{{ __('Free') }}</span>
                                                        @break
                                                        @case('pro_user_free')
                                                        <span>{{ __('Pro user free') }}</span>
                                                        @break
                                                        @case('pro_user_paid')
                                                        <span>${{ $course->price }}</span> or <span>{{ $course->total_no_of_referrals_needed }} Referrals</span>
                                                        @break
                                                        @default
                                                        {{''}}
                                                    @endswitch
                                                </div>
                                                <div class="rating text-right w-50">
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
                            @endforeach
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ===================== Popular Courses Area End ===================== -->

    <!-- ===================== About Us Area Start ===================== -->
    <div class="about_us_area clearfix">
        <div class="single_about_us">
            <div class="about_us_image d-inline-block float-left w-50 item" style="background-image: url({{ asset('lms/img/bg-pattern/about-us.jpg') }});">
                <!-- Video Area Start -->
                <div class="video_play_area">
                    <div class="video_play_button" id="video">
                        <a href="http://www.youtube.com/watch?v=0O2aH4XLbto" class="video_btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="about_us_content d-inline-block w-50 item">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>About TYEN Learning Platform</h2>
                            <p>
                                TYEN learning platform is the best place to learn.
                            </p>
                            <div class="single_service_area d-flex">
                                <div class="single_service">
                                    <i class="icon-linegraph" aria-hidden="true"></i>
                                    <h6 class="mb-0">Highest Rated</h6>
                                </div>
                                <div class="single_service">
                                    <i class="icon-presentation" aria-hidden="true"></i>
                                    <h6 class="mb-0">Online Training</h6>
                                </div>
                                <div class="single_service">
                                    <i class="icon-layers" aria-hidden="true"></i>
                                    <h6 class="mb-0">Large e-library</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ===================== About Us Area End ===================== -->

    <!-- ===================== Cool Facts Area Start ===================== -->
    <div class="cool_facts_area bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-4 col-md">
                    <!-- Single Cool Facts area Start -->
                    <div class="cool_fact_text">
                        <i class="icon-gift" aria-hidden="true"></i>
                        <h3><span class="counter">47</span></h3>
                        <h4>Free Courses</h4>
                    </div>
                    <!-- Single Cool Facts area End -->
                </div>

                <div class="col-12 col-sm-4 col-md">
                    <!-- Single Cool Facts area Start -->
                    <div class="cool_fact_text">
                        <i class="icon-profile-male" aria-hidden="true"></i>
                        <h3><span class="counter">105</span></h3>
                        <h4>Teachers</h4>
                    </div>
                    <!-- Single Cool Facts area End -->
                </div>

                <div class="col-12 col-sm-4 col-md">
                    <!-- Single Cool Facts area Start -->
                    <div class="cool_fact_text">
                        <i class="icon-lightbulb" aria-hidden="true"></i>
                        <h3><span class="counter">5</span>k+</h3>
                        <h4>Graduates</h4>
                    </div>
                    <!-- Single Cool Facts area End -->
                </div>

                <div class="col-12 col-sm-4 col-md">
                    <!-- Single Cool Facts area Start -->
                    <div class="cool_fact_text">
                        <i class="icon-happy" aria-hidden="true"></i>
                        <h3><span class="counter">953</span></h3>
                        <h4>Happy Students</h4>
                    </div>
                    <!-- Single Cool Facts area End -->
                </div>

                <div class="col-12 col-sm-4 col-md">
                    <!-- Single Cool Facts area Start -->
                    <div class="cool_fact_text">
                        <i class="icon-trophy" aria-hidden="true"></i>
                        <h3><span class="counter">21</span></h3>
                        <h4>Awards</h4>
                    </div>
                    <!-- Single Cool Facts area End -->
                </div>

            </div>
        </div>
    </div>
    <!-- ===================== Cool Facts Area End ===================== -->



    <!-- ===================== Blog Area Start ===================== -->
    <section class="blog_area section_padding_100_70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading Area Start -->
                    <div class="section_heading">
                        <h2>Latest Articles</h2>
                        <p> Checkout our latest blog posts </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @if($blogPosts)
                    @foreach($blogPosts as $post)

                        <!-- single latest news area start -->
                            <div class="col-lg-4 col-12 col-md-6">
                                <div class="single_latest_news_area">
                                    <!-- single latest news thumb -->
                                    <div class="single_latest_news_img_area">
                                        <img src="{{ $post->photo }}" alt="{{ $post->title }}">
                                        <!-- single latest news published date -->
                                        <div class="published_date">
                                            <p class="date">{{ $post->created_at->format('d') }}</p>
                                            <p class="month">{{ $post->created_at->format('M') }}</p>
                                        </div>
                                    </div>
                                    <div class="single_latest_news_text_area">
                                        <!-- single latest news title -->
                                        <div class="news_title">
                                            <a href="#"> {{ $post->title }} </a>
                                        </div>
                                        <!-- single latest news excerp -->
                                        <div class="news_content">
                                            <p>
                                                {!! (strlen($post->body) > 70) ? substr($post->body, 0, 70)."<b> (&hellip;)</b>  <br> " : $post->body !!}
                                            </p>
                                            <a href="{{route('blog.posts.show', $post->url_key)}}" class="btn blog-btn">Read More <i class="fa fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach

                @endif

            </div>
        </div>
    </section>
    <!-- ===================== Blog Area End ===================== -->

    <!-- ===================== Testimonial Area Start ===================== -->
    <section class="testimonial_area section_padding_100 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testimonial_slides">
                        @if (isset($testimonies))

                            @foreach($testimonies as $testimony)
                                <div class="single_testimonial text-center">
                                    <div class="testimonial_text">
                                        <p>{{ $testimony->testimony }}</p>
                                        <h5> {{ $testimony->user->name }} </h5>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===================== Testimonial Area End ===================== -->

    <!-- ===================== Download App Area Start ===================== -->
    <div class="download_app_area section_padding_100" style="background-image: url({{ asset('lms/img/bg-pattern/about-us-1.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 ml-md-auto">
                    <div class="download_app_content">
                        <h2>Access your courses anytime anywhere.</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ===================== Download App Area End ===================== -->

@endsection
