@extends("admin::layouts.master")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class=" float-right mb-3">
                    <a href="{{route('admin.categories.create')}}" class="btn btn-dark"> Add Category</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" {{--id="dataTable"--}} width="100%" cellspacing="0">
                        <thead class="thead-dark">
                        <tr>
                            <th>S/N</th>
                            <th> Name </th>
                            <th>Created On</th>
                            <th>Last Modified On
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td> {{ $category->id }}</td>
                                <td> {{ $category->name }} </td>
                                <td> {{ $category->created_at }} </td>
                                <td> {{ $category->updated_at }} </td>
                                <td>
                                    <a href="{{route('admin.categories.show', $category->id)}}">view</a>&nbsp;&nbsp;
                                    <a href="{{route('admin.categories.edit', $category->id)}}"> edit </a>&nbsp;&nbsp;
                                    <a href="#"
                                       onclick="event.preventDefault();
                                               var response = confirm('Are you sure you want to delete this category ?');
                                               if (response) {
                                               document.getElementById('{{ $category->id }}').submit(); }"
                                            ><i class="fa fa-trash text-danger grow" title="delete"></i>
                                    </a>
                                    <form id="{{ $category['id'] }}" action="{{ route('admin.categories.delete', $category['id']) }}" method="POST" style="display: none;">
                                        <input type="hidden" name="_method" value="delete">
                                        @csrf
                                    </form>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    {{ $categories->links() }}

                </div>
            </div>
        </div>

    </div>

@endsection
