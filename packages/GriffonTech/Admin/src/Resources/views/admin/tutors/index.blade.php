@extends("admin::layouts.master")

@section("content")
    <div class="container">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i> Tutors
                <div class=" float-right">
                    <a href="#" class="btn btn-danger">Locked Tutors</a>
                    <a href="{{route('admin.tutors.create')}}" class="btn btn-dark"><i class="fa fa-user-plus"></i> Add Tutor</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                        <tr>
                            <th>S/N</th>
                            <th> Name </th>
                            <th>Title</th>
                            <th>Course(s)</th>
                            <th>Registered</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tutors as $tutor)
                        <tr>
                            <td> {{ $tutor->user->id }}</td>
                            <td> {{ $tutor->user->name }} </td>
                            <td> {{ $tutor->title }} </td>
                            <td>14</td>
                            <td>2009/10/09</td>
                            <td>
                                <a href="{{route('admin.tutors.show', $tutor->id)}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                                <a href="{{route('admin.tutors.edit', $tutor->id)}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-eye-slash text-dark grow" title="lock"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $tutors->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
