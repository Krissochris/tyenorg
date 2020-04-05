@extends("shop::layouts.master")

@section('title')
    {{ $page }}
@stop

@section("content")

    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center justify-content-between">
            <h1 class="m-0"> {{ ucwords(str_replace(['_', 'page'], [' ', ' '], $page)) }} </h1>
        </div>
    </div>



    <div class="container page__container">
        <div class="row">
            <div class="col-md-12">
                {!! setting($page) !!}
            </div>
        </div>
    </div>

@endsection
