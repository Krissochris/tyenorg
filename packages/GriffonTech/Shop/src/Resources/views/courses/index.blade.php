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
                        <form action="#" method="get">
                            <div class="form-row">
                                <div class="form-group col-12 col-md-7">
                                    <input type="text" class="form-control keyword" placeholder="Type your keywords">
                                </div>
                                <div class="form-group col-12 col-md-3">
                                    <select class="custom-select options w-100">
                                        <option selected>Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-md-2">
                                    <button type="submit" class="btn submit-btn btn-primary w-100">Search</button>
                                </div>
                            </div>
                        </form>
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

                @if($courses && !empty($courses))

                    @foreach($courses as $course)
                        <!-- Single Courses Area Start -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <!-- Single Courses Area Start -->
                                <div class="single_courses">
                                    <div class="single_courses_thumb">
                                        <div class="courses_badge">
                                            <span>New</span>
                                        </div>
                                        <img src="{{ asset('lms/img/course-img/c-1.jpg') }}" alt="">
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
                                                    <span>${{ $course->price }}</span> or <span>{{ $course->total_number_of_referrals_needed }} Referrals</span>
                                                    @break
                                                    @default
                                                    {{''}}
                                                @endswitch
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
                            <!-- Single Courses Area End -->
                    @endforeach

                    @else
                        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                            <p> No courses added yet!</p>
                        </div>
                @endif


                <!-- Single Courses Area Start -->
                <div class="col-12 col-md-6 col-lg-4">
                    <!-- Single Courses Area Start -->
                    <div class="single_courses">
                        <div class="single_courses_thumb">
                            <div class="courses_badge">
                                <span>New</span>
                            </div>
                            <img src="{{ asset('lms/img/course-img/c-2.jpg') }}" alt="">
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
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <span>(4 Vote)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Courses Area End -->


            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- Pagination Area Start -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination mt-5">
                            <li><a href="#" aria-label="Previous">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#" aria-label="Next">Next</a></li>
                        </ul>
                    </nav>
                    <!-- Pagination Area End -->
                </div>
            </div>
        </div>
    </div>
    <!-- ===================== Popular Courses Area End ===================== -->

    <div class="popular_coureses_area all_courses grid_list section_padding_100" style="padding: 30px 0;">
        <div class="container section_padding_100">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-dark">
                            <tr>
                                <th>Field</th>
                                <th>Value</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Referral Bonus:</td>
                            </tr>
                            <tr>
                                <td>Total Referrals :</td>
                            </tr>
                            <tr>
                                <td>Available Referral :</td>
                            </tr>
                            <tr>
                                <td>Referral Code :</td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
