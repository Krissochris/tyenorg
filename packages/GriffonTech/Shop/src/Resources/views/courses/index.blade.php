@extends("shop::layouts.master")

@section('content')

    <!-- Breadcumb area start -->
    <section class="breadcumb_area" style="background-image: url({{ asset('lms/img/bg-pattern/breadcumb.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcumb_section">
                        <!-- Breadcumb page title start -->
                        <div class="page_title">
                            <h3>Courses</h3>
                        </div>
                        <!-- Breadcumb page pagination start -->
                        <div class="page_pagination">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                <li>Courses</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcumb area end -->

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

    <!-- ===================== Popular Courses Area Start ===================== -->
    <div class="popular_coureses_area all_courses grid_list section_padding_100" style="padding: 30px 0;">
        <div class="container">
            <div class="row">
                @if($courses && $courses->count() > 0)

                    @foreach($courses as $course)
                        <!-- Single Courses Area Start -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <!-- Single Courses Area Start -->
                                <div class="single_courses">
                                    <div class="single_courses_thumb">
                                        <div class="courses_badge">
                                            <span>New</span>
                                        </div>
                                        <img src="{{ $course->photo }}" alt="{{ $course->name }}">
                                    </div>
                                    <div class="single_courses_desc">
                                        <div class="title">
                                            <a href="{{ route('courses.show', $course->url_key) }}">{{ $course->name }} </a>
                                            <p>{{ $course->summary }}</p>
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
                            </div>
                            <!-- Single Courses Area End -->
                    @endforeach

                    @else
                        <div class="col-lg-12 col-md-12 col-sm-12 mb-4 text-center">
                            <h4> No courses found!</h4>
                        </div>
                @endif


            </div>
        </div>

    </div>
    <!-- ===================== Popular Courses Area End ===================== -->

@endsection
