@extends('admin::layouts.master')

@section('title')
    Users Referral Bonus Withdrawals
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> User Withdrawals </h5>
                </div>
                <div class="ibox-content table-responsive">
                    <table class="table table-hover no-margins">
                        <thead>
                        <tr>
                            <th> Name </th>
                            <th> Phone Number </th>
                            <th> Wallet Balance </th>
                            <th> Request Amount </th>
                            <th> Status </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($userWithdrawals as $userWithdrawal)
                            <tr>
                                <td> {{ $userWithdrawal->user->name }} </td>
                                <td> {{ $userWithdrawal->user->phone_number }} </td>
                                <td> ${{ number_format( $userWithdrawal->user->user_referral->referral_bonus, 2) }} </td>
                                <td> ${{ number_format($userWithdrawal->amount, 2) }} </td>
                                <td> {{ $userWithdrawal->getStatus() }} </td>

                                <td>
                                    @if ($userWithdrawal->status === 1)
                                        <a class="btn btn-primary btn-sm" href="{{route('admin.user_withdrawals.edit', $userWithdrawal->id)}}"> Review Withdrawal </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection
