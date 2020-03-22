@extends("admin::layouts.master")

@section('title')
    {{ __('Create New Blog Category') }}
@stop


@section("content")

    <div class="ibox">
        <div class="ibox-title">
            <h5> Edit Blog Category </h5>
        </div>
        <div class="ibox-content">
            {!! Form::model($blog_category, ['route' => ['admin.blog_categories.edit', $blog_category->id] ]) !!}

            <div class="form-group">
                <label for="title">Category </label>
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'category']) !!}
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
