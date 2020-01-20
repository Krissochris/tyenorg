@extends("admin::layouts.master")

@section("content")
    <div class="container mb-4">
        <hr>
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 class="float-left">Admin's profile</h4>
                        <a href="{{route('admin.admins.index')}}" class="btn btn-dark float-right">Go Back</a>
                    </div>
                    <div class="card-body">
                        {!! Form::model(['route' => ['admin.admins.edit']]) !!}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name"> Full Name  </label>
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    <label for="username"> Username  </label>
                                    {!! Form::text('username', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="email"> Email  </label>
                                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="password"> Password  </label>
                                    {!! Form::password('password',['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="password_confirm"> Password Confirm  </label>
                                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="phone_number"> Phone Number  </label>
                                    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
                                </div>


                                <div class="form-group">
                                    <label for="is_verified"> Is Verified </label>
                                    <input type="hidden" name="is_verified" value="0">
                                    <input id="is_verified" type="checkbox" name="is_verified" value="1">
                                </div>

                                <div class="form-group">
                                    <label for="status"> Status </label>
                                    {!! Form::select('status', ['1' => 'active', '0'=> 'unactive'], null) !!}
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"> Submit </button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
@endsection
