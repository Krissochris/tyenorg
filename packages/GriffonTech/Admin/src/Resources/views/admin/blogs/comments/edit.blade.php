@extends("admin::layouts.master")

@section("content")

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="float-left">Edit Comment - by {{ $comment->user->name }}</h4>
                        <a href="{{route('admin.blogs.comments.index')}}" class="btn btn-dark float-right">Go Back</a>
                    </div>
                    <div class="card-body">
                        {!! Form::model($comment,['route' => ['admin.blogs.comments.edit', $comment->id] ]) !!}

                        <div class="form-group">
                            <label for="body"> Comment </label>
                            {!! Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => 'comment...']) !!}
                        </div>

                        <div class="form-group">
                            <label for="status"> Status </label>
                            {!! Form::select('status',[ 1 => 'Publish', 0 => 'UnPublish']) !!}
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-dark" name="submit" value="Update Post">
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>

@endsection
