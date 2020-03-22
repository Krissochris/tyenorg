@extends('admin::layouts.master')

@section('title')
    {{ __('Edit Tutor Agreement Attribute Option') }}
@stop



@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Edit Tutor Agreement Attribute Options </h5>
                </div>
                <div class="ibox-content table-responsive">
                    {!! Form::model($tutor_agreement_attribute_option, ['route' => ['admin.tutor_agreement_attribute_options.edit',$tutor_agreement_attribute_option->id], 'enctype' => 'multipart/form-data']) !!}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Tutor Agreement Attribute </label>
                                        {!! Form::select('tutor_agreement_attribute_id', $tutor_agreement_attributes, null, ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        <label for="title"> Admin Name </label>
                                        {!! Form::text('admin_name', null, ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        <label for="email"> Sort Order </label>
                                        {!! Form::number('sort_order', null, ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update</button>
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
