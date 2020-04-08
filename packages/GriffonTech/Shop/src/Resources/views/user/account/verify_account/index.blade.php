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
                        To continue, Please click <a class="text-primary" href="{{ route('user.resend.verification-email', auth('user')->user()->email) }}">Here</a> verify the email you registered in your account.
                        <p> Please check the spam folder in your email if you couldn't find it in inbox. </p>

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
