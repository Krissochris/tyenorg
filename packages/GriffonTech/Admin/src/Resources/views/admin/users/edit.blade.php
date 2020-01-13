@extends("admin::layouts.master")

@section("content")
    <div class="container">
        <div class="container col-md-10 bg-dark">
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{ asset('images/26238.png')}}" class="card-img" alt="">
                        <div class="card-footer">
                            <a href="#">
                                <button class="btn btn-dark text-center"><i class="fa fa-envelope-open-text"></i> Change </button>
                            </a>
                        </div>
                    </div>
                    <hr>
                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="float-left">User's profile</h4>
                            <a href="{{route('admin.users.index')}}" class="btn btn-dark float-right">Go Back</a>
                        </div>
                        <div class="card-body">
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
                                            <label for="is_pro_user"> Is Pro user  </label>
                                            <input type="hidden" name="is_pro_user" value="0">
                                            <input id="is_pro_user" type="checkbox" name="is_pro_user" value="1" {{ old('is_pro_user') ? 'checked' : ($user->is_pro_user) ? 'checked' : '' }}>
                                        </div>

                                        <div class="form-group">
                                            <label for="is_verified"> Is Verified </label>
                                            <input type="hidden" name="is_verified" value="0">
                                            <input id="is_verified" type="checkbox" name="is_verified" value="1" {{ old('is_verified') ? 'checked' : ($user->is_verified) ? 'checked' : '' }}>
                                        </div>

                                        <div class="form-group">
                                            <label for="status"> Status </label>
                                            {!! Form::select('status', ['1' => 'active', '0'=> 'unactive'], null) !!}
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Update </button>
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
