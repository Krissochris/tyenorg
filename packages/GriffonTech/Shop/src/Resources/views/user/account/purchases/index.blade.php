@extends('shop::layouts.master')


@section('content')
    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center justify-content-between">
            <h1 class="m-0">My Purchases</h1>
        </div>
    </div>


<!-- Page Content -->
<div class="container page__container">
    <div class="row">

            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
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
