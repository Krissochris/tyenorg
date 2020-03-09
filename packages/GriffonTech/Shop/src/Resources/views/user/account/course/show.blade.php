@extends('shop::layouts.master')

@section('content')
<!-- Page Content -->
<br><br>
    @if(isset($course))
        <div class="container">
            <div class="row bg-dark" style="padding: 20px 0;">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-img">
                            <img src="{{ $course->photo }}" style="max-height: 200px; width: 100%" class="card-img" alt="Course Image">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="card-title text-light"><h2> {{ $course->name }} </h2></div>
                        <h6 class="text-light"> {{ $course->summary }} </h6>
                        <div>
                            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                        </div>
                        <small class="text-light">Created By: <span class="text-primary">{{ $course->tutor->name }} </span></small> &nbsp;&nbsp;
                        <small class="text-light">Purchased On: <span class="text-primary"> {{ $courseRegistration->created_at }} </span></small>

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
                    <br>
                </div >
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-header"> Course Batch - #{{ $courseRegistration->course_batch->id }} </div>
                        <div class="card-body">
                            <ul class="list-group col-lg-12">
                                <li class="list-group-item"> <i class="fa fa-link"></i> - course learning link : <a href="{{ $course->learning_url }}" class="font-weight-bold text-decoration-none">{{ $course->learning_url }} </a> </li>
                                <li class="list-group-item"> <i class="fa fa-users"></i> - No of Users : <span class="text-danger font-weight-bold">{{ $courseRegistration->course_batch->no_of_users }}</span>  </li>
                                <li class="list-group-item"> <i class="fa fa-users-cog"></i> - Maximum Number of Users : <span class="text-danger font-weight-bold">{{ $courseRegistration->course_batch->maximum_number_of_users }}</span>  </li>
                                <li class="list-group-item"> <i class="fa fa-tasks"></i> - Is Taken : <span class="text-danger font-weight-bold">{{ ($courseRegistration->course_batch->is_taken) ? 'Yes' : 'No' }} </span></li>
                                <li class="list-group-item"> <i class="fa fa-clock"></i> - Course Completed on : <span class="text-danger font-weight-bold">{{ ($courseRegistration->course_batch->time_completed) ? $courseRegistration->course_batch->time_completed : 'Not Yet' }}</span> </li>
                            </ul>
                        </div>
                    </div>
                    <br>

                    <div class="card mb-4">
                        <div class="card-header font-weight-bold"> Course Details </div>
                        <div class="card-body">
                            {!! $course->description !!}
                        </div>
                    </div>
                    <br>
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

            <?php if ($course->tutor->tutor_profile) { $tutor = $course->tutor->tutor_profile; $tutor->name = $course->tutor->name;  } else {
                $tutor['name'] = $course->tutor->name;
            }
            ?>
            @include("shop::partials.courses.tutor_detail", ['tutor' => $tutor])
            <br>

{{--
            @include("shop::partials.courses.related_courses")
--}}

        </div>
        <!-- /.container -->
    @endif

@endsection
