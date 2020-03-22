@extends('shop::layouts.master')

@section('title')
    {{ __($blog->title) }}
@stop

@section('content')
    <!-- Breadcumb area start -->
    <section class="breadcumb_area" style="background-image: url({{ asset('lms/img/bg-pattern/breadcumb.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb_section">
                        <!-- Breadcumb page title start -->
                        <div class="page_title">
                            <h3> {{ $blog->title }} </h3>
                        </div>
                        <!-- Breadcumb page pagination start -->
                        <div class="page_pagination">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                <li>{{ $blog->title }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcumb area end -->

    <!-- ================= Start Single Blog Post Area ================= -->
    <section class="singl-blog-post-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Blog Main Image -->
                    @if($blog->photo)
                    <div class="blog-img">
                        <img src="{{ $blog->photo }}" alt="blog-img">
                    </div>
                    @endif
                    <div class="singl-blog-post">
                        <figure>
                            <!-- Blog Title -->
                            <div class="singl-blog-title">
                                <h3> {{ $blog->title }}</h3>
                            </div>
                            <!-- Blog Status Bar Area -->
                            <div class="singl-blog-status-bar">
                                <span>
										<i class="fa fa-user"></i>
										<span>{{ $blog->user->name }}</span>
									</span>
                                <span>
										<i class="fa fa-clock-o"></i>
										<span>{{ $blog->created_at->format('d M, Y') }}</span>
									</span>
                                <span>
										<i class="fa fa-comment-o "></i>
										<span>{{ $blog->comments->count() }} Comments</span>
									</span>
                            </div>
                            <!-- Single Blog Details Area -->
                            <div class="">
                                {!! $blog->body !!}
                            </div>
                            <!-- Blog Tag and share Area -->
                            <div class="tag-share clearfix">
                                <div class="share-links pull-left">
                                    <span class="share-promt">Share:</span>
                                    <!-- Social Links -->
                                    <ul class="social-links">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
            {{--<div class="row">
                <div class="col-12">
                    <div class="event_next_previous">
                        <div class="previous">
                            <a href="#">Previous Post</a>
                        </div>
                        <div class="next">
                            <a href="#">Next Post</a>
                        </div>
                    </div>
                </div>
            </div>--}}
        </div>
    </section>
    <!-- ================= End Single Blog Post Area ================= -->

    <!-- ================= Start comment area ================= -->
    @if($blog->comments->count() > 0)
        <section class="comment">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Comment Title -->
                        <div class="comment-title">
                            <h4> {{ $blog->comments->count() }} Comments</h4></div>
                        <ul>
                            @foreach($blog->comments as $comment)
                                <li>
                                    <div class="comments-wrapper clearfix">
                                        <!-- Single Comment Area Start -->
                                        <div class="single-comment">
                                            <div class="comment-head clearfix">
                                                <div class="commenter">
                                                    <a class="name" href="#"><h5> {{ $comment->user->name }}</h5></a>
                                                    <div class="comment-time"><span>{{ $comment->created_at->format('d M, Y') }}</span></div>
                                                </div>

                                                @if( auth('user')->check() && $comment->user_id === auth('user')->user()->id)
                                                    <a onclick="event.preventDefault();
                                                        var toRemove = confirm('Are you sure you want to delete this comment?');
                                                        if (toRemove) {
                                                        document.getElementById('{{ $comment->id }}').submit();
                                                        }"
                                                       class="replay d-none d-sm-block" href="#">remove</a>
                                                    <form id="{{ $comment->id }}" method="POST" action="{{ route('blog.comment.delete', $comment->id) }}">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="Delete">
                                                    </form>
                                                @endif
                                            </div>
                                            <p>
                                                {{ $comment->comment }}
                                            </p>
                                        </div>
                                        <!-- Single Comment Area End -->
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- ================= End comment area ================= -->
@endsection
