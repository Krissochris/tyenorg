@extends("admin::layouts.master")

@section("content")
    <div class="container">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i> Tutors
                <div class=" float-right">
                    <a href="{{route('admin.admins.create')}}" class="btn btn-dark"><i class="fa fa-user-plus"></i> Add Admin </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                        <tr>
                            <th>S/N</th>
                            <th> Name </th>
                            <th> Username </th>
                            <th>Registered</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <td> {{ $admin->id }}</td>
                                <td> {{ $admin->name }} </td>
                                <td> {{ $admin->username }} </td>
                                <td> {{ $admin->created_at }} </td>
                                <td>
                                    <a href="{{route('admin.admins.show', $admin->id)}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                                    <a href="{{route('admin.admins.edit', $admin->id)}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                                    {{--
                                                                    <a href="#"><i class="fa fa-eye-slash text-dark grow" title="lock"></i></a>&nbsp;&nbsp;
                                    --}}
                                    <a href="#"><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $admins->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
