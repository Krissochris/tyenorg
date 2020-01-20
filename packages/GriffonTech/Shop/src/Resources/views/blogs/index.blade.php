@extends('shop::layouts.master')


@section('content')
    <!-- Page Content -->
    <div class="container"><br>

        @if(count($blogs) > 0)
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-sm-8">
                        <div class="card mb-4">
                            <h4 class="card-header text-dark">{{$blog->title}}</h4>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <p class="card-text"> {!! (strlen($blog->body) > 400) ? substr($blog->body, 0, 400)."<b> (&hellip;)</b>  <br> " : $blog->body !!} <a href="{{route('blog.posts.show', $blog->url_key)}}" class="btn btn-dark btn-sm">Read More &rarr;</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                By <a href="#" class="text-primary">{{$blog->user->username}} </a>:
                                <span class="text-primary"> {{$blog->created_at}}</span>
                                <div class="float-right">
                                    <a href=""><i class="fa fa-thumbs-up fa-lg grow text-secondary"></i><span class="badge badge-notify" style="font-size:10px;">30</span></a> &nbsp;
                                    <a href=""><i class="fa fa-thumbs-down fa-lg grow text-secondary"></i><span class="badge badge-notify" style="font-size:10px;">3</span></a> &nbsp;
                                    <a href=""><i class="fa fa-comments fa-lg grow text-secondary"></i><span class="badge badge-notify" style="font-size:10px;">15</span></a> &nbsp;
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @else
            <div class="alert alert-info col-sm-6">
                No Bolg created yet!
            </div>
        @endif

    </div><br>
    {{$blogs->links()}}
@endsection
