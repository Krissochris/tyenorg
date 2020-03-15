@extends('shop::layouts.master')


@section('content')
    <!-- Breadcumb area start -->
    <section class="breadcumb_area" style="background-image: url({{ asset('lms/img/bg-pattern/breadcumb.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcumb_section">
                        <!-- Breadcumb page title start -->
                        <div class="page_title">
                            <h3>My Blogs</h3>
                        </div>
                        <!-- Breadcumb page pagination start -->
                        <div class="page_pagination">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                <li>My Blogs</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><br>
    <!-- Breadcumb area end -->

    <!-- Page Content -->
    <div class="container">
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
                            <th>Status</th>
                            <th> Created </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $sn = 1; ?>
                        @foreach($blogs as $blog)
                            <tr>
                                <td>{{$sn++}}</td>
                                <td><a href="{{route('blog.posts.show', $blog->url_key)}}">{{$blog->title}}</a></td>
                                <td>{{ (($blog->status === 1) ? 'Published' : 'Unpublished')}}</td>
                                <td>{{$blog->created_at}}</td>
                                <td>
                                    <a href="{{route('user.blog.edit', $blog->url_key)}}" class="text-decoration-none font-weight-bold">Edit</a> |
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
