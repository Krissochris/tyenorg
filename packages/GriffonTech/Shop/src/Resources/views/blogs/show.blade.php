@extends('shop::layouts.master')


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
                    <div class="blog-img">
                        <img src="{{ $blog->photo }}" alt="blog-img">
                    </div>
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
										<a href="#"> {{ $blog->user->name }} </a>
									</span>
                                <span>
										<i class="fa fa-clock-o"></i>
										<a href="#">{{ $blog->created_at->format('d M, Y') }} </a>
									</span>
                                <span>
										<i class="fa fa-comment-o "></i>
										<a href="#"> {{ $blog->comments->count() }} Comments</a>
									</span>
                            </div>
                            <!-- Single Blog Details Area -->
                            <div class="singl-blog-details text-justify">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco off a laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non home roident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae to vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt.ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                <blockquote>
                                    <p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam. Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                                </blockquote>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco off a laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non home proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae to vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>
                            </div>
                            <!-- Blog Tag and share Area -->
                            <div class="tag-share clearfix">
                                <div class="share-links pull-left">
                                    <span class="share-promt">Share:</span>
                                    <!-- Social Links -->
                                    <ul class="social-links">
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
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
                                    <input type="submit" value="Drope Your Comments" id="submit">
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
@endsection
