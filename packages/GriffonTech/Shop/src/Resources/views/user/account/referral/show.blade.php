@extends('shop::layouts.master')


@section('content')
    <!-- Breadcumb area start -->
    <section class="breadcumb_area" style="background-image: url({{ asset('lms/img/bg-pattern/breadcumb.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcumb_section">
                        <!-- Breadcumb page title start -->
                        <div class="page_title">
                            <h3>My Referrals</h3>
                        </div>
                        <!-- Breadcumb page pagination start -->
                        <div class="page_pagination">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                <li>My Referrals</li>
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
                        <p>{{ ($user_referral->referral_bonus) ? $user_referral->referral_bonus : '0.00' }}</p>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="single_course_collection">
                    <a href="#">
                        <h4>Total Referrals</h4>
                        <p>{{ $user_referral->total_referral }}</p>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="single_course_collection">
                    <a href="#">
                        <h4>Available Referral</h4>
                        <p>{{ $user_referral->available_referral }}</p>
                    </a>
                </div>
            </div>

            <div class="alert alert-dismissable alert-info">
                <strong>Referral Code:</strong>
                {{ url()->route('user.register.index') }}?ref={{auth('user')->user()->email}}
            </div>
        </div>
    </div>

    <div class="container" style="margin-bottom: 60px;">
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th> Name </th>
                            <th> is pro user </th>
                            <th> Registered On</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($referrals)
                            @foreach($referrals as $referral)
                                <tr>
                                    <td> {{ @$referral->referred_user->name }} </td>
                                    <td> {{ ($referral->referred_user->is_pro_user) ? 'Yes' : 'No' }} </td>
                                    <td> {{ $referral->created_at }} </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


    <!-- /.container -->
@endsection
