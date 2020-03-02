@extends('shop::layouts.master')


@section('content')
    <!-- Breadcumb area start -->
    <section class="breadcumb_area" style="background-image: url({{ asset('lms/img/bg-pattern/breadcumb.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcumb_section">
                        <!-- Breadcumb page title start -->
                        <div class="page_title">
                            <h3>My Purchases</h3>
                        </div>
                        <!-- Breadcumb page pagination start -->
                        <div class="page_pagination">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                <li>My Purchases</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><br>
    <!-- Breadcumb area end -->
<!-- Page Content -->
<div class="container">

    <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th>S/N</th>
                            <th>Item</th>
                            <th>Medium</th>
                            <th>Amount</th>
                            <th> Created </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($userPayments as $userPayment)
                            <tr>
                                <td>{{ $userPayment->id }}</td>
                                <td> {{ $userPayment->payment_purpose }} </td>
                                <td> {{ $userPayment->medium_of_payment }} </td>
                                <td class="font-weight-bold text-danger">$ {{ $userPayment->amount }}</td>
                                <td>{{ $userPayment->created_at }}</td>
                                <td class="text-right">
                                    <a href="#" class="text-primary text-decoration-none font-weight-bold">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div><br>
<!-- /.container -->

@endsection
