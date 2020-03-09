@extends('admin::layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Create Tutor </h5>
                </div>
                <div class="ibox-content table-responsive">
                    {!! Form::open(['route' => 'admin.tutors.create', 'enctype' => 'multipart/form-data']) !!}
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="fileinput fileinput-new" data-provides="fileinput"><input type="hidden" value="" name="...">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; line-height: 150px;"></div>
                                    <div>
                    <span class="btn btn-default btn-file">
                        <span class="fileinput-new">Load Image</span><span class="fileinput-exists">Change</span>{!! Form::file('photo') !!}</span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="title"> User </label>
                                        {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
                                    </div>

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
                                        <label for="status">Status</label>
                                        {!! Form::select('status', $status, null, ['class' => 'form-control']) !!}
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
