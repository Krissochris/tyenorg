@extends("admin::layouts.master")

@section("content")
    <div class="ibox">
        <div class="ibox-title">
            <h5>Blogs</h5>
        </div>
        <div class="ibox-content table-responsive">
            <div class="float-right" style="margin-bottom: 20px;">
                <a href="{{route('admin.blogs.comments.index')}}" class="btn btn-warning">Comments</a>
                <a href="{{route('admin.blogs.create')}}" class="btn btn-dark"><i class="fa fa-plus-square"></i> Create Blog</a>
            </div>
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>S/N</th>
                    <th>Title</th>
                    <th>Author </th>
                    <th>Featured Image  </th>
                    <th>Comments</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($blogs as $blog)
                    <tr>
                        <td>{{ $blog->id }}</td>
                        <td> {{ $blog->title }}</td>
                        <td> {{ $blog->user->name }} </td>
                        <td><img width="50" height="50" src="{{ $blog->photo }}" alt="{{ $blog->title }}">  </td>
                        <td> {{ $blog->comments->count() }}</td>
                        <td>
                            <a href="{{route('admin.blogs.show', $blog->id)}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                            <a href="{{route('admin.blogs.edit', $blog->id)}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                            <a href="#"
                               onclick="event.preventDefault();
                                   var response = confirm('Are you sure you want to delete this blog?');
                                   if (response) {
                                   document.getElementById('{{ $blog->id }}').submit(); }"
                            ><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                            <form id="{{ $blog['id'] }}" action="{{ route('admin.blogs.delete', $blog['id']) }}" method="POST" style="display: none;">
                                <input type="hidden" name="_method" value="delete">
                                @csrf
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $blogs->links() }}
        </div>
    </div>
@endsection
