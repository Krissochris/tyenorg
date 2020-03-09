@extends("admin::layouts.master")

@section('title')
    Admin | View Page
@stop

@section("content")
    <div class="ibox">
        <div class="ibox-title">
            <h5> View Page - {{ $pages[$page] }} </h5>
        </div>
        <div class="ibox-content">
            {!! setting($page) !!}
        </div>
    </div>
@endsection
