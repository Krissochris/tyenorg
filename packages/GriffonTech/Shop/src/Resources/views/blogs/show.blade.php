@extends('shop::layouts.master')


@section('content')
    <br>
   <div class="container">
<div class="clearfix">
    <a href="{{route('blog.posts.index')}}" class="btn btn-dark float-right">Go Back</a>
</div>
       <br>
       <div class="row">

           <!-- Project Entries Column -->
           <div class="col-md-12">
               <div class="card">
                   <div class="img-thumbnail"><img style="width: 100%" src="{{$blog->photo}}"></div>
                   <div class="card-body">
                       <h5 class="text-dark font-weight-bold">{{$blog->title}}</h5>
                       {!!$blog->body!!}
                       <hr>
                       <div class="float-left text-dark font-weight-bold order-sm-1">
                           <a href="#" class="text-primary font-weight-bold text-decoration-none">Edit</a> |
                           Written by {{$blog->user->username}} <span class="text-primary"> : {{$blog->created_at}}</span>
                       </div>

                       <div class="float-right order-sm-2">
                           <a href=""><i class="fa fa-thumbs-up fa-lg grow text-secondary"></i><span class="badge badge-notify" style="font-size:10px;">30</span></a> &nbsp;
                           <a href=""><i class="fa fa-thumbs-down fa-lg grow text-secondary"></i><span class="badge badge-notify" style="font-size:10px;">3</span></a> &nbsp;
                           <a href=""><i class="fa fa-comments fa-lg grow text-secondary"></i><span class="badge badge-notify" style="font-size:10px;">15</span></a> &nbsp;
                           <a href=""><i class="fab fa-facebook fa-lg grow text-secondary" ></i></a>&nbsp;&nbsp;&nbsp;
                           <a href=""><i class="fab fa-twitter fa-lg grow text-secondary" ></i></a>&nbsp;&nbsp;&nbsp;
                           <a href=""><i class="fab fa-instagram fa-lg grow text-secondary" ></i></a>
                       </div>
                   </div>
               </div>
               <hr>
               @guest
                   <a href="{{route('login')}}" class="btn btn-warning text-danger">Login to comment</a>
                   <br><br>
               @else

                   <form action="/comments?post_id={{$blog->id}}" method="POST">
                       @csrf
                       <div class="form-group">
                           <h3>Comments</h3>
                           {{Form::textarea('comment', '', ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Say Something...'])}}
                       </div>
                       {{Form::submit('Comment', ['class'=>'btn btn-success'])}}
                   </form>
                   <hr>
               @endguest
               {{--@if(count($comments) > 0)
                   @foreach($comments as $comment)
                       <div class="card">
                           <div class="card-header">{{$comment->name}} : <br>
                               <small class="text-primary">{{$comment->created_at}}</small></div>
                           <div class="card-body">{{$comment->comment}}</div>
                       </div><br>
                   @endforeach
               @else
                   <div class="alert alert-info">Be the first to comment on this Project</div>
               @endif--}}
           </div>
       </div>
   </div>
@endsection
