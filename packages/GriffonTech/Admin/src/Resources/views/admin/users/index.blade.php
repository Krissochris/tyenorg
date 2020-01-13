@extends("admin::layouts.master")

@section("content")
<div class="container">
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i> Users
            <div class=" float-right">
{{--
                <a href="#" class="btn btn-danger">Locked Users</a>
--}}
                <a href="{{route('admin.users.create')}}" class="btn btn-dark"><i class="fa fa-user-plus"></i> Add User</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" {{--id="dataTable"--}} width="100%" cellspacing="0">
                    <thead class="thead-dark">
                    <tr>
                        <th>S/N</th>
                        <th>User</th>
                        <th>Type</th>
                        <th>Registered</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td> {{ $user->id }}</td>
                            <td> {{ $user->name }} </td>
                            <td> {{ ($user->is_pro_user) ? 'Pro user' : 'User' }} </td>
                            <td> {{ $user->created_at }} </td>
                            <td>
                                <a href="{{route('admin.users.show', $user->id)}}">view</a>&nbsp;&nbsp;
                                <a href="{{route('admin.users.edit', $user->id)}}"> edit </a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                {{ $users->links() }}

            </div>
        </div>
    </div>
</div>
@endsection
