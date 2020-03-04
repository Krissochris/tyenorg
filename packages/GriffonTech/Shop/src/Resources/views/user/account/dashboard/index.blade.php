@extends('shop::layouts.master')


@section('content')
    <!-- Page Content -->

    <div class="container section_padding_100">
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-primary">
                    <p>Become a pro member to enjoy the full benefits of the platform. Click <a class="btn btn-success btn-sm" href="{{ route('user.pro_user') }}"> Here </a> to become a pro member.  </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="single_course_collection">
                    <a href="#">
                        <h4>Referral Bonus</h4>
                        <p> 0.00 </p>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="single_course_collection">
                    <a href="#">
                        <h4>Total Referrals</h4>
                        <p> 0 </p>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="single_course_collection">
                    <a href="#">
                        <h4>Available Referral</h4>
                        <p> 0</p>
                    </a>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="single_course_collection">
                    <a href="#">
                        <h4>Courses</h4>
                        <p> 0</p>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div>
                    <strong>Referral Code:</strong>
                    <div class="alert alert-dismissable alert-info">
                        {{ url()->route('user.register.index') }}?ref={{auth('user')->user()->email}}
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                @if($userCoupon)
                    <p> Your user coupon code : {{ $userCoupon->coupon_code }} </p>
                @endif
            </div>
        </div>
    </div>
    <!-- /.container -->
@endsection
