@extends('shop::layouts.master')


@section('content')

    <!-- ===================== Breadcumb Area Start ===================== -->
    <section class="breadcumb_area" style="background-image: url({{ asset('lms/img/bg-pattern/breadcumb.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcumb_section">
                        <!-- Breadcumb page title start -->
                        <div class="page_title">
                            <h3>Blog</h3>
                        </div>
                        <!-- Breadcumb page pagination start -->
                        <div class="page_pagination">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                <li>Blog</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===================== Breadcumb Area End ===================== -->

    <!-- ========================== Latest Blog Area Start ========================== -->
    <div class="latest_blog_news_area blog section_padding_100">
        <div class="container">

            @if(count($blogs) > 0)
                <div class="row">
                    @foreach($blogs as $blog)

                        <div class="col-md-6 col-lg-4">
                            <div class="single_latest_news_area">
                                <!-- single latest news thumb -->
                                <div class="single_latest_news_img_area">
                                    <img src="{{ $blog->photo }}" alt="">
                                    <!-- single latest news published date -->
                                    <div class="published_date">
                                        <p class="date">{{ $blog->created_at->format('d') }}</p>
                                        <p class="month">{{ $blog->created_at->format('M') }}</p>
                                    </div>
                                </div>
                                <div class="single_latest_news_text_area">
                                    <!-- single latest news title -->
                                    <div class="news_title">
                                        <a href="{{route('blog.posts.show', $blog->url_key)}}">{{$blog->title}}</a>
                                    </div>
                                    <!-- single latest news excerp -->
                                    <div class="news_content">
                                        <p>
                                            {!! (strlen($blog->body) > 70) ? substr($blog->body, 0, 70)."<b> (&hellip;)</b>  <br> " : $blog->body !!}
                                        </p>
                                        <a href="{{route('blog.posts.show', $blog->url_key)}}" class="btn blog-btn">Read More <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-info col-sm-6">
                    No Blog post created yet!
                </div>
            @endif

        <br>
        {{$blogs->links()}}
    </div>
    </div>
    <!-- ========================== Latest Blog Area End ========================== -->
@endsection
