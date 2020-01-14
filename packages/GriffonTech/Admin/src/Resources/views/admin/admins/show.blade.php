@extends("admin::layouts.master")

@section("content")
    <div class="container">
        <div class="container col-md-10 bg-dark">
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{ asset('images/26238.png')}}" class="card-img" alt="">
                        <div class="card-footer">
                            <a href="#">
                                <button class="btn btn-dark text-center"><i class="fa fa-envelope-open-text"></i> Message</button>
                            </a>
                        </div>
                    </div>
                    <hr>
                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="float-left">Admin profile</h4>
                            <a href="{{route('admin.admins.index')}}" class="btn btn-dark float-right">Go Back</a>
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
                                    <td> {{ $admin->name }}</td>
                                </tr>
                                <tr>
                                    <td>Username:</td>
                                    <td> {{ $admin->username }}</td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td> {{ $admin->email }} </td>
                                </tr>
                                <tr>
                                    <td>Phone Number:</td>
                                    <td> {{ $admin->phone_number }} </td>
                                </tr>

                                <tr>
                                    <td>Status:</td>
                                    <td> {{ ($admin->status) ? 'active' : 'unactive' }} </td>
                                </tr>
                                <tr>
                                    <td>Registered:</td>
                                    <td> {{ $admin->created_at }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>


@endsection
