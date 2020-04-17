@extends("admin::layouts.master")

@section("content")

    <div class="ibox">
        <div class="ibox-title">
            <h5> Create Blog </h5>
        </div>
        <div class="ibox-content">
            {!! Form::open(['route' => 'admin.blogs.create', 'enctype' => 'multipart/form-data']) !!}
            @if(isset($blog_categories))
                <div class="form-group">
                    <label for="blog_category"> Category </label>
                    {!! Form::select('blog_category_id', $blog_categories, null, ['class' => 'form-control']) !!}
                </div>
            @endif
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
                {!! Form::textarea('body', null, ['class' => 'form-control summernote', 'rows' => 10, 'placeholder' => 'Blog body...']) !!}
            </div>

            <div class="form-group">
                <label for="body"> Summary </label>
                {!! Form::textarea('summary', null, ['class' => 'form-control', 'rows' => 5]) !!}
            </div>

            <div class="form-group">
                <label for="">Status</label>
                {!! Form::select('status', ['1' => 'Publish', '0' => 'UnPublish'], $blog->status, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-dark" name="submit" value="Create Blog">
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
