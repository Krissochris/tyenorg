@extends('admin::layouts.master')

@section('title')
    Tutor Withdrawals
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Tutors Withdrawals </h5>
                </div>
                <div class="ibox-content table-responsive">
                    <table class="table table-hover no-margins">
                        <thead>
                        <tr>
                            <th> Name </th>
                            <th>Phone Number </th>
                            <th> Wallet Balance </th>
                            <th>Request Amount </th>
                            <th> Status </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tutorWithdrawals as $tutorWithdrawal)
                            <tr>
                                <td> {{ $tutorWithdrawal->tutor_profile->name }} </td>
                                <td> {{ $tutorWithdrawal->tutor_profile->phone }} </td>
                                <td> {{ number_format($tutorWithdrawal->tutor_profile->amount_balance, 2) }} </td>
                                <td> {{ number_format($tutorWithdrawal->amount, 2) }} </td>
                                <td> {{ $tutorWithdrawal->getStatus() }} </td>

                                <td>
                                    @if ($tutorWithdrawal->status === 1)
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.tutor_withdrawals.edit', $tutorWithdrawal->id)}}"> Review </a>
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
