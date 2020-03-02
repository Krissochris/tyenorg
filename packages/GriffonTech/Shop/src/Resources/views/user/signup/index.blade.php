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
                            <h3>Register</h3>
                        </div>
                        <!-- Breadcumb page pagination start -->
                        <div class="page_pagination">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                <li>Register</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcumb area end -->

    <!-- Login area start -->
    <div class="login_area section_padding_100">
        <div class="container">
            <div class="row">
                <!-- Login thumb -->
                <div class="col-12 col-lg-5 col-xl-6">
                    <div class="login_thumb" style="background-image: url({{ asset('lms/img/bg-pattern/courses-bg.jpg') }});">
                        <!-- Login thumb caption -->
                        <div class="login_thumb_caption">
                            <h3>Register is so Easy!</h3>
                            <p>Register &amp; start learning.</p>
                        </div>
                    </div>
                </div>
                <!-- Register form area start  -->
                <div class="col-12 col-lg-7 col-xl-6">
                    <div class="register_form">
                        <form role="form" method="POST" action="{{ route('user.register.create') }}">
                            {{ csrf_field() }}
                            <!-- Single Register input area start  -->
                                <div class="form-group">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                    <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Full Name" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <input id="username" type="text" name="username" value="{{ old('username') }}" placeholder="Username" required>

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            <!-- Single Register input area start  -->
                            <div class="form-group">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <input id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- Single Register input area start  -->
                            <div class="form-group">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <!-- Single Register input area start  -->
                            <div class="form-group">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <input id="password-confirm" type="password" name="password_confirmation" placeholder="Password Confirm" required>
                            </div>
                            <!-- Single Register input area start  -->
                            <button type="submit" class="btn btn-default" id="login_submit">Sign Up</button>
                        </form>
                        <div class="already_have_account">
                            <a href="{{ route('user.session.index') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> Already have a account? Login</a>
                        </div>
                    </div>
                </div>
                <!-- Register form area end  -->
            </div>
        </div>
    </div>
    <!-- Login area end -->
@endsection
