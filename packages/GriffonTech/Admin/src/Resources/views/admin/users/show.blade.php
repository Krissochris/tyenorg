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
                        <h4 class="float-left">User's profile</h4>
                        <a href="{{route('admin.users.index')}}" class="btn btn-dark float-right">Go Back</a>
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
                                <td> {{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td>Username:</td>
                                <td> {{ $user->username }}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td> {{ $user->email }} </td>
                            </tr>
                            <tr>
                                <td>Phone Number:</td>
                                <td> {{ $user->phone_number }} </td>
                            </tr>
                            <tr>
                                <td>Is pro user:</td>
                                <td> {{ ($user->is_pro_user) ? 'Yes' : 'No' }} </td>
                            </tr>
                            <tr>
                                <td>Status:</td>
                                <td> {{ ($user->status) ? 'active' : 'unactive' }} </td>
                            </tr>
                            <tr>
                                <td>Registered:</td>
                                <td> {{ $user->created_at }}</td>
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
