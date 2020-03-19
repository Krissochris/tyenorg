@extends("admin::layouts.master")

@section("content")
    <div class="ibox">
        <div class="ibox-title">
            <h5> Edit User </h5>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-md-12">
                    {!! Form::model($user,['route' => ['admin.users.edit', $user->id]]) !!}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name"> Full Name  </label>
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label for="username"> Username  </label>
                                {!! Form::text('username', null, ['class' => 'form-control', 'readonly' => true]) !!}
                            </div>

                            <div class="form-group">
                                <label for="email"> Email  </label>
                                {!! Form::email('email', null, ['class' => 'form-control', 'readonly' => true]) !!}
                            </div>

                            <div class="form-group">
                                <label for="phone_number"> Phone Number  </label>
                                {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                <label for="is_verified"> Is Email Verified </label>
                                <input type="hidden" name="is_verified" value="0">
                                <input id="is_verified" type="checkbox" name="is_verified" value="1" {{ ($user->is_verified) ? 'checked' : '' }} >
                            </div>


                            <div class="form-group">
                                <label for="tutor_id">Tutor Profile </label>
                                {!! Form::select('tutor_id', $tutors, null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                <label for="status"> Status </label>
                                {!! Form::select('status', ['1' => 'active', '0'=> 'unactive'], null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update </button>
                            </div>

                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>


    <div class="ibox">
        <div class="ibox-title">
            <h5> Make A Pro User</h5>
        </div>
        <div class="ibox-content">
            {!! Form::model($user,['route' => ['admin.users.pro_user_update', $user->id]]) !!}

                <div class="form-group">
                    <label for="is_pro_user"> Is Pro user  </label>
                    <input type="hidden" name="is_pro_user" value="0">
                    <input id="is_pro_user" type="checkbox" name="is_pro_user" value="1" {{ ($user->is_pro_user) ? 'checked' : '' }}>

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update </button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>


    <div class="ibox">
        <div class="ibox-title">
            <h5> Edit Payment Details </h5>
        </div>
        <div class="ibox-content">
            {!! Form::model($userPaymentDetail, ['route' => ['admin.users.update_payment_detail', $user->id] ]) !!}
            <h5> Local Bank Details </h5>
            <div class="form-group row">
                <label class="col-sm-2">Bank Details: </label>
                <div class="col-sm-7">
                    {!! Form::text('bank_name', null, ['class' => 'form-control', 'placeholder' => 'Bank Name']) !!}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2"> Account Name: </label>
                <div class="col-sm-7">
                    {!! Form::text('account_name', null, ['class' => 'form-control', 'placeholder' => 'Account Name']) !!}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Account Number: </label>
                <div class="col-sm-7">
                    {!! Form::text('account_number', null, ['class' => 'form-control', 'placeholder' => 'Account Number']) !!}
                </div>
            </div>

            <h5> Bitcoin Detail : </h5>
            <div class="form-group row">
                <label class="col-sm-2">Bitcoin Address: </label>
                <div class="col-sm-7">
                    {!! Form::text('btc_address', null, ['class' => 'form-control', 'placeholder' => 'Bitcoin Address']) !!}
                </div>
            </div>

            <h5> PayPal Details</h5>
            <div class="form-group row">
                <label class="col-sm-2">PayPal Email Address: </label>
                <div class="col-sm-7">
                    {!! Form::email('paypal_email_address', null, ['class' => 'form-control', 'placeholder' => 'PayPal Email Address']) !!}
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
