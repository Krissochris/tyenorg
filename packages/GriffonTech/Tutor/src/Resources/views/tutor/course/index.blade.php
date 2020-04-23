@extends("tutor::layout.master")

@section('title')
    My Courses
@stop


@section('content')


    <div class="container page__heading-container">
        <div class="page__heading d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
            <h1 class="m-lg-0">Instructor Courses</h1>
            <a href="{{ route('tutor.courses.create') }}" class="btn btn-success ml-lg-3">New Course <i class="material-icons">add</i></a>
        </div>
    </div>


    <div class="container page__container">


        <form action="#" class="mb-2">
            <div class="d-flex">
                <div class="search-form mr-3 search-form--light">
                    <input type="text" class="form-control" placeholder="Filter by name" id="searchSample02">
                    <button class="btn" type="button"><i class="material-icons">search</i></button>
                </div>

                <div class="form-inline ml-auto">
                    <div class="form-group mr-3">
                        <label for="custom-select" class="form-label mr-1">Sort</label>
                        <select id="custom-select" class="form-control custom-select" style="width: 200px;">
                            <option selected>Name</option>
                            <option value="2">Created Date</option>
                            <option value="1">Earnings</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="published01" class="form-label mr-1">Status</label>
                        <select id="published01" class="form-control custom-select" style="width: 200px;">
                            <option selected>Published</option>
                            <option value="1">Draft</option>
                            <option value="3">All</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>


        @if($courses)

            <div class="row">
                @foreach($courses as $course)
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">

                                <div class="d-flex flex-column flex-sm-row">
                                    <a href="#" class="avatar mb-3 w-xs-plus-down-100 mr-sm-3">
                                        <img src="{{ $course->photo }}" alt="{{ $course->name }}" class="avatar-course-img">
                                    </a>
                                    <div class="flex" style="min-width: 200px;">
                                        <div class="d-flex">
                                            <div>
                                                <h4 class="card-title mb-1"><a href="{{ route('tutor.courses.edit', [ 'slug' => $course->url_key]) }}">{{ $course->name }}</a></h4>
                                                <p class="text-muted">{{ $course->summary }}</p>
                                            </div>
                                            <div class="dropdown ml-auto">
                                                <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ route('tutor.courses.edit', [ 'slug' => $course->url_key]) }}">Edit Course</a>
                                                    <a class="dropdown-item" href="{{ route('tutor.courses.course_batch.index', $course->id) }}"> Batches</a>
                                                    <a class="dropdown-item" href="{{ route('tutor.courses.show', [ 'slug' => $course->url_key]) }}">Comments</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item text-danger" href="{{ route('tutor.courses.delete', $course->url_key) }}"> Delete</a>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end">
                                            <div class="d-flex flex flex-column mr-3">
                                                <div class="d-flex align-items-center py-2 border-bottom">
                                                    <span class="mr-2">
                                                        @switch($course->type)
                                                            @case('free')
                                                            @case('pro_user_free')
                                                            {{ __('Free') }}
                                                            @break
                                                            @case('pro_user_paid')
                                                            &dollar;${{ $course->price }}
                                                            @break
                                                            @default
                                                            {{''}}
                                                            @endswitch
                                                    </span>
                                                    <small class="text-muted ml-auto">
                                                        {{ $course->course_registrations->count() }} Students
                                                    </small>
                                                </div>
                                                <div class="d-flex align-items-center py-2">
                                                    <span class="badge badge-vuejs mr-2">
                                                        {{ ((int) $course->active === 1) ? 'Active' : 'UnActive'  }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        @else
        <div class="row">
            <div class="col-sm-12">
                <p class="text-center">No Courses Yet</p>
            </div>
        </div>
        @endif
    </div>
@endsection
