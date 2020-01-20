@extends('shop::layouts.master')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <h5 class="card-header">Create Blog</h5>
                    <div class="card-body">
                        {!! Form::open(['route' => 'user.blog.create']) !!}
                        <div class="form-group">
                            <label for="title">Title</label>
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Blog Title']) !!}
                        </div>
                        <div class="form-group">
                            <label for="body"> Body </label>
                            {!! Form::textarea('body', null, ['class' => 'form-control', 'cols' => 30, 'rows' => 10]) !!}
                        </div>

                        <div class="custom-file" >
                            {!! Form::file('photo', ['class' => 'custom-file']) !!}
                        </div>

                        <div class="form-group float-left">
                            <label for="">Status</label>
                            {!! Form::select('status', [], null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group float-right">
                            {!! Form::submit('Create', ['class' => 'btn btn-dark']) !!}
                        </div>



                        {!! Form::close() !!}
                    </div>
                </div>
                <br>
            </div>
        </div>

    </div>


@endsection
