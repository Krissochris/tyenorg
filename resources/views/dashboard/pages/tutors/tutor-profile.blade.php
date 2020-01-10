@extends('dashboard.layouts.header')
@section('content')
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('tutor-courses')}}" style="text-decoration: none">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Edit Profile</li>
            </ol>
<div class="container">
    <form action="" class="form">

    <div class="container col-md-11">
        <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{ asset('images/26238.png')}}" class="card-img" alt="">
                        <div class="card-footer text-center">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
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
                            <table class="table table-hover table-bordered table-striped">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Field</th>
                                    <th>Value</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Full Name:</td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Enter your full name" value="Agbafor Olisa Emmanuel">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Username:</td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Enter your username" value="Agbafolisa">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Email" value="admin@admin.com">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Phone:</td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Phone" value="+234 4343 5656 78">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-dark" value="Update">
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
    </form>
</div>
@endsection
