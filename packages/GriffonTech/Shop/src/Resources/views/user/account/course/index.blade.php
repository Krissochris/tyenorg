@extends('shop::layouts.master')

@section('content')
<!-- Page Content -->
    <div class="row">
        <div class="col-lg-12">

            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            </div>

            <div class="row">

                @if(isset($courses))

                    @foreach($courses as $course)
                        <div class="col-lg-3 col-md-3 mb-3">
                            <div class="card h-100">
                                <a href="{{ route('user.course.show', $course->url_key) }}"><img class="card-img-top" style="max-height: 120px; width: 100%" src="{{ asset('images/cover.jpeg') }}"  alt=""></a>
                                <div class="card-body">
                                    <a href="{{ route('user.course.show', $course->url_key) }}" class="card-text font-weight-bold text-decoration-none" > {{ $course->name }} </a>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                    <div class="float-right">
                                        <a href="{{ route('user.course.show', $course->url_key) }}" class="btn btn-danger">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @endif


            </div>


        </div>
        <!-- /.col-lg-9 -->
    </div>
    <hr>

</div>
<!-- /.container -->
@endsection
