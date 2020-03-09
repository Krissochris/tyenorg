@extends("admin::layouts.master")

@section("title")
    Admin | Create Testimony
@stop

@section("content")
    <div class="ibox">
        <div class="ibox-title">
            <h5> Create Testimony</h5>
        </div>
        <div class="ibox-content">
            {!! Form::open(['route' => 'admin.testimonies.create']) !!}
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

@endsection
