@extends("tutor::layout.master")

@section("content")


    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center justify-content-between">
            <h1 class="m-0">Edit Profile</h1>
        </div>
    </div>


    <div class="container page__container">
        <div class="row">
            <div class="col-sm-12">
                <form action="{{ route('tutor.profile.edit') }}" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Personal Details</h4>
                                </div>
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label class="col-sm-2" for="photo">Profile Picture</label>
                                        <div class="col-sm-7">
                                            {!! Form::file('photo', ['class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2"> Title </label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control"
                                                   placeholder="Eg. John Deo" name="name"
                                                   value="{{ (old('name')) ? old('name') : $tutor->name }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2"> Title </label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control"
                                                   placeholder="Eg. Social Media Marketer" name="title"
                                                   value="{{ (old('title')) ? old('title') : $tutor->title }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2"> Phone </label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" placeholder="Phone"
                                                   name="phone"
                                                   value="{{ (old('phone')) ? old('phone') : $tutor->phone }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2"> Email </label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" placeholder="Email"
                                                   name="email"
                                                   value="{{ (old('email')) ? old('email') : $tutor->email }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2"> Social Handles: </label>
                                        <div class="col-sm-7">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                           placeholder="Facebook link" name="facebook_url"
                                                           value="{{ (old('facebook_url')) ? old('facebook_url') : $tutor->facebook_url }}">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                           placeholder="Website link" name="website_url"
                                                           value="{{ (old('website_url')) ? old('website_url') : $tutor->website_url }}">
                                                </div>
                                            </div>
                                            <br>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                           placeholder="LinkedIn link" name="linkedIn_url"
                                                           value="{{ (old('linkedIn_url')) ? old('linkedIn_url') : $tutor->linkedIn_url }}">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                           placeholder="Youtube Channel" name="youtube_url"
                                                           value="{{ (old('youtube_url')) ? old('youtube_url') : $tutor->youtube_url }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2"> About Me </label>
                                        <div class="col-sm-7">
                                            <textarea name="description" id="" class="form-control"
                                                      rows="5">{{ (old('description')) ? old('description') : $tutor->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" class="btn btn-dark" value="Update">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                {!! Form::model($tutor, ['route' => 'tutor.profile.update_payment_detail']) !!}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Payment Details </h4>
                                </div>
                                <div class="card-body">
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

                                </div>

                                <div class="card-footer">
                                    <input type="submit" class="btn btn-dark" value="Update">
                                </div>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection
