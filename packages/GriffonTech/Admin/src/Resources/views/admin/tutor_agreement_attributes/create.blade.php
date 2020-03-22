@extends('admin::layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Create Tutor Agreement Attribute </h5>
                </div>
                <div class="ibox-content table-responsive">
                    {!! Form::open(['route' => 'admin.tutor_agreement_attributes.create', 'enctype' => 'multipart/form-data']) !!}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="title"> Code </label>
                                        {!! Form::text('code', null, ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        <label for="title"> Admin Name </label>
                                        {!! Form::text('admin_name', null, ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Input Type  </label>
                                        {!! Form::select('type', $types, null, ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        <label for="email"> Position  </label>
                                        {!! Form::number('position', null, ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
