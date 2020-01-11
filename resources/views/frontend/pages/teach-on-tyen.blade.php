@extends('frontend.layouts.header')
@section('content')
<div class="d-flex p-3 bg-secondary text-white">
    <img src="images/teach.jpg" class="img-fluid z-1" alt="Instructor's banner">
</div>
    <div class="container text-center">
        <div style="margin: 15px auto"><h2 class="font-weight-lighter">Discover Your Potential</h2></div>
        <br>
        <div class="row">
            <div class="col-sm-4 text-content text-center ">
                <i class="fa fa-piggy-bank fa-2x"></i>
                <h3 class="mt15">Earn money</h3>
                <div>Earn money every time a student purchases your course. Get paid monthly through PayPal or Payoneer, it’s your choice.</div>
                <hr>
            </div>
            <div class="col-sm-4 text-content text-center ">
                <i class="fa fa-video fa-2x"></i>
                <h3 class="mt15">Inspire Students</h3>
                <div>Help people learn new skills, advance their careers, and explore their hobbies by sharing your knowledge.</div>
                <hr>
            </div>
            <div class="col-sm-4 text-content text-center ">
                <i class="fa fa-thumbs-up fa-2x"></i>
                <h3 class="mt15">Join our Community</h3>
                <div>Take advantage of our active community of instructors to help you through your course creation process.</div>
                <hr>
            </div>


        </div>
            <div class="row py-5">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card h-100">
                        <button class="btn btn-outline-dark btn-lg">Leaders Table</button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card h-100">
                        <button class="btn btn-outline-dark btn-lg">Social Links Here...</button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card h-100">
                        <button class="btn btn-outline-dark btn-lg">Face of TYEN</button>
                    </div>
                </div>
            </div>


        <div style="margin: 15px auto"><h2 class="font-weight-lighter">Testimonials</h2></div>
        <br>

        <div class="container align-content-center col-md-10">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 text-center">
                        <img class="card-img-top" src="images/cover.jpeg" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Team Member</h4>
                            <h6 class="card-subtitle mb-2 text-muted">Position</h6>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p>
                        </div>
                        <div class="card-footer">
                            <a href="#">name@example.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 text-center">
                        <img class="card-img-top" src="images/cover%20(1).jpg" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Team Member</h4>
                            <h6 class="card-subtitle mb-2 text-muted">Position</h6>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p>
                        </div>
                        <div class="card-footer">
                            <a href="#">name@example.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 text-center">
                        <img class="card-img-top" src="images/cover%20(2).jpg" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Team Member</h4>
                            <h6 class="card-subtitle mb-2 text-muted">Position</h6>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p>
                        </div>
                        <div class="card-footer">
                            <a href="#">name@example.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div style="margin: 15px auto"><h2 class="font-weight-lighter">Become an instructor today</h2></div>
        <p style="margin: 15px auto">Join our online learning marketplace.</p>
        <a href="{{route('user.session.index')}}"><button class="btn btn-primary btn-lg">Get started</button></a>
        <hr>
    </div>
@endsection
