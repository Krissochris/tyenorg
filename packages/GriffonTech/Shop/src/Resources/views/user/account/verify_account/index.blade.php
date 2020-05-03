@extends('shop::layouts.master')


@section('content')
    <!-- Page Content -->
    <div class="container section_padding_100">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Verify your account </h4>
                    </div>
                    <div class="card-body">
                        We've sent an email verifications link to your mail. If you didn't receive the email after few minutes,
                        click
                        <a class="text-primary" href="{{ route('user.resend.verification-email', auth('user')->user()->email) }}">
                            Resend verification</a> for a new link.

                        Please, check your spam folder and other email folders too for the link before clicking to resend a new link.

                        Use this box below to update your email, if you previously used the wrong email during registration.
                        Then hit
                        <a class="text-primary" href="{{ route('user.resend.verification-email', auth('user')->user()->email) }}">Resend verification</a>

                        <div class="row" style="margin-top: 20px;">
                            <div class="col-sm-6">
                                {!! Form::open(['route' => 'user.change_verification_email']) !!}
                                <div class="form-group">
                                    {!! Form::text('email', auth('user')->user()->email, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <br>
            <br>
        </div>
    </div>
    <!-- /.container -->
@endsection
