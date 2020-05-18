@extends("shop::layouts.master")

@section('fb_pixel_script')
    fbq('track', 'Purchase', {value: {{ request()->get('amount') }} , currency: 'USD'});
@stop

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="jumbotron text-center">
                    <h2 > Thank You  </h2>
                    <p> Your payment was successfully received . </p>
                </div>
            </div>
        </div>
    </div>
@endsection
