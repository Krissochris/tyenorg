@extends('shop::layouts.master')

@section('title')
    My Referrals
@stop

@section('content')
    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center justify-content-between">
            <h1 class="m-0">Withdrawals</h1>
        </div>
    </div>


    <!-- Page Content -->

    <div class="container page__container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Referral Bonus Withdrawal</h4>
                    </div>
                    <div class="card-body">
                        <div>
                            <h4>Referral Bonus</h4>
                            <p>${{ ($user_referral->referral_bonus) ? $user_referral->referral_bonus : '0.00' }}</p>
                        </div>

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
                </div>


                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">My Withdrawals</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <td>Amount </td>
                                <td>Status </td>
                                <td> Comment </td>
                                <td>Requested At</td>
                            </tr>
                            </thead>
                            <tbody>
                            @if ($userWithdrawals)
                                @foreach($userWithdrawals as $userWithdrawal)
                                    <tr>
                                        <td> ${{ $userWithdrawal->amount }} </td>
                                        <td> {{ $userWithdrawal->getStatus() }} </td>
                                        <td> {{ $userWithdrawal->note }} </td>
                                        <td>{{ $userWithdrawal->created_at }}</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /.container -->
@endsection
