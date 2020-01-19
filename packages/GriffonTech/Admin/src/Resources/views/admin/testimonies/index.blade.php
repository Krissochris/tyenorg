@extends("admin::layouts.master")

@section('title')
    Admin | Testimonies
@stop

@section("content")
    <div class="container">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i> Testimonies
                <div class=" float-right">
                    <a href="{{route('admin.testimonies.create')}}" class="btn btn-dark"> Add Testimony</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                        <tr>
                            <th>User</th>
                            <th>Testimony</th>
                            <th>Published </th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($testimonies as $testimony)
                            <tr>
                                <td> {{ $testimony->user->name }} </td>
                                <td> {{ $testimony->testimony }} </td>
                                <td> {!! ($testimony->status) ? '<span class="text-success">Yes</span>' : '<span class="text-danger">No</span>' !!} </td>
                                <td> {{ $testimony->created_at }} </td>
                                <td> {{ $testimony->updated_at }} </td>
                                <td>
                                    <a href="{{route('admin.testimonies.edit', $testimony->id)}}"> <i class="fa fa-edit"></i> </a>&nbsp;&nbsp;

                                    <a href="#"
                                       onclick="event.preventDefault();
                                               var response = confirm('Are you sure you want to delete this testimony?');
                                               if (response) {
                                               document.getElementById('{{ $testimony->id }}').submit(); }"
                                            ><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                                    <form id="{{ $testimony['id'] }}" action="{{ route('admin.testimonies.delete', $testimony['id']) }}" method="POST" style="display: none;">
                                        <input type="hidden" name="_method" value="delete">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    {{ $testimonies->links() }}

                </div>
            </div>
        </div>
    </div>
@endsection
