@extends('shop::layouts.master')


@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">My Blog
            <small>Catalogue</small>
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Home</a>
            </li>
            <li class="breadcrumb-item active">My-Blog Posts</li>
        </ol>

        @if(count($blogs) > 0)
            @foreach($blogs as $blog)
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="#">
                                    <img class="img-fluid rounded" src="{{$blog->photo}}" alt="Article Image">
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <h3 class="card-title text-dark">{{$blog->title}}</h3>
                                <p class="card-text"> {!! (strlen($blog->body) > 200) ? substr($blog->body, 0, 200)."<b> (&hellip;)</b>  <hr> " : $blog->body !!} <a href="/posts/{{$blog->id}}" class="btn btn-dark">Read More &rarr;</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        Written by <a href="#" class="text-primary">{{$blog->user->username}} </a>:
                        <span class="text-primary"> {{$blog->created_at}}</span>
                        <div class="float-right"><br>
                            <a href=""><i class="fa fa-thumbs-up fa-lg grow text-secondary"></i><span class="badge badge-notify" style="font-size:10px;">30</span></a> &nbsp;
                            <a href=""><i class="fa fa-thumbs-down fa-lg grow text-secondary"></i><span class="badge badge-notify" style="font-size:10px;">3</span></a> &nbsp;
                            <a href=""><i class="fa fa-comments fa-lg grow text-secondary"></i><span class="badge badge-notify" style="font-size:10px;">15</span></a> &nbsp;&nbsp;
                            <a href=""><i class="fab fa-facebook fa-lg grow text-secondary" ></i></a>&nbsp;
                            <a href=""><i class="fab fa-twitter fa-lg grow text-secondary" ></i></a>&nbsp;
                            <a href=""><i class="fab fa-instagram fa-lg grow text-secondary" ></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-info col-sm-6">
                No Bolg created yet!
            </div>
        @endif

    </div><br>
@endsection
