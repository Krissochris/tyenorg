@extends("shop::layouts.master")

@section('title')
    {{ $course->name }}
@stop

@section("content")
    <div class="container page__heading-container">
        <div class="page__heading d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
            <div>
                <h1 class="m-lg-0"> {{ $course->name }} </h1>
                <div class="d-inline-flex align-items-center">
                    <span class="mr-2">
                        <?php
                            $course_reviews = $course->course_reviews;
                            $average_course_rating = $course->course_reviews->average('rating');
                        ?>
                        @if(isset($average_course_rating) )
                            <span class="mr-2">
                                            @for($num = 1; $num <= 5; $num++)
                                    @if($average_course_rating)
                                        <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                    @else
                                        <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star_empty</i></a>
                                    @endif
                                @endfor
                            </span>
                        @endif
                    </span>
                    <strong>{{ $average_course_rating }}</strong><br />
                    <small class="text-muted">({{ $course_reviews->count() }} reviews)</small>
                </div>
            </div>
            <div>
                @if (isset(auth('user')->user()->id) && (isset($course->is_registered) && $course->is_registered === true) )
                    <a class="btn btn-success" href="{{ route('user.course.show', $course->url_key) }}"> View Course</a>
                @else
                    @switch($course->type)
                        @case('free')
                        @case('pro_user_free')
                        <a class="btn btn-primary" href="{{ route('courses.join', $course->url_key) }}">Join Course (Free)</a>
                        @break
                        @case('pro_user_paid')
                        <a class="btn btn-primary" href="{{ route('courses.checkout', $course->url_key) }}">
                            Purchase Course
                            <strong> ${{ $course->price }} </strong>
                        </a>
                        @break
                        @default
                        {{''}}
                    @endswitch
                @endif
            </div>
        </div>
    </div>





    <div class="container page__container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    @if($course->video_url)
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item"
                                    src="{{ $course->video_url }}"
                                    allowfullscreen="">
                            </iframe>
                        </div>
                    @else
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/97243285?title=0&amp;byline=0&amp;portrait=0" allowfullscreen=""></iframe>
                        </div>
                    @endif

                </div>

                <div class="card">
                    <div class="card-header card-header-large bg-light d-flex align-items-center">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <div class="flex">
                                    <h4 class="card-header__title">Course Summary</h4>
                                </div>
                            </div>
                            <div class="media-right">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->route('blog.posts.show', $course->url_key) }}" class="btn btn-facebook btn-sm">
                                    <i class="fab fa-facebook"></i>
                                </a>
                                <a href="http://twitter.com/share?text={{ $course->name }}&url={{url()->route('blog.posts.show', $course->url_key)}}" class="btn btn-twitter btn-sm"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $course->summary }}
                    </div>
                </div>

                <div class="card">
                    <div class="card-header card-header-large bg-light d-flex align-items-center">
                        <div class="flex">
                            <h4 class="card-header__title">Course Description</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! $course->description !!}
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="media align-items-center">
                            <div class="media-left">
                                <img src="{{ $course->tutor->photo }}" alt="{{ $course->tutor->name }}" width="40" class="rounded-circle">
                            </div>
                            <div class="media-body">
                                <div class="card-title mb-0">
                                    <a href="#" class="text-body"><strong> {{ $course->tutor->name }} </strong></a></div>
                                <p class="text-muted mb-0">Instructor</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! $course->tutor->description !!}
                    </div>
                </div>


                <div class="card">
                    <div class="card-header card-header-large bg-light d-flex align-items-center">
                        <div class="flex">
                            <h4 class="card-header__title">Course Reviews</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(!$course->course_reviews->isEmpty())
                            @foreach($course->course_reviews as $review)
                                <div class="card">
                                    <div class="px-4 py-3">
                                        <div class="d-flex mb-1">
                                            <div class="flex">
                                                <div class="d-flex align-items-center mb-1">
                                                    <strong class="text-15pt">{{ $review->user->name }}</strong>
                                                    <small class="ml-2 text-muted">{{ $review->created_at->format('d M, Y') }}</small>
                                                </div>
                                                <div>
                                                    <p>
                                                        {{ $review->review }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        @endif

                    </div>
                </div>

            </div>


            <div class="col-md-4">

                <!-- Lessons -->


                <div class="card ">
                    <div class="card-header card-header-large bg-light d-flex align-items-center">
                        <div class="flex">
                            <h4 class="card-header__title">Related Courses</h4>
                        </div>
                    </div>
                    <div class="card-body">

                        @if(isset($relatedCourses))
                            @foreach($relatedCourses as $related_course)
                                <div class="card card__course clear-shadow border">
                                    <div class=" d-flex justify-content-center">
                                        <a class="" href="{{ route('courses.show', $related_course->url_key) }}">
                                            <img src="{{ $related_course->photo }}" style="width:100%" alt="{{ $related_course->name }}">
                                        </a>
                                    </div>
                                    <div class="p-3">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <a class="text-body mb-1" href="{{ route('courses.show', $related_course->url_key) }}">
                                                    <strong>
                                                        {{ $related_course->name }}
                                                    </strong>
                                                </a><br>

                                            </div>
                                            <a href="#" class="btn btn-primary ml-auto">
                                                @switch($course->type)
                                                    @case('free')
                                                    Free
                                                    @break
                                                    @case('pro_user_free')
                                                    Free
                                                    @break
                                                    @case('pro_user_paid')
                                                    ${{ $course->price }}
                                                    @break
                                                    @default
                                                    {{''}}
                                                @endswitch
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
