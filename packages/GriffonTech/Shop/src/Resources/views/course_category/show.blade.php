@extends("shop::layouts.master")

@section('content')
        <!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-12">

            <h2 class="text-center"> {{ $category->name }} </h2>

            <div class="row">
                @if (isset($courses) && !empty($courses))
                    @foreach($courses as $course)
                        <div class="col-lg-3 col-md-3 mb-4">
                            <div class="card h-100">
                                <a href="{{ route('courses.show', $course->url_key) }}"><img class="card-img-top" src="{{ asset("images/cover.jpeg") }}" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="{{ route('courses.show', $course->url_key) }}"> {{ $course->name }}</a>
                                    </h4>
                                    <h5>${{ $course->price }}</h5>
                                    <p class="card-text">{{ $course->summary }} </p>
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
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