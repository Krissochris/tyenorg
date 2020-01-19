@extends('shop::layouts.master')


@section('content')
<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <br>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/">Home</a>
        </li>
        <li class="breadcrumb-item active">My-Profile</li>
    </ol>
    <div class="container col-md-11">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <img src="{{ asset('images/26238.png') }}" class="card-img" alt="">
                    <div class="card-footer">
                        <a href="#">
                            <button class="btn btn-dark float-right grow">Edit Profile</button>
                        </a>
                    </div>
                </div>
                <hr>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Personal Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2">Full Name: </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" placeholder="Full Name"
                                       name="name"
                                       value="Dickson Igwe">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2">Username: </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" placeholder="Username"
                                       name="username"
                                       value="Dickson">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2">Email: </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" placeholder="Email"
                                       name="email"
                                       value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2">Phone: </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" placeholder="Phone Number"
                                       name="phone"
                                       value="">
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            Social links: &nbsp;&nbsp;&nbsp;
                            <a href="#"><i class="fab fa-facebook-square fa-lg text-dark grow"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fab fa-twitter fa-lg text-dark grow"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fab fa-instagram fa-lg text-dark grow"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fab fa-linkedin fa-lg text-dark grow"></i></a>&nbsp;&nbsp;&nbsp;
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>
<!-- /.container -->
@endsection
