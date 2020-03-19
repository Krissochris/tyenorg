@extends('admin::layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Tutors </h5>
                </div>
                <div class="ibox-content table-responsive">
                    {!! Form::model($tutor,['route' => ['admin.tutors.edit', $tutor->id]]) !!}
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="fileinput fileinput-new" data-provides="fileinput"><input type="hidden" value="" name="...">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; line-height: 150px;">
                                        @if($tutor->photo) <img src="{{ $tutor->photo }}" alt="{{ $tutor->name }}"> @endif
                                    </div>
                                    <div>
                                    <span class="btn btn-default btn-file">
                                    <span class="fileinput-new">Load Image</span>
                                        <span class="fileinput-exists">Change</span>
                                        {!! Form::file('photo') !!}
                                    </span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="title"> Title  </label>
                                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="phone"> Phone Number  </label>
                                        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        <label for="email"> Email  </label>
                                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        <label for="email"> Description  </label>
                                        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                                    </div>

                                    <h4> Payment Details</h4>

                                    <div class="form-group row">
                                        <label class="col-sm-3"> Bank Name </label>
                                        <div class="col-sm-7">
                                            {!! Form::text('bank_name', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3"> Account Name </label>
                                        <div class="col-sm-7">
                                            {!! Form::text('bank_account_name', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3"> Account Number </label>
                                        <div class="col-sm-7">
                                            {!! Form::text('bank_account_number', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3"> Bitcoin Wallet Address </label>
                                        <div class="col-sm-7">
                                            {!! Form::text('btc_wallet_address', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-3"> PayPal Email Address </label>
                                        <div class="col-sm-7">
                                            {!! Form::text('paypal_email_address', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

            <div class="ibox">
                <div class="ibox-title">
                    <h5> Deactivate Tutor </h5>
                </div>
                <div class="ibox-content">
                    {!! Form::model($tutor, ['route' => ['admin.tutors.deactivate', $tutor->id ]]) !!}

                    <div class="form-group">
                        <label for="status">Status</label>

                        {!! Form::select('status', [
                             '1' => 'Active',
                             '-1' => 'UnActive'
                            ], null,
                             ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('submit', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>

@endsection
