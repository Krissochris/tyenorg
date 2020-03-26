@extends('shop::layouts.master')

@section('title')
    My Courses
@stop


@section('content')

    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center justify-content-between">
            <h1 class="m-0">My Courses</h1>
        </div>
    </div>





    <div class="container page__container">

        <div class="row">
            @if($courses)
                @foreach($courses as $course)
                    <div class="col-md-3">
                        <div class="card card__course" data-aos="fade-up" data-offset="-100">
                            <div class="card-header card-header-large card-header-dark bg-dark d-flex justify-content-center">
                                <a class="card-header__title  justify-content-center align-self-center d-flex flex-column" href="{{ route('user.course.show', $course->url_key) }}">
                                    <span><img src="{{ $course->photo }}" class="mb-1" style="width:34px;" alt="{{ $course->name }}"></span>
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
                                    <a href="{{ route('user.course.show', $course->url_key) }}" class="btn btn-primary ml-auto">view</a>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            @endif

        </div>
        <hr>
        <div class="d-flex flex-row align-items-center mb-3">
            <div class="form-inline">
                View
                <select class="custom-select ml-2">
                    <option value="20" selected>20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                </select>
            </div>
            <div class="ml-auto">
                20 <span class="text-muted">of 100</span> <a href="#" class="icon-muted"><i class="material-icons float-right">arrow_forward</i></a>
            </div>
        </div>

    </div>
@endsection
