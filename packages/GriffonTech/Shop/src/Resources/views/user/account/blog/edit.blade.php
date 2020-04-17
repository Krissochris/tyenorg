@extends('shop::layouts.master')

@section('title')
    {{ __('Edit Blog Post') }}
@stop


@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                {!! Form::model($blog, ['route' => ['user.blog.edit', $blog->url_key], 'enctype' => 'multipart/form-data' ]) !!}
                <div class="card">
                    <h5 class="card-header">Edit Blog</h5>
                    <div class="card-body">

                        @if(isset($blog_categories) && !$blog_categories->isEmpty())
                            <div class="form-group">
                                <label for="blog_category">Blog Category</label>
                                {!! Form::select('blog_category_id', $blog_categories, null, ['class' => 'form-control']) !!}
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="title">Title</label>
                            {!! Form::text('title', $blog->title, ['class' => 'form-control', 'placeholder' => 'Blog Title']) !!}
                        </div>
                        <div class="form-group">
                            <label for="body"> Body </label>
                            {!! Form::textarea('body', $blog->body, ['class' => 'form-control tinymce_editor', 'cols' => 30, 'rows' => 10]) !!}
                        </div>

                            <div class="form-group">
                                <label for="body"> Summary </label>
                                {!! Form::textarea('summary', null, ['class' => 'form-control', 'rows' => 5]) !!}
                            </div>

                        <div class="custom-file" >
                            {!! Form::file('photo', ['class' => 'custom-file']) !!}
                        </div>

                        <div class="form-group float-left">
                            <label for="">Status</label>
                            {!! Form::select('status', ['1' => 'Publish', '0' => 'UnPublish'], $blog->status, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group float-right">
                            {!! Form::submit('Update', ['class' => 'btn btn-dark']) !!}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
                <br>
            </div>
        </div>

    </div>


@endsection
