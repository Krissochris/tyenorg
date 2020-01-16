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
    <div class="container col-md-11">
            <div class="row">
                @foreach($courses as $course)
                    <div class="col-lg-3 col-md-3 mb-3">
                        <div class="card h-100">
                            <a href="{{ route('tutor.courses.edit', $course->url_key) }}">
                                <img class="card-img-top" src="{{ $course->photo }}" alt="{{ $course->name }}">
                            </a>

                            <div class="card-footer">
                                <p class="card-text"> {{ $course->name }} </p>
                                <div>
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

                                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                <div class="float-right">
                                    <a href="{{ route('tutor.courses.edit', [ 'slug' => $course->url_key]) }}"><i class="fa fa-edit text-dark"></i></a>
                                    <a href="#"><i class="fab fa-facebook-square text-dark"></i></a>
                                    <a href="#"><i class="fab fa-twitter text-dark"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>

@endsection