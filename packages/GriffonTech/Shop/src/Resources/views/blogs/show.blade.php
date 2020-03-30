@extends('shop::layouts.master')

@section('title')
    {{ $blog->title }}
@stop

@section('content')

    <div class="container page__heading-container">
        <div class="page__heading d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
            <div>
                <h1 class="m-lg-0"> {{ $blog->title  }}</h1>
                <div class="d-inline-flex align-items-center">
                    <small class="mr-2">
                        <i class="fa fa-folder"></i>
                        @if ($blog->category)
                            {{ $blog->category->name }}
                        @else
                            Uncategorized
                        @endif
                    </small>

                    <small class="mr-2 text-muted">
                        <i class="fa fa-clock"></i>
                        {{ $blog->created_at->format('d M, Y') }}
                    </small>
                    <small>
                        <i class="fa fa-comment-o"></i>
                        {{ $blog->comments->count() }} Comments
                    </small>
                    <br />
                </div>
            </div>

        </div>
    </div>


    <div class="container page__container">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <div class="media align-items-center">
                            <div class="media-left">
                                <img src="{{ asset('assets/images/256_luke-porter-261779-unsplash.jpg') }}" alt="About Adrian" width="40" class="rounded-circle">
                            </div>
                            <div class="media-body">
                                <div class="card-title mb-0">
                                    <a href="#" class="text-body"><strong> {{ $blog->user->name }} </strong></a></div>
                            </div>
                            <div class="media-right">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->route('blog.posts.show', $blog->url_key) }}" class="btn btn-facebook btn-sm">
                                    <i class="fab fa-facebook"></i>
                                </a>
                                <a href="http://twitter.com/share?text={{ $blog->title }}&url={{url()->route('blog.posts.show', $blog->url_key)}}" class="btn btn-twitter btn-sm"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! $blog->body !!}
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <div class="card-title mb-0">
                                    Comments
                                </div>
                            </div>
                            <div class="media-right">
                                {{ $blog->comments->count() }} <i class="fa fa-comment-dots"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($blog->comments->count() > 0)
                            @foreach($blog->comments as $comment)
                                <div class="card">
                                    <div class="px-4 py-3">
                                        <div class="d-flex mb-1">
                                            <div class="flex">
                                                <div class="d-flex align-items-center mb-1">
                                                    <strong class="text-15pt">{{ $comment->user->name }}</strong>
                                                    <small class="ml-2 text-muted">{{ $comment->created_at->format('d M, Y') }}</small>
                                                </div>
                                                <div>
                                                    <p>
                                                        {{ $comment->comment }}
                                                    </p>
                                                </div>

                                                <div class="d-flex align-items-center">
                                                    @if( auth('user')->check() && $comment->user_id === auth('user')->user()->id)
                                                        <a onclick="event.preventDefault();
                                                            var toRemove = confirm('Are you sure you want to delete this comment?');
                                                            if (toRemove) {
                                                            document.getElementById('{{ $comment->id }}').submit();
                                                            }"
                                                           class="text-danger"
                                                           href="#">remove</a>
                                                        <form id="{{ $comment->id }}" method="POST" action="{{ route('blog.comment.delete', $comment->id) }}">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="Delete">
                                                        </form>
                                                    @endif
                                                    {{-- <a href="#" class="text-muted d-flex align-items-center decoration-0">
                                                         <i class="material-icons mr-1" style="font-size: inherit;">favorite_border</i>
                                                         38</a>
                                                     <a href="#" class="text-muted d-flex align-items-center decoration-0 ml-3"><i class="material-icons mr-1" style="font-size: inherit;">thumb_up</i> 71</a>
                                             --}}    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        @endif

                        <hr>
                            @auth('user')
                            <!-- ================= Start Comment Form ================= -->
                                <section id="contact-form" class="blog_comment_form">
                                    <div class="container no-padding">
                                        <div class="row">
                                            <div class="col-12">
                                                <!-- Setion Title -->
                                                <div class="contact-form-title">
                                                    <h4>Leave a Comment</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                            {{ Form::open(['route' => ['blog.posts.store', $blog->url_key] ]) }}
                                            <!-- Single Input Start -->
                                                <div class="row">
                                                    <!-- Single Input Start -->
                                                    <div class="col-12">
                                                        <div class="form-group text-area">
                                                            <textarea name="message" class="form-control" id="message" placeholder="Write Your Comments"></textarea>
                                                        </div>
                                                    </div>
                                                    <!-- Single Input Start -->
                                                    <div class="col-12">
                                                        <div class="form-group text-area text-center">
                                                            <input class="btn btn-success" type="submit" value="Drop Your Comments" id="submit">
                                                        </div>
                                                    </div>
                                                </div>
                                                {{ Form::close() }}
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- ================= End Comment Form ================= -->
                            @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
