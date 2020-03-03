@extends("shop::layouts.master")

@section('title')
    {{ __('Tutor Application Form') }}
@stop

@section('content')
    <div class="container section_padding_100">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left"> Tutor Application Form </h3>
                    </div>
                    <div class="card-body">
                        {!! Form::model($tutor_application, ['route' => 'user.tutor_application.create']) !!}

                        <div class="form-group">
                            <label for="full_name"> Name </label>
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
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
                            {!! Form::textarea('description', null, ['rows' => 5, 'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('state_id', 'State of Residence') !!}
                            {!! Form::select('state_id', [], null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary"> Save and Continue </button>
                        </div>

                        {!! Form::close() !!}

                        <a href="{{ route('user.tutor_application.add_courses', $tutor_application->id) }}">Add Courses</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
