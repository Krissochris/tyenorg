@extends('shop::layouts.master')

@section('title')
    My Profile
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
                            <h3>My Profile</h3>
                        </div>
                        <!-- Breadcumb page pagination start -->
                        <div class="page_pagination">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                <li>My Profile</li>
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
    <div class="container col-md-11">
        <div class="row">


            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Personal Details</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::model($user, ['route' => 'user.profile.edit']) !!}
                            <div class="form-group row">
                                <label class="col-sm-2">Full Name: </label>
                                <div class="col-sm-7">
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Full Name']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2">Username: </label>
                                <div class="col-sm-7">
                                    {!! Form::text('username', null, ['class' => 'form-control', 'readonly' => true]) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2">Email: </label>
                                <div class="col-sm-7">
                                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2">Phone: </label>
                                <div class="col-sm-7">
                                    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <h4> Change Password</h4>
                            <div class="form-group row">
                                <label class="col-sm-2">Password: </label>
                                <div class="col-sm-7">
                                    {!! Form::password('old_password', ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2">New Password: </label>
                                <div class="col-sm-7">
                                    {!! Form::password('password', ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>



                <div class="card" style="margin-top: 20px;">
                    <div class="card-header">
                        <h5>Payment Details </h5>
                    </div>

                    <div class="card-body">

                        <div class="alert alert-danger">
                            <p> Please you can only edit your payment details once. </p>
                        </div>

                        {!! Form::model($paymentDetails, ['route' => 'user.profile.update_payment_details']) !!}
                        <h5> Local Bank Details </h5>
                        <div class="form-group row">
                            <label class="col-sm-2">Bank Details: </label>
                            <div class="col-sm-7">
                                {!! Form::text('bank_name', null, ['class' => 'form-control', 'placeholder' => 'Bank Name']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2"> Account Name: </label>
                            <div class="col-sm-7">
                                {!! Form::text('account_name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2">Account Number: </label>
                            <div class="col-sm-7">
                                {!! Form::text('account_number', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <h5> Bitcoin Detail : </h5>
                        <div class="form-group row">
                            <label class="col-sm-2">Bitcoin Address: </label>
                            <div class="col-sm-7">
                                {!! Form::text('btc_address', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <h5> PayPal Details</h5>
                        <div class="form-group row">
                            <label class="col-sm-2">PayPal Email Address: </label>
                            <div class="col-sm-7">
                                {!! Form::email('paypal_email_address', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary">Update</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
            <br>
            <br>
        </div>
    </div>
</div>
<!-- /.container -->
@endsection
