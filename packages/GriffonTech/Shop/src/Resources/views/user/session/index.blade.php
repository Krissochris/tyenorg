@extends('shop::layouts.master')

@section('content')
    <!-- ===================== Breadcumb area start ===================== -->
    <section class="breadcumb_area" style="background-image: url({{ asset('lms/img/bg-pattern/breadcumb.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcumb_section">
                        <!-- Breadcumb page title start -->
                        <div class="page_title">
                            <h3>sign in</h3>
                        </div>
                        <!-- Breadcumb page pagination start -->
                        <div class="page_pagination">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                <li>Sign in</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===================== Breadcumb area end ===================== -->

    <!-- ===================== login area start ===================== -->
    <section class="login_area section_padding_100">
        <div class="container">
            <div class="row">

                <div class="col-12 col-lg-5 col-xl-6 item">
                    <!-- Login thumb start -->
                    <div class="login_thumb" style="background-image: url({{ asset('lms/img/bg-pattern/courses-bg.jpg') }});">
                        <!-- Login thumb caption -->
                        <div class="login_thumb_caption">
                            <h3>Welcome Back!</h3>
                            <p>Continue your learning by sign in.</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-7 col-xl-6 item">
                    <!-- login form start -->
                    <div class="login_form">
                        <!-- sign in manual form -->
                        <div class="login_manual_form">
                            <form role="form" method="post" action="{{ route('user.session.create') }}">
                                @csrf
                                <div class="form-group">
                                    <i class="fa fa-user"></i>
                                    <input id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                    <input id="password" type="password" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-default" id="login_submit">Sign in</button>
                            </form>
                            <!-- forget password -->
                            <div class="forget_pass one">
                                <a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i>Forget Password</a>
                            </div>
                            <div class="forget_pass">
                                <a href="{{ route('user.register.index') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>Didn't have a account? Register</a>
                            </div>
                        </div>
                    </div>
                    <!-- login form end -->
                </div>
            </div>
        </div>
    </section>
    <!-- ===================== login area end ===================== -->
@endsection
