@extends("admin::layouts.master")

@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Users </h5>
                </div>
                <div class="ibox-content table-responsive">
                    <div style="margin-bottom: 20px;">
                        <a href="{{route('admin.users.create')}}" class=" btn btn-dark"><i class="fa fa-user-plus"></i> Add User</a>
                    </div>


                    <table id="data-table" class="table table-hover no-margins">
                        <thead class="">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>is Pro user</th>
                            <th> Is Tutor </th>
                            <th>Registered</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td> {{ $user->name }} </td>
                                <td> {{ $user->email }} </td>
                                <td> {{ $user->phone_number }} </td>
                                <td> {{ ($user->is_pro_user) ? 'Yes' : 'No' }} </td>
                                <td> {{ ($user->tutor_id) ? 'Yes' : 'No' }} </td>
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
