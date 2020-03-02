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

                            <div class="form-group">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>
<!-- /.container -->
@endsection
