@extends("admin::layouts.master")

@section("title")
    Admin | Create Testimony
@stop

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Create Testimony </h3>
                        <a href="{{route('admin.testimonies.index')}}" class="btn btn-dark float-right">Go Back</a>
                    </div>

                    <div class="card-body">
                        {!! Form::model($testimony, ['route' => ['admin.testimonies.edit', $testimony->id] ]) !!}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="user_id"> User</label>
                                    {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="testimony"> Testimony </label>
                                    {!! Form::textarea('testimony', null, ['class' => 'form-control', 'placeholder' => 'Testimony']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="testimony"> Status </label>
                                    {!! Form::select('status', $status, null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary float-right" value="Create">
                                </div>
                            </div>

                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
@endsection
