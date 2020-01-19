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
            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            </div>
<<<<<<< HEAD:packages/GriffonTech/Shop/src/Resources/views/user/account/purchases/index.blade.php
            <div class="container col-md-12">
=======
            <div class="col-md-12 table-responsive">
>>>>>>> frontouch:packages/GriffonTech/Shop/src/Resources/views/users/account/purchases/index.blade.php
                <table class="table table-hover table-striped table-bordered">
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
<<<<<<< HEAD:packages/GriffonTech/Shop/src/Resources/views/user/account/purchases/index.blade.php
                            <td>$ {{ $userPayment->amount }}</td>
                            <td>{{ $userPayment->created_at }}</td>
=======
                            <td class="font-weight-bold text-danger">$ {{ $userPayment->amount }}</td>
>>>>>>> frontouch:packages/GriffonTech/Shop/src/Resources/views/users/account/purchases/index.blade.php
                            <td class="text-right">
                                <a href="#" class="text-primary text-decoration-none font-weight-bold">View</a> &nbsp; | &nbsp;
                                <a href="#" class="text-danger text-decoration-none font-weight-bold">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
    </div>
</div><br>
<!-- /.container -->

@endsection
