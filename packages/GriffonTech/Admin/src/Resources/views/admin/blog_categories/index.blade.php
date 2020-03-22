@extends("admin::layouts.master")

@section('title')
    {{ __('Blog Categories') }}
@stop

@section("content")
    <div class="ibox">
        <div class="ibox-title">
            <h5>Blog Categories </h5>
        </div>
        <div class="ibox-content table-responsive">
            <div class="float-right" style="margin-bottom: 20px;">
                <a href="{{route('admin.blog_categories.create')}}" class="btn btn-dark"><i class="fa fa-plus-square"></i> Create Blog Category</a>
            </div>
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>S/N</th>
                    <th> Name </th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($blog_categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td> {{ $category->name }}</td>
                        <td>
                            <a href="{{route('admin.blog_categories.edit', $category->id)}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                            <a href="#"
                               onclick="event.preventDefault();
                                   var response = confirm('Are you sure you want to delete this blog category ?');
                                   if (response) {
                                   document.getElementById('{{ $category->id }}').submit(); }"
                            ><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                            <form id="{{ $category['id'] }}" action="{{ route('admin.blog_categories.delete', $category['id']) }}" method="POST" style="display: none;">
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
@endsection
