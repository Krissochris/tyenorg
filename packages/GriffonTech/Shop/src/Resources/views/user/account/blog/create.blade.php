@extends('shop::layouts.master')

@section('title')
    {{ __('New Blog Post') }}
@stop


@section('content')
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                {!! Form::open(['route' => 'user.blog.create', 'enctype' => 'multipart/form-data']) !!}
                <div class="card">
                    <h4 class="card-header py-xl-3 text-center">Create Blog</h4>
                    <div class="card-body">

                        @if(isset($blog_categories) && !$blog_categories->isEmpty())
                        <div class="form-group">
                            <label for="blog_category">Blog Category</label>
                            {!! Form::select('blog_category_id', $blog_categories, null, ['class' => 'form-control shadow-sm']) !!}
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="title">Title</label>
                            {!! Form::text('title', null, ['class' => 'form-control shadow-sm', 'placeholder' => 'Blog Title']) !!}
                        </div>

                        <div class="form-group">
                            <label for="body"> Body </label>
                            {!! Form::textarea('body', null, ['class' => 'form-control tinymce_editor', 'cols' => 30, 'rows' => 10]) !!}
                        </div>

                        <div class="form-group">
                            <label for="body"> Summary </label>
                            {!! Form::textarea('summary', null, ['class' => 'form-control shadow-sm', 'rows' => 5]) !!}
                        </div>

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="customFile">Blog Image</label>
                                    <div class="custom-file">
                                        {!! Form::file('photo', ['class' => 'custom-file-input shadow-sm']) !!}
                                        <label for="customFile" class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    {!! Form::select('status', ['1' => 'Published', '0' => 'UnPublish'], null, ['class' => 'form-control shadow-sm']) !!}
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="card-footer">
                        <div class="form-group float-right">
                            {!! Form::submit('Create', ['class' => 'btn btn-dark']) !!}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
                <br>
            </div>
        </div>

    </div>


@endsection
