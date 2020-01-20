@extends('shop::layouts.master')


@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">My Blog
            <small>Catalogue</small>
        </h1>

        <div class="float-right mb-4">
                <a href="{{route('user.blog.create')}}" class="btn btn-dark"><i class="fa fa-file-medical"></i> Create Blog</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
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
                                <a href="{{route('blog.posts.show', $blog->url_key)}}" class="text-decoration-none font-weight-bold">Edit</a> |
                                <a href="{{route('blog.posts.show', $blog->url_key)}}" class="text-decoration-none font-weight-bold text-danger">Delete</a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

    </div><br>
@endsection
