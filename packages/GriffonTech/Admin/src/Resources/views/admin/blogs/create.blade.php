@extends("admin::layouts.master")

@section("content")

    <div class="container">
            <div class="col-sm-11">
                <div class="card">
                    <div class="card-header">
                        <h4 class="float-left">Create Blog</h4>
                        <a href="{{route('admin.blogs.index')}}" class="btn btn-dark float-right">Go Back</a>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.blogs.create']) !!}
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="slug"> User </label>
                                {!! Form::select('user_id', $users, null, ['class'=> 'form-control']) !!}
                            </div>
                            <div class="col-sm-6">
                                <label for="customFile">Blog Image</label>
                                <div class="custom-file">
                                    <input type="file" name="photo" class="custom-file-input">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title">Title</label>
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                        </div>

                        <div class="form-group">
                            <label for="body">Blog body</label>
                            {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Blog body...']) !!}
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-dark" name="submit" value="Create Blog">
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        <hr>
    </div>

@endsection
