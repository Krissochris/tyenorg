@extends('shop::layouts.master')


@section('content')
<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Purchase
        <small>History</small>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/">Home</a>
        </li>
        <li class="breadcrumb-item active">My-Purchases</li>
    </ol>

    <div class="row">
        <div class="col-lg-12">
            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            </div>
            <div class="container col-md-10">
                <table class="table table-hover table-striped table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th>S/N</th>
                        <th>Item</th>
                        <th>Medium</th>
                        <th>Amount</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($userPayments as $userPayment)
                        <tr>
                            <td>{{ $userPayment->id }}</td>
                            <td> {{ $userPayment->payment_purpose }} </td>
                            <td> {{ $userPayment->medium_of_payment }} </td>
                            <td>$ {{ $userPayment->amount }}</td>
                            <td class="text-right">
                                <a href="#">
                                    <i class="fa fa-eye text-dark"></i>
                                </a> &nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="#">
                                    <i class="fa fa-trash text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<hr>
<!-- /.container -->

@endsection