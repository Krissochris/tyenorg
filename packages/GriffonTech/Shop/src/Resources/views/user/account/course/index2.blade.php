@extends('shop::layouts.master')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">My Courses
            <small>Catalog</small>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Home</a>
            </li>
            <li class="breadcrumb-item active">My-Courses</li>
        </ol>
        <div class="row">
            <div class="col-lg-12">

                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                </div>
                <div class="row">

                    @if(isset($courses))

                        @foreach($courses as $course)
                            <div class="col-lg-3 col-md-3 mb-3">
                                <div class="card h-100">
                                    <a href="{{ route('user.course.show', $course->url_key) }}"><img class="img-fluid" style="max-height: 150px; width: 100%" src="{{ $course->photo}}"  alt=""></a>
                                    <div class="card-body">
                                        <a href="{{ route('user.course.show', $course->url_key) }}" class="text-decoration-none font-weight-bold"> {{ $course->name }} </a>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                        <div class="float-right">
                                            <a href="#"><i class="fa fa-eye text-dark"></i></a>
                                            <a href="#"><i class="fab fa-facebook-square text-dark"></i></a>
                                            <a href="#"><i class="fab fa-twitter text-dark"></i></a>
                                            <a href="#"><i class="fa fa-share-alt text-dark"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @endif


                </div>
                <!-- /.row -->

            </div>
            <!-- /.col-lg-9 -->
        </div>
        <hr>

        <!-- Pagination -->
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link text-dark" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link text-dark" href="#">1</a>
            </li>
            <li class="page-item">
                <a class="page-link text-dark" href="#">2</a>
            </li>
            <li class="page-item">
                <a class="page-link text-dark" href="#">3</a>
            </li>
            <li class="page-item">
                <a class="page-link text-dark" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.container -->
@endsection
