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
                                <td>Agbafor Olisa Emmanuel</td>
                            </tr>
                            <tr>
                                <td>Username:</td>
                                <td>Agbafolisa</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>agbafolisa@gmail.com</td>
                            </tr>
                            <tr>
                                <td>Registered:</td>
                                <td>2019-08-12 08:54:23 AM</td>
                            </tr>
                            </tbody>
                        </table>
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
@endsection
