@extends('shop::layouts.master')

@section('title')
    {{ __('My Blog Posts') }}
@stop

@section('content')
    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center justify-content-between">
            <h1 class="m-0">My Blog Posts</h1>
        </div>
    </div>

    <!-- Page Content -->
    <div class="container page__container">
        <div class="mb-4">
            <a href="{{route('user.blog.create')}}" class="btn btn-dark"> Create Blog</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th>S/N</th>
                            <th>Title</th>
                            <th>Category </th>
                            <th>Comments </th>
                            <th>Status</th>
                            <th> Created </th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $sn = 1; ?>
                        @foreach($blogs as $blog)
                            <tr>
                                <td>{{$sn++}}</td>
                                <td><a href="{{route('blog.posts.show', $blog->url_key)}}">{{$blog->title}}</a></td>
                                <td> {{ ($blog->category) ? $blog->category->name : '' }} </td>
                                <td> {{ $blog->comments->count() }} </td>
                                <td>
                                    @switch($blog->status)
                                        @case(1)
                                        {{ __('Published') }}
                                        @break
                                        @case(0)
                                            {{ __('UnPublished') }}
                                        @break
                                        @default
                                            {{ __('Unknown') }}
                                    @endswitch
                                </td>
                                <td>{{$blog->created_at}}</td>
                                <td>
                                    <a href="{{route('user.blog.edit', $blog->url_key)}}" class="text-decoration-none font-weight-bold">Edit</a> |
                                    <a href="{{route('user.blog.show', $blog->url_key)}}" class="text-decoration-none font-weight-bold">View</a> |
                                    <a href="#"
                                       onclick="event.preventDefault();
                                           var response = confirm('Are you sure you want to delete this blog?');
                                           if (response) {
                                           document.getElementById('{{ $blog->url_key }}').submit(); }"
                                       class="text-decoration-none font-weight-bold text-danger">Delete</a>
                                    <form id="{{ $blog->url_key }}" action="{{ route('user.blog.delete', $blog->url_key) }}" method="POST" style="display: none;">
                                        <input type="hidden" name="_method" value="delete">
                                        @csrf
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><br>
@endsection
