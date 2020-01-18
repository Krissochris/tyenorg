@extends("tutor::layout.master")

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('tutor.courses.create') }}">
                <button class="btn btn-dark float-right">
                    <i class="fa fa-book-medical"></i>
                    Add Course
                </button>
            </a>
        </div>
    </div>
    <hr>
    <div class="container">
            <div class="row">
                @foreach($courses as $course)
                    <div class="col-lg-3 col-md-3 mb-3">
                        <div class="card">
                            <div class="card-img-top">
                                <img class="img-fluid" style="max-height: 120px; width: 100%" src="{{ $course->photo }}" alt="{{ $course->name }}">
                            </div>

                            <div class="card-body">
                                <div class="float-right text-danger font-weight-bold" style="font-weight: 400">
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
                                </div>
                                <p class="font-weight-bold"> {{ $course->name }} </p>
{{--
                                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
--}}
                                <div class="float-right">
                                    <a href="{{ route('tutor.courses.edit', [ 'slug' => $course->url_key]) }}">Edit</a>
                                    <a href="{{ route('tutor.courses.course_batch.index', $course->id) }}">Batch </a>
                                    <a class="text-danger" href="">Delete</a>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>

@endsection
