@extends("shop::layouts.master")

@section('title')
    {{ __('Tutor Application Under Review') }}
@stop

@section('content')
    <div class="container section_padding_100">
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="jumbotron">
                    <h4> Application Under Review</h4>
                    <p> You submitted an application on : {{ $tutor_application_submission->created_at }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
