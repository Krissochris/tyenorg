@extends('frontend.layouts.header')
@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <br>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Home</a>
            </li>
            <li class="breadcrumb-item active">Course Details</li>
        </ol>
        <div class="container">
            <div class="row bg-dark">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-img">
                            <img src="images/cover.jpeg" class="card-img" alt="Course Image">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="float-right"><a href="#" class="text-warning nav-link"><i class="fa fa-heart"></i> Whislist</a></div>
                        <div class="card-title text-light"><h2>JavaScript From Scratch</h2></div>
                        <h6 class="text-light">The only course you need to learn web development - HTML, CSS, JS, Node, and More!</h6>
                        <div>
                            <span class="bg-warning text-dark" style="border-radius: 4px 4px 0 0; padding: 0px 10px"> Rating...</span>
                            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                        </div>
                        <small class="text-light">Created By: <span class="text-muted">Anderson Mike</span></small>
                        <div class="float-right">
                            <a href="#">
                                <button class="btn btn-primary">Add to cart</button>
                            </a>
                            <a href="#">
                                <button class="btn btn-light">Subscribe now</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">What you will learn</div>
                        <div class="card-body">
                            <ul>
                                <li>Make REAL web applications using cutting-edge technologies</li>
                                <li>Write your own browser-based game</li>
                                <li>Create complex HTML forms with validations</li>
                                <li>Make REAL web applications using cutting-edge technologies</li>
                                <li>Write your own browser-based game</li>
                                <li>Create complex HTML forms with validations</li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Course Content</div>
                        <div class="card-body">
                            <ul>
                                <li>Make REAL web applications using cutting-edge technologies</li>
                                <li>Write your own browser-based game</li>
                                <li>Create complex HTML forms with validations</li>
                                <li>Make REAL web applications using cutting-edge technologies</li>
                                <li>Write your own browser-based game</li>
                                <li>Create complex HTML forms with validations</li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Requirements</div>
                        <div class="card-body">
                            <ul>
                                <li>Make REAL web applications using cutting-edge technologies</li>
                                <li>Write your own browser-based game</li>
                                <li>Create complex HTML forms with validations</li>
                                <li>Make REAL web applications using cutting-edge technologies</li>
                                <li>Write your own browser-based game</li>
                                <li>Create complex HTML forms with validations</li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Description</div>
                        <div class="card-body">
                            <ul>
                                <li>Make REAL web applications using cutting-edge technologies</li>
                                <li>Write your own browser-based game</li>
                                <li>Create complex HTML forms with validations</li>
                                <li>Make REAL web applications using cutting-edge technologies</li>
                                <li>Write your own browser-based game</li>
                                <li>Create complex HTML forms with validations</li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="container col-md-10 bg-dark">
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <img src="images/26238.png" class="card-img" alt="">
                            <div class="card-footer">
                                <a href="#">
                                    <button class="btn btn-dark float-right">Message</button>
                                </a>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tutor's profile</h4>
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
                                        <td>Phone:</td>
                                        <td>+234 7058 337 306</td>
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
            <hr>
            <!-- Related courses -->
            <h2>Related courses</h2>
            <div class="row text-center">
                <div class="col-lg-2 col-sm-4 mb-4">
                    <a href="#">
                        <img class="img-fluid" src="images/cover.jpeg" alt="">
                        <small>PHP from Scratch</small>
                    </a>
                </div>
                <div class="col-lg-2 col-sm-4 mb-4">
                    <a href="#">
                        <img class="img-fluid" src="images/cover.jpeg" alt="">
                        <small>Complete HTML5</small>
                    </a>
                </div>
                <div class="col-lg-2 col-sm-4 mb-4">
                    <a href="#">
                        <img class="img-fluid" src="images/cover%20(1).jpg" alt="">
                        <small>Complete Course in CSS</small>
                    </a>
                </div>
                <div class="col-lg-2 col-sm-4 mb-4">
                    <a href="#">
                        <img class="img-fluid" src="images/cover%20(1).jpg" alt="">
                        <small>Bootstrap Framework</small>
                    </a>
                </div>
                <div class="col-lg-2 col-sm-4 mb-4">
                    <a href="#">
                        <img class="img-fluid" src="images/cover%20(2).jpg" alt="">
                        <small>Laravel From Scratch</small>
                    </a>
                </div>
                <div class="col-lg-2 col-sm-4 mb-4">
                    <a href="#">
                        <img class="img-fluid" src="images/cover%20(2).jpg" alt="">
                        <small>PHP and MySql Tutorial</small>
                    </a>
                </div>
            </div>
            <!-- /.row -->
            <hr>
        </div>
    </div>
    <!-- /.container -->
@endsection
