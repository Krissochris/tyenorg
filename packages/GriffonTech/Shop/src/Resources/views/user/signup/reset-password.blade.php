@extends('shop::layouts.master')

@section('page_title')
 {{ __('shop::app.user.reset-password.title') }}
@endsection

@section('content')
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"> {{ __('shop::app.user.reset-password.title') }} </div>
                    <div class="card-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('user.reset-password.store') }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-12 control-label">{{ __('shop::app.user.reset-password.email') }}</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-12 control-label">{{ __('shop::app.user.reset-password.password') }}</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                                <label for="confirm_password" class="col-md-12 control-label">{{ __('shop::app.user.reset-password.confirm-password') }}</label>

                                <div class="col-md-12">
                                    <input id="confirm_password" type="password" class="form-control" name="password_confirmation">
                                    @if ($errors->has('confirm_password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('confirm_password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-12 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('shop::app.user.reset-password.submit-btn-title') }}
                                    </button>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr><br>
            </div>
            <div class="col-md-4"></div>

        </div>
    </div>








<div class="auth-content">

{{--
    {!! view_render_event('bagisto.shop.customers.reset_password.before') !!}
--}}

    <form method="post" action="{{ route('user.reset-password.store') }}" >

        {{ csrf_field() }}

        <div class="login-form">

            <div class="login-text">{{ __('shop::app.user.reset-password.title') }}</div>

            <input type="hidden" name="token" value="{{ $token }}">

{{--
            {!! view_render_event('bagisto.shop.customers.reset_password_form_controls.before') !!}
--}}

            <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                <label for="email">{{ __('shop::app.customer.reset-password.email') }}</label>
                <input type="text" v-validate="'required|email'" class="control" id="email" name="email" value="{{ old('email') }}"/>
                <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
            </div>

            <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                <label for="password">{{ __('shop::app.customer.reset-password.password') }}</label>
                <input type="password" class="control" name="password" v-validate="'required|min:6'" ref="password">
                <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
            </div>

            <div class="control-group" :class="[errors.has('confirm_password') ? 'has-error' : '']">
                <label for="confirm_password">{{ __('shop::app.customer.reset-password.confirm-password') }}</label>
                <input type="password" class="control" name="password_confirmation"  v-validate="'required|min:6|confirmed:password'">
                <span class="control-error" v-if="errors.has('confirm_password')">@{{ errors.first('confirm_password') }}</span>
            </div>

{{--
            {!! view_render_event('bagisto.shop.customers.reset_password_form_controls.before') !!}
--}}

            <input class="btn btn-primary btn-lg" type="submit" value="{{ __('shop::app.customer.reset-password.submit-btn-title') }}">

        </div>
    </form>

{{--
    {!! view_render_event('bagisto.shop.customers.reset_password.before') !!}
--}}
</div>
@endsection