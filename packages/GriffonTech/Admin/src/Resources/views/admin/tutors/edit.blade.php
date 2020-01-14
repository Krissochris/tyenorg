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
                            <a href="{{route('admin.tutors.index')}}" class="btn btn-dark float-right">Go Back</a>
                        </div>
                        <div class="card-body">
                            {!! Form::model($tutor,['route' => ['admin.tutors.edit', $tutor->id]]) !!}
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
