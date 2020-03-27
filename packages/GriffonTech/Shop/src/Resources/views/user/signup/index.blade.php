@extends('shop::layouts.auth')

@section('title')
    User Registration
@stop


@section('content')

    <form method="POST" action="{{ route('user.register.create') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="text-label" for="name">Name:</label>
            <div class="input-group input-group-merge">
                <input id="name" name="name" value="{{ old('name') }}" type="text" required="" class="form-control form-control-prepended" placeholder="John Doe">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="far fa-user"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="text-label" for="username">Username:</label>
            <div class="input-group input-group-merge">
                <input id="username" name="username" value="{{ old('username') }}" type="text" required="" class="form-control form-control-prepended" placeholder="JohnDeo">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="far fa-user"></span>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group">
            <label class="text-label" for="email">Email Address:</label>
            <div class="input-group input-group-merge">
                <input id="email" name="email" value="{{ old('email') }}"  type="email" required="" class="form-control form-control-prepended" placeholder="john@doe.com">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="far fa-envelope"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="text-label" for="password">Password:</label>
            <div class="input-group input-group-merge">
                <input id="password" name="password" type="password" required="" class="form-control form-control-prepended" placeholder="Enter your password">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="material-icons">lock</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="text-label" for="password_confirmation">Confirm Password:</label>
            <div class="input-group input-group-merge">
                <input id="password_confirmation" type="password" required="" class="form-control form-control-prepended" placeholder="Re-Enter your password">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="material-icons">lock</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group mb-2 text-center">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="terms" name="terms_and_conditions" />
                <label class="custom-control-label" for="terms">I accept <a href="#">Terms and Conditions</a></label>
            </div>
        </div>
        <div class="form-group text-center">
            <button class="btn btn-success btn-lg btn-block mb-3" type="submit">Create Account</button>
        </div>
        <div class="text-center">
            <span>Have an account?</span> <a class="text-body text-underline" href="{{ route('user.session.index') }}"> Login</a>
        </div>
    </form>



























    <!-- Login area start -->
    {{--<div class="login_area section_padding_100">
        <div class="container">
            <div class="row">
                <!-- Login thumb -->
                <div class="col-12 col-lg-5 col-xl-6">
                    <div class="login_thumb" style="background-image: url({{ asset('lms/img/bg-pattern/courses-bg.jpg') }});">
                        <!-- Login thumb caption -->
                        <div class="login_thumb_caption">
                            <h3>Registration is so Easy!</h3>
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
    </div>--}}
    <!-- Login area end -->
@endsection
