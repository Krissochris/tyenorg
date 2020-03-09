@extends("admin::layouts.master")

@section("content")
    <div class="ibox">
        <div class="ibox-title">
            <h5>{{ $blog->title }} - by {{ $blog->user->name }} </h5>
        </div>
        <div class="ibox-content">
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

@endsection
