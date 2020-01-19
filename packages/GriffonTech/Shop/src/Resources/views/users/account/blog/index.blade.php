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

        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <a href="/posts/{{$post->id}}">
                            <img class="img-fluid rounded" src="/storage/cover_images/{{$post->cover_image}}" alt="Article Image">
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <h3 class="card-title text-success">{{$post->title}}</h3>
                        <p class="card-text"> {!! (strlen($post->body) > 200) ? substr($post->body, 0, 200)."<b> (&hellip;)</b>  <hr> " : $post->body !!} <a href="/posts/{{$post->id}}" class="btn btn-success">Read More &rarr;</a></p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                Written by <a href="#" class="text-primary">{{$post->user->name}} </a>:<br>
                <span class="text-primary"> {{$post->created_at->format("l jS \of F Y h:i:s A") }}</span>
                <div class="float-right">
                    <a href=""><i class="fa fa-thumbs-up fa-lg grow" style="color: green" ></i><span class="badge bg-info text-white">7</span></a> &nbsp;
                    <a href=""><i class="fa fa-thumbs-down fa-lg grow" style="color: green" ></i><span class="badge bg-info text-white">7</span></a>&nbsp;
                    <a href=""><i class="fa fa-comments fa-lg grow" style="color: green" ></i><span class="badge bg-info text-white">7</span></a>&nbsp;
                    <a href=""><i class="fab fa-facebook fa-lg grow" ></i></a>&nbsp;
                    <a href=""><i class="fab fa-twitter fa-lg grow" ></i></a>&nbsp;
                    <a href=""><i class="fab fa-instagram fa-lg grow" ></i></a>
                </div>
            </div>
        </div>


    </div><br>
@endsection
