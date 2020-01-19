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
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>S/N</th>
                    <th>Photo</th>
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
                            <td><img src="{{$blog->photo}}" class="img-fluid" width="70px" height="50px" alt=""></td>
                            <td>{!! (strlen($blog->title) > 30) ? substr($blog->title, 0, 30)."<b> (&hellip;)</b>" : $blog->title !!}</td>
                            <td>{{ (($blog->status === 1) ? 'Published' : 'Unpublished')}}</td>
                            <td>{{$blog->created_at}}</td>
                            <td>
                                <a href="{{route('blog.posts.show', $blog->url_key)}}" class="text-decoration-none font-weight-bold">View</a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

    </div><br>
@endsection
