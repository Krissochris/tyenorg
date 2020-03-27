@extends('shop::layouts.auth')

@section('title')
    User Login
@stop

@section('content')



    <form method="POST" action="{{ route('user.session.create') }}" novalidate>
        @csrf
        <div class="form-group">
            <label class="text-label" for="email">Email Address:</label>
            <div class="input-group input-group-merge">
                <input id="email" name="email" value="{{ old('email') }}"  type="email" required autofocus class="form-control form-control-prepended" placeholder="john@doe.com">
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
                        <span class="fa fa-key"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group mb-1">
            <button class="btn btn-block btn-primary" type="submit">Login</button>
        </div>
        <div class="form-group text-center">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="remember_me" class="custom-control-input" id="remember">
                <label class="custom-control-label" for="remember">Remember me for 30 days</label>
            </div>
        </div>
        <div class="form-group text-center mb-0">
            <a href="{{ route('user.forgot-password.create') }}">Forgot password?</a> <br>
            Don't have an account? <a class="text-underline" href="{{ route('user.register.index') }}">Sign up</a>
        </div>
    </form>
@endsection
