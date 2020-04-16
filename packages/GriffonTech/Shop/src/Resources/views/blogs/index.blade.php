@extends('shop::layouts.master')

@section('title')
    Entreprenuers Blog
@stop

@section('content')

    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center justify-content-between">
            <h1 class="m-0"> Entreprenuers Blog</h1>
        </div>
    </div>


    <div class="container">
        <div class="row">
            @if($blogs)
                @foreach($blogs as $post)
                    <div class="col-md-6 col-lg-4">
                        <div class="card card__course card__course__animate">
                            <a href="{{route('blog.posts.show', $post->url_key)}}" class="card-img-top">
                                <img src="{{ $post->photo }}" style="width:100%; max-height: 175px;" alt="{{ $post->title }}">
                            </a>

                            <div class="p-3 text-center border-bottom">
                                <div class="bold mb-2">
                                    <a href="{{route('blog.posts.show', $post->url_key)}}" class="text-body">
                                        <span class="course__title">{{ $post->title }}</span>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-around">


                                    <div class="mb-2 text-muted d-flex align-items-center align-self-center ">
                                        <small class="mr-3 d-flex align-items-center">
                                            <i class="fa fa-user"></i> {{ $post->user->name }}
                                        </small>
                                        <small class="mr-3 d-flex align-items-center">
                                            <svg version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="18" height="18">
                                                <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                                    <path d="M12.619,8.412c-0.001-0.41-0.333-0.742-0.743-0.742H5.938c-0.41,0.015-0.73,0.36-0.715,0.77 c0.014,0.389,0.326,0.701,0.715,0.715h5.938C12.286,9.155,12.619,8.822,12.619,8.412L12.619,8.412z M9.586,19 c-0.02-0.115-0.119-0.199-0.236-0.2H3.464c-0.276,0-0.5-0.224-0.5-0.5V5.443c0.003-0.274,0.226-0.495,0.5-0.495h10.887 c0.272,0.003,0.491,0.223,0.494,0.495v4.039c-0.002,0.135,0.106,0.245,0.241,0.247c0.018,0,0.037-0.002,0.054-0.005 c0.807-0.152,1.623-0.249,2.443-0.29c0.131-0.007,0.232-0.116,0.231-0.247V3.464c0.001-0.82-0.663-1.484-1.483-1.485 c0,0-0.001,0-0.001,0h-3.957c-0.085,0-0.163-0.046-0.205-0.119C11.103,0.059,8.78-0.537,6.979,0.528 C6.43,0.853,5.972,1.311,5.647,1.86c-0.042,0.073-0.12,0.118-0.205,0.119H1.485C0.665,1.979,0,2.644,0,3.464c0,0,0,0,0,0v16.825 c0.001,0.82,0.665,1.484,1.485,1.484h8.847c0.135,0,0.244-0.109,0.244-0.244c0-0.046-0.013-0.092-0.038-0.131 C10.091,20.657,9.769,19.846,9.586,19z M11.035,12.523c0.286-0.376,0.604-0.726,0.951-1.046c0.085-0.079,0.028-0.343-0.11-0.343 H5.938c-0.41,0.015-0.73,0.36-0.715,0.77c0.014,0.389,0.326,0.701,0.715,0.715h4.907C10.92,12.619,10.99,12.583,11.035,12.523z M5.938,14.6c-0.41,0-0.742,0.331-0.743,0.741c0,0.41,0.331,0.742,0.741,0.743c0,0,0.001,0,0.001,0h3.37 c0.117,0,0.216-0.085,0.235-0.2c0.061-0.337,0.145-0.669,0.251-0.995c0.032-0.1,0.055-0.29-0.129-0.29L5.938,14.6z M17.32,10.639 c-3.69-0.001-6.681,2.99-6.682,6.68s2.99,6.681,6.68,6.682c3.69,0.001,6.681-2.99,6.682-6.68c0,0,0-0.001,0-0.001 C23.996,13.632,21.008,10.643,17.32,10.639z M17.32,22.021c-2.596,0-4.7-2.104-4.7-4.7s2.104-4.7,4.7-4.7s4.7,2.104,4.7,4.7 C22.017,19.915,19.914,22.018,17.32,22.021z M19.3,16.33h-0.742c-0.137,0-0.248-0.111-0.248-0.248v-1.237 c-0.017-0.546-0.474-0.975-1.021-0.958c-0.522,0.017-0.941,0.436-0.958,0.958v2.475c0,0.546,0.443,0.989,0.989,0.989 c0,0,0.001,0,0.001,0H19.3c0.546,0.017,1.004-0.412,1.021-0.958s-0.412-1.004-0.958-1.021C19.342,16.329,19.321,16.329,19.3,16.33z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                            <span class="ml-1"> {{ ($post->category) ? $post->category->name : 'Uncategorized' }} </span>
                                        </small>
                                        <small class="d-flex align-items-center">
                                            <svg version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="18" height="18">
                                                <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                                    <path d="M19.159,8.257l1.548-1.549c0.397-0.384,0.408-1.017,0.025-1.414c-0.384-0.397-1.017-0.408-1.414-0.025 c-0.008,0.008-0.017,0.016-0.025,0.025l-1.6,1.6C16.324,5.867,14.702,5.231,13,5.054V2h2c0.552,0,1-0.448,1-1s-0.448-1-1-1H9 C8.448,0,8,0.448,8,1s0.448,1,1,1h2v3.054c-5.217,0.553-8.998,5.231-8.445,10.449s5.231,8.998,10.449,8.445 c5.217-0.553,8.998-5.231,8.445-10.449c-0.206-1.942-1.006-3.774-2.29-5.245V8.257z M12,22.5c-4.418,0-8-3.582-8-8s3.582-8,8-8 s8,3.582,8,8S16.418,22.5,12,22.5z M12,8c-3.59,0-6.5,2.91-6.5,6.5S8.41,21,12,21s6.5-2.91,6.5-6.5S15.59,8,12,8z M12.53,14.822 c-0.295,0.288-0.765,0.288-1.06,0l-2.042-2.04c-0.293-0.293-0.293-0.768,0-1.061s0.768-0.293,1.061,0l0,0l2.041,2.042 C12.802,14.052,12.785,14.518,12.53,14.822L12.53,14.822z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                            <span class="ml-1">
                                                    {{ $post->created_at->format('d - m - y') }}
                                                </span>
                                        </small>
                                    </div>
                                </div>

                            </div>
                            <div class="p-3 text-center">
                                <p>
                                    {!! (strlen($post->body) > 70) ? substr($post->body, 0, 70)."<b> (&hellip;)</b>  <br> " : $post->body !!}
                                </p>
                            </div>
                        </div>
                    </div>

                @endforeach
            @endif
        </div>
    </div>


    {{--

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
    --}}
@endsection
