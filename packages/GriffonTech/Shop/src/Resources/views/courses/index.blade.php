@extends("shop::layouts.master")

@section('title')
    {{ __('All Courses') }}
@stop

@section('content')

    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center justify-content-between">
            <h1 class="m-0">All Courses</h1>
        </div>
    </div>

    <div class="container page__container">
        {!! Form::open(['route' => 'courses.index', 'method' => 'GET']) !!}
            <div class="d-lg-flex">
                <div class="search-form mb-3 mr-3-lg search-form--light">
                    <input type="text" name="_q" class="form-control" value="{{ request()->query('_q') }}" placeholder="Search courses" id="_q">
                    <button class="btn" type="button"><i class="material-icons">search</i></button>
                </div>

{{--
                <div class="form-inline  mb-3 ml-auto">
                    <div class="form-group mr-3">
                        <label for="custom-select" class="form-label mr-1">Category</label>
                        <select id="custom-select" class="form-control custom-select" style="width: 200px;">
                            <option selected>All categories</option>
                            <option value="1">Vue.js</option>
                            <option value="2">Node.js</option>
                            <option value="3">GitHub</option>
                        </select>
                    </div>
                </div>
--}}
            </div>
        {!! Form::close() !!}

        <div class="row">

            @if($courses)

                @foreach($courses as $course)
                    <div class="col-md-3">
                        <div class="card card__course" data-aos="fade-up" data-offset="-100">
                            <div class="card-header card-header-large card-header-dark bg-dark d-flex justify-content-center">
                                <a class="card-header__title  justify-content-center align-self-center d-flex flex-column" href="{{ route('courses.show', $course->url_key) }}">
                                    <span><img src="{{ $course->photo }}" class="mb-1" style="width:50%;" alt="{{ $course->name }}"></span>
                                    {{--
                                                                        <span class="course__title"> {{ $course->name }} </span>
                                    --}}
                                    <span class="course__subtitle">{{ $course->name }} </span>
                                </a>
                            </div>
                            <div class="p-3">
                                <div class="mb-2">
                                    @if(isset($course->course_average_rating) )
                                        <span class="mr-2">
                                            @for($num = 1; $num <= 5; $num++)
                                                @if($num <= $course->course_average_rating)
                                                    <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                                @else
                                                    <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star_empty</i></a>
                                                @endif
                                            @endfor
                                        </span>
                                        <strong>{{ $course->course_average_rating }} </strong><br />

                                        <small class="text-muted">({{ $course->total_reviews }} ratings)</small>
                                    @endif
                                </div>
                                <div class="d-flex align-items-center">
                                    @switch($course->type)
                                        @case('free')
                                        <strong class="h4 m-0">Free</strong>
                                        @break
                                        @case('pro_user_free')
                                        <strong class="h4 m-0">Free</strong>
                                        @break
                                        @case('pro_user_paid')
                                        <strong class="h4 m-0">${{ $course->price }}</strong>
                                        @break
                                        @default
                                        {{''}}
                                    @endswitch
                                    <a href="{{ route('courses.show', $course->url_key) }}" class="btn btn-primary ml-auto">view</a>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

            @endif




        </div>
        <hr>
        <div class="d-flex flex-row align-items-center mb-3">
            {{ $courses->links() }}
        </div>

    </div>
@endsection
