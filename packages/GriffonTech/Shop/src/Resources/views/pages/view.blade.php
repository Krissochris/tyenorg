@extends("shop::layouts.master")

@section('title')
    {{ $page }}
@stop

@section("content")

    <!-- ===================== Breadcumb Area Start ===================== -->
    <section class="breadcumb_area" style="background-image: url({{ asset('lms/img/bg-pattern/breadcumb.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcumb_section">
                        <!-- Breadcumb page title start -->
                        <div class="page_title">
                            <h3> Page </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===================== Breadcumb Area End ===================== -->



    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! setting($page) !!}
            </div>
        </div>
    </div>

@endsection
