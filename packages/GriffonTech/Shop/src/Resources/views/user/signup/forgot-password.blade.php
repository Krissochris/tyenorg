@extends('shop::layouts.master')

@section('page_title')
 {{ __('shop::app.customer.forgot-password.page_title') }}
@stop

@push('css')
    <style>
        .button-group {
            margin-bottom: 25px;
        }
        .primary-back-icon {
            vertical-align: middle;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"> Password Reset </div>
                    <div class="card-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('customer.forgot-password.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-12 control-label">{{ __('shop::app.user.forgot-password.email') }}</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-12 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('shop::app.user.forgot-password.submit') }}
                                    </button>


                                    <div class="control-group" style="margin-bottom: 0px;">
                                        <a href="{{ route('user.session.index') }}">
                                            <i class="icon primary-back-icon"></i>
                                            {{ __('shop::app.user.reset-password.back-link-title') }}
                                        </a>
                                    </div>
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
@endsection