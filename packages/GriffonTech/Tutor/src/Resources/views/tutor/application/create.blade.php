@extends("tutor::layout.master")

@section('title')
{{ __('Tutor Application Form') }}
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left"> Tutor Application Form </h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'tutor.applications.save']) !!}

                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="first_name">First Name</label>
                                {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="first_name">Last Name</label>

                                {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('phone_number', 'Phone Number') !!}
                            {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
@endsection
