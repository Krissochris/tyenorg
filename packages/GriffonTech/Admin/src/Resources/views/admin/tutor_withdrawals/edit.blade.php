@extends('admin::layouts.master')

@section('title')
    Tutor Withdrawals
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Review Tutor Withdrawal </h5>
                </div>
                <div class="ibox-content table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th> Tutor Name </th>
                            <td> {{ $tutorWithdrawal->tutor_profile->name }} </td>
                        </tr>
                        <tr>
                            <th> Tutor Phone  </th>
                            <td> {{ $tutorWithdrawal->tutor_profile->phone }} </td>
                        </tr>
                        <tr>
                            <th> Tutor Account Balance </th>
                            <td> ${{ number_format($tutorWithdrawal->tutor_profile->amount_balance, 2) }}  </td>
                        </tr>
                        <tr>
                            <th> Tutor Requested Withdrawal Amount </th>
                            <th> ${{ $tutorWithdrawal->amount }} </th>
                        </tr>
                        <tr>
                            <th> Status </th>
                            <td> {{ $tutorWithdrawal->getStatus() }} </td>
                        </tr>
                    </table>

                    <h4>Tutor Bank Details  </h4>
                    <table class="table table-bordered">
                        <tr>
                            <th>Bank Name </th>
                            <td> {{  $tutorWithdrawal->tutor_profile->bank_name }} </td>
                        </tr>

                        <tr>
                            <th> Account Name</th>
                            <td> {{ $tutorWithdrawal->tutor_profile->bank_account_name }} </td>
                        </tr>

                        <tr>
                            <th> Account Number </th>
                            <td> {{ $tutorWithdrawal->tutor_profile->bank_account_number }} </td>
                        </tr>
                        <tr>
                            <th> Bitcoin Wallet Address </th>
                            <td> {{ $tutorWithdrawal->tutor_profile->btc_wallet_address }} </td>
                        </tr>
                        <tr>
                            <th> PayPal Email Address </th>
                            <td> {{ $tutorWithdrawal->tutor_profile->paypal_email_address }} </td>
                        </tr>
                    </table>

                    @if($tutorWithdrawal->status === 1)
                    {!! Form::model($tutorWithdrawal, ['route' => ['admin.tutor_withdrawals.edit', $tutorWithdrawal->id] ]) !!}

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
