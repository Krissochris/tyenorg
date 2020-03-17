@extends('admin::layouts.master')

@section('title')
    User Withdrawals
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Review User Withdrawal </h5>
                </div>
                <div class="ibox-content table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th> Name </th>
                            <td> {{ $userWithdrawal->user->name }} </td>
                        </tr>
                        <tr>
                            <th> Phone Number </th>
                            <td> {{ $userWithdrawal->user->phone_number }} </td>
                        </tr>
                        <tr>
                            <th> Referral Bonus </th>
                            <td> ${{ number_format($userWithdrawal->user->user_referral->referral_bonus, 2) }}  </td>
                        </tr>
                        <tr>
                            <th> Request Amount </th>
                            <th> ${{ $userWithdrawal->amount }} </th>
                        </tr>
                        <tr>
                            <th> Status </th>
                            <td> {{ $userWithdrawal->getStatus() }} </td>
                        </tr>
                    </table>

                    <h4>Tutor Bank Details  </h4>
                    <table class="table table-bordered">
                        <tr>
                            <th>Bank Name </th>
                            <td> {{  $userWithdrawal->user->payment_details->bank_name }} </td>
                        </tr>

                        <tr>
                            <th> Account Name</th>
                            <td> {{ $userWithdrawal->user->payment_details->account_name }} </td>
                        </tr>

                        <tr>
                            <th> Account Number </th>
                            <td> {{ $userWithdrawal->user->payment_details->account_number }} </td>
                        </tr>
                    </table>

                    @if($userWithdrawal->status === 1)
                        {!! Form::model($userWithdrawal, ['route' => ['admin.user_withdrawals.edit', $userWithdrawal->id] ]) !!}

                        <div class="form-group">
                            <label for="note">Note About Withdrawal (Optional) </label>
                            {!! Form::textarea('note', null, ['rows' => '5', 'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">

                            <label for="approve_and_paid_out">
                                <input type="radio" id="approve_and_paid_out" name="status" value="1" required> Approved and Paid Out
                            </label>

                            <label for="reject_and_cancel">
                                <input type="radio" id="reject_and_cancel" name="status" value="-1" required>
                                Reject and Cancel
                            </label>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success">Update Withdrawal</button>
                        </div>

                        {!! Form::close() !!}

                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection
