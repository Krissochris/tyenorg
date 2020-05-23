@extends('shop::layouts.auth')

@section('title')
    User Registration
@stop

@section('fb_pixel_script')
    fbq('track', 'CompleteRegistration');
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
                <input id="password_confirmation" name="password_confirmation" type="password" required="" class="form-control form-control-prepended" placeholder="Re-Enter your password">
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
                <label class="custom-control-label" for="terms">I accept <a href="{{ route('pages.view', 'page_terms_&_conditions') }}">Terms and Conditions</a></label>
            </div>
        </div>
        <div class="form-group text-center">
            <button class="btn btn-success btn-lg btn-block mb-3" type="submit">Create Account</button>
        </div>
        <div class="text-center">
            <span>Have an account?</span> <a class="text-body text-underline" href="{{ route('user.session.index') }}"> Login</a>
        </div>
    </form>
@endsection
