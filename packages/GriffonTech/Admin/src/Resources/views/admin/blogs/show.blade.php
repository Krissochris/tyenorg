@extends("admin::layouts.master")

@section("content")
    <div class="container">
        <div class="col-sm-11">
            <div class="card">
                <div class="card-header">
                    <h4 class="float-left"> {{ $blog->title }} - by {{ $blog->user->name }}</h4>
                    <a href="{{route('admin.blogs.index')}}" class="btn btn-dark float-right">Go Back</a>
                </div>
                <div class="card-body">
                    {!! $blog->body !!}
                    <hr>
                    <h5> Comments </h5>
                    @foreach($blog->comments as $comment)
                        <blockquote>
                            {{ $comment->comment }}
                            - <p>{{ $comment->user->name }}
                                <a class="text-primary" href=""> edit </a> |
                                <a class="text-danger" href=""> remove </a>
                            </p>
                        </blockquote>
                    @endforeach

                </div>
            </div>
        </div>
        <hr>
    </div>

@endsection
