@extends('shop::layouts.master')

@section('title')
    {{ __('New Blog Post') }}
@stop


@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                {!! Form::open(['route' => 'user.blog.create', 'enctype' => 'multipart/form-data']) !!}
                <div class="card">
                    <h5 class="card-header">Create Blog</h5>
                    <div class="card-body">

                        @if(isset($blog_categories) && !$blog_categories->isEmpty())
                        <div class="form-group">
                            <label for="blog_category">Blog Category</label>
                            {!! Form::select('blog_category_id', $blog_categories, null, ['class' => 'form-control']) !!}
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="title">Title</label>
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Blog Title']) !!}
                        </div>

                        <div class="form-group">
                            <label for="body"> Body </label>
                            {!! Form::textarea('body', null, ['class' => 'form-control summernote', 'cols' => 30, 'rows' => 10]) !!}
                        </div>

                        <div class="custom-file" >
                            {!! Form::file('photo', ['class' => 'custom-file']) !!}
                        </div>

                        <div class="form-group float-left">
                            <label for="">Status</label>
                            {!! Form::select('status', ['1' => 'Published', '0' => 'UnPublish'], null, ['class' => 'form-control']) !!}
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
