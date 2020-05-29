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
                                <td class="btn-group-sm">
                                    <a href="{{route('admin.users.show', $user->id)}}" class="btn btn-success">view</a>&nbsp;&nbsp;
                                    <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-info"> edit </a>&nbsp;&nbsp;
                                    <a href="#" class="btn btn-danger"><i class="fa fa-trash" title="delete"></i> delete</a>
                                    <a href="{{route('admin.users.resend_verification_email', $user->id)}}" class="btn btn-primary">send verification</a>
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
