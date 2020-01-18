@extends('shop::layouts.master')


@section('content')
        <!-- Page Content -->
<div class="container">


    <div class="container row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4> Referral Details </h4>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th>Field</th>
                            <th>Value</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Referral Bonus:</td>
                            <td> {{ ($user_referral->referral_bonus) ? $user_referral->referral_bonus : '0.00' }}</td>
                        </tr>
                        <tr>
                            <td>Total Referrals :</td>
                            <td> {{ $user_referral->total_referral }}</td>
                        </tr>
                        <tr>
                            <td>Available Referral :</td>
                            <td> {{ $user_referral->available_referral }}</td>
                        </tr>
                        <tr>
                            <td>Referral Code :</td>
                            <td> {{ url()->route('user.register.index', ['ref' => auth('user')->user()->email ]) }} </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
        <hr>
    </div>
</div>
<!-- /.container -->
@endsection