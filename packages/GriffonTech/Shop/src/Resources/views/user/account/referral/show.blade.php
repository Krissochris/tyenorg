@extends('shop::layouts.master')


@section('content')
        <!-- Page Content -->
<div class="container">
    <br>
    <div class="container row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4> Referral Details </h4>
                </div>
                <div class="card-body table-responsive">
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
                            <td class="text-danger font-weight-bold"> {{ ($user_referral->referral_bonus) ? $user_referral->referral_bonus : '0.00' }}</td>
                        </tr>
                        <tr>
                            <td>Total Referrals :</td>
                            <td class="text-danger font-weight-bold"> {{ $user_referral->total_referral }}</td>
                        </tr>
                        <tr>
                            <td>Available Referral :</td>
                            <td class="text-danger font-weight-bold"> {{ $user_referral->available_referral }}</td>
                        </tr>
                        <tr>
                            <td>Referral Code :</td>
                            <td class="text-primary font-weight-bold"> {{ url()->route('user.register.index', ['ref' => auth('user')->user()->email ]) }}
                                <div class="float-right">
                                    <a href="#"><i class="fa fa-share-alt text-dark"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
    <br>
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>S/N</th>
                <th>Username</th>
                <th>Is Pro User</th>
                <th>Status</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            {{--@foreach($userPayments as $userPayment)--}}
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-right">
                    <a href="#" class="text-primary text-decoration-none font-weight-bold">View Profile</a>
                </td>
            </tr>
            {{--@endforeach--}}
            </tbody>
        </table>
    </div>
</div>
<!-- /.container -->
@endsection
