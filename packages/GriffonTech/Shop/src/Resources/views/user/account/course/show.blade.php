@extends('shop::layouts.master')

@section('title')
   My Course - {{ $course->name }}
@stop

@section('content')
    <div class="container page__heading-container">
        <div class="page__heading d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
            <div>
                <h1 class="m-lg-0"> {{ $course->name }} </h1>
                <div class="d-inline-flex align-items-center">
                    <span class="mr-1">
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
        </div>
    </div>

    <div class="container page__container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    @if($course->photo)
                        <img src="{{ $course->photo }}" alt="{{ $course->name }}">
                    @endif

                </div>
                <div class="card">
                    <div class="card-header"> Course Batch - #{{ $courseRegistration->course_batch->id }} </div>
                    <div class="card-body">
                        <ul class="list-group col-lg-12">
                            <li class="list-group-item"> <i class="fa fa-clock"></i> - Purchased On :
                                {{ $courseRegistration->created_at }}
                            </li>
                            <li class="list-group-item"> <i class="fa fa-link"></i> - course learning link 1 : <a href="{{ $course->learning_url }}" class="font-weight-bold text-decoration-none">{{ $course->learning_url }} </a> </li>
                            <li class="list-group-item"> <i class="fa fa-link"></i> - course learning link 2: <a href="{{ $course->learning_url_2 }}" class="font-weight-bold text-decoration-none">{{ $course->learning_url_2 }} </a> </li>
                            <li class="list-group-item"> <i class="fa fa-users"></i> - Current Number of Students In The Course : <span class="text-danger font-weight-bold">{{ $courseRegistration->course_batch->no_of_users }}</span>  </li>
                            <li class="list-group-item"> <i class="fa fa-users"></i> - Maximum Number of Users : <span class="text-danger font-weight-bold">{{ $courseRegistration->course_batch->maximum_number_of_users }}</span>  </li>
                            <li class="list-group-item"> <i class="fa fa-tasks"></i> - Is Taken : <span class="text-danger font-weight-bold">{{ ($courseRegistration->course_batch->is_taken) ? 'Yes' : 'No' }} </span></li>
                            @if ($courseRegistration->course_batch->is_taken)
                                <li class="list-group-item"> <i class="fa fa-clock"></i> - Course Completed on : <span class="text-danger font-weight-bold">{{ ($courseRegistration->course_batch->time_completed) ? $courseRegistration->course_batch->time_completed : 'Not Yet' }}</span> </li>
                            @endif
                        </ul>
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
                                <img src="{{ $course->tutor->photo }}" alt="About Adrian" width="40" class="rounded-circle">
                            </div>
                            <div class="media-body">
                                <div class="card-title mb-0">
                                    <a href="#" class="text-body"><strong> {{ $course->tutor->name }} </strong></a></div>
                                <p class="text-muted mb-0">Instructor</p>
                            </div>
                            <div class="media-right">
                                <a href="{{ $course->tutor->facebook_url }}" class="btn btn-facebook btn-sm">
                                    <i class="fab fa-facebook"></i>
                                </a>
                                <a href="{{ $course->tutor->twitter_url }}" class="btn btn-twitter btn-sm">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="{{ $course->tutor->linkedin_url }}" class="btn btn-twitter btn-sm">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                                <a href="{{ $course->tutor->youtube_url }}" class="btn btn-danger btn-sm">
                                    <i class="fab fa-youtube"></i>
                                </a>
                                <a href="{{ $course->tutor->website_url }}" class="btn btn-default btn-sm">
                                    <i class="fa fa-link"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! $course->tutor->description !!}
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-title mb-0">
                            <p> Course Review </p>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (isset($course_review))
                            {!! Form::model($course_review, ['route' => ['user.course_review.edit', $course_review->id] ]) !!}
                            <div class="form-group">
                                <label for="review">Review</label>
                                {!! Form::textarea('review',null, ['class' => 'form-control', 'rows' => 5]) !!}
                            </div>

                            <div class="form-group">
                                <label for="rating">Rating ( 1 - 5) :</label>
                                {!! Form::number('rating', null, ['class' => 'form-control', 'min' => 1, 'max' => 5]) !!}
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                <button onclick="
                                    event.preventDefault();
                                    var response = confirm('Are you sure you want to delete this review ?');
                                    if (response) {
                                    document.getElementById('{{ $course_review->id }}').submit(); }"
                                        class="btn btn-danger btn-sm">Delete</button>
                            </div>
                            {!! Form::close() !!}
                            <form id="{{ $course_review['id'] }}" action="{{ route('user.course_review.delete', $course_review['id']) }}" method="POST" style="display: none;">
                                <input type="hidden" name="_method" value="delete">
                                @csrf
                            </form>

                        @else

                            {!! Form::open(['route' => 'user.course_review.create']) !!}
                            {!! Form::hidden('course_id', $course->id) !!}
                            {!! Form::hidden('course_batch_id', $courseRegistration->course_batch->id) !!}

                            <div class="form-group">
                                <label for="review">Review</label>
                                {!! Form::textarea('review',null, ['class' => 'form-control', 'rows' => 5]) !!}
                            </div>

                            <div class="form-group">
                                <label for="rating">Rating ( 1 - 5) :</label>
                                {!! Form::number('rating', null, ['class' => 'form-control', 'min' => 1, 'max' => 5]) !!}
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        @endif
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
