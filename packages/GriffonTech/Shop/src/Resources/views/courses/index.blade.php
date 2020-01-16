@extends("shop::layouts.master")

@section('content')
<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">

            <h1 class="my-4">Categories</h1>
            <div class="list-group">
                @foreach($courseCategories as $category)
                <a href="{{ route('categories.show', $category->url_key) }}" class="list-group-item">{{ $category->name }} </a>
                @endforeach
            </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            </div>

            <div class="row">
                @if (isset($courses) && !empty($courses))
                @foreach($courses as $course)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="{{ route('courses.show', $course->url_key) }}">
                                <img class="card-img-top" src="{{ $course->photo }}" alt="{{ $course->name }}">
                            </a>
                            <div class="card-body">
                                <h6 class="card-title">
                                    <a href="{{ route('courses.show', $course->url_key) }}"> {{ $course->name }}</a>
                                </h6>
                                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>

                                <div class="float-right">
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
                            </div>
                        </div>
                    </div>
                @endforeach

                @else
                    <div class="col-lg-4 col-md-6 mb-4">
                        <p> No courses added yet!</p>
                    </div>
                @endif
            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
<!-- Pagination -->
<ul class="pagination justify-content-center">
    <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
        </a>
    </li>
    <li class="page-item">
        <a class="page-link" href="#">1</a>
    </li>
    <li class="page-item">
        <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item">
        <a class="page-link" href="#">3</a>
    </li>
    <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
        </a>
    </li>
</ul>
@endsection