@extends("admin::layouts.master")

@section("content")
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i> Blog Comments
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                    <tr>
                        <th>S/N</th>
                        <th>Comment</th>
                        <th> User</th>
                        <th>Blog Title </th>
                        <th>Published </th>
                        <th>Created At</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td> {{ $comment->comment }}</td>
                            <td> {{ $comment->user->name }} </td>
                            <td> {{ $comment->blog->title }}</td>
                            <td> {!! ($comment->status) ? '<span class="text-success"> Yes </span>' : '<span class="text-danger"> No</span>' !!}</td>
                            <td> {{ $comment->created_at }}</td>
                            <td>
{{--
                                <a href="{{route('admin.blogs.comments.show', $comment->id)}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
--}}
                                <a href="{{route('admin.blogs.comments.edit', $comment->id)}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;

                                <a href="#"
                                   onclick="event.preventDefault();
                                           var response = confirm('Are you sure you want to delete this comment ?');
                                           if (response) {
                                           document.getElementById('{{ $comment->id }}').submit(); }"

                                        >
                                    <i class="fa fa-trash text-danger grow" title="delete"></i>
                                </a>
                                <form id="{{ $comment['id'] }}" action="{{ route('admin.blogs.comments.delete', $comment['id']) }}" method="POST" style="display: none;">
                                    <input type="hidden" name="_method" value="delete">
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {{ $comments->links() }}
        </div>
    </div>
@endsection
