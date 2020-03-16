@extends('shop::layouts.master')

@section('title')
    My Referrals
@stop

@section('content')
    <!-- Breadcumb area start -->
    <section class="breadcumb_area" style="background-image: url({{ asset('lms/img/bg-pattern/breadcumb.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcumb_section">
                        <!-- Breadcumb page title start -->
                        <div class="page_title">
                            <h3>My Referral Bonus Withdrawals</h3>
                        </div>
                        <!-- Breadcumb page pagination start -->
                        <div class="page_pagination">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                <li> Withdrawals </li>
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
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="single_course_collection">
                    <a href="#">
                        <h4>Referral Bonus</h4>
                        <p>${{ ($user_referral->referral_bonus) ? $user_referral->referral_bonus : '0.00' }}</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-bottom: 60px;">
        <div class="row">
            <div class="col-sm-6">

                <h5>  Referral Bonus Withdrawal </h5>

                {!! Form::open(['route' => 'user.withdrawals.create']) !!}
                <div class="form-group">
                    <label for="amount"> Amount</label>
                    <input type="number" name="amount" class="form-control">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary">Withdraw </button>
                </div>
                {!! Form::close() !!}
            </div>

            <div class="col-sm-6">
                <h5 class="text-center"> My Withdrawals</h5>
                <table class="table">
                    <thead>
                    <tr>
                        <td>Amount </td>
                        <td>Status </td>
                        <td>Requested At</td>
                    </tr>
                    </thead>
                    <tbody>
                        @if ($userWithdrawals)
                            @foreach($userWithdrawals as $userWithdrawal)
                                <tr>
                                    <td> ${{ $userWithdrawal->amount }} </td>
                                    <td> {{ $userWithdrawal->getStatus() }} </td>
                                    <td>{{ $userWithdrawal->created_at }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>

                </table>
            </div>
        </div>
    </div>


    <!-- /.container -->
@endsection
