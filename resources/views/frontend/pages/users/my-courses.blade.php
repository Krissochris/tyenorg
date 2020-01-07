@extends('frontend.layouts.header')
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Course
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

                <div class="container col-md-10">
                    <div class="row">

                        <div class="col-lg-3 col-md-3 mb-3">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="images/cover.jpeg" alt=""></a>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="#">JavaScript Master</a>
                                    </h5>
                                    <p class="card-text">Some text!</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 mb-3">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="images/cover.jpeg" alt=""></a>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="#">JavaScript Master</a>
                                    </h5>
                                    <p class="card-text">Some text!</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 mb-3">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="images/cover.jpeg" alt=""></a>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="#">JavaScript Master</a>
                                    </h5>
                                    <p class="card-text">Some text!</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 mb-3">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="images/cover.jpeg" alt=""></a>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="#">JavaScript Master</a>
                                    </h5>
                                    <p class="card-text">Some text!</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 mb-3">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="images/cover%20(1).jpg" alt=""></a>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="#">PHP From Scratch</a>
                                    </h5>
                                    <p class="card-text">Some text!</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 mb-3">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="images/cover%20(1).jpg" alt=""></a>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="#">PHP From Scratch</a>
                                    </h5>
                                    <p class="card-text">Some text!</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 mb-3">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="images/cover%20(2).jpg" alt=""></a>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="#">Bootstrap it All</a>
                                    </h5>
                                    <p class="card-text">Some text!</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 mb-3">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top" src="images/cover%20(2).jpg" alt=""></a>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="#">Bootstrap it All</a>
                                    </h5>
                                    <p class="card-text">Some text!</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.row -->
                </div>

            </div>
            <!-- /.col-lg-9 -->
        </div>
        <hr>

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
    </div>
    <!-- /.container -->
@endsection
