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
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                        <tr>
                            <th>S/N</th>
                            <th>Username</th>
                            <th>Title</th>
                            <th>Course(s)</th>
                            <th>Registered</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Andrew</td>
                            <td>Web Developer</td>
                            <td>14</td>
                            <td>2009/10/09</td>
                            <td>
                                <a href="{{route('admin.tutors.show')}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                                <a href="{{route('admin.tutors.edit')}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-eye-slash text-dark grow" title="lock"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kingston</td>
                            <td>Graphic Designer</td>
                            <td>12</td>
                            <td>2012/10/13</td>
                            <td>
                                <a href="{{route('admin.users.show')}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                                <a href="{{route('admin.users.edit')}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-eye-slash text-dark grow" title="lock"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Andrew</td>
                            <td>Web Developer</td>
                            <td>14</td>
                            <td>2009/10/09</td>
                            <td>
                                <a href="{{route('admin.tutors.show')}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                                <a href="{{route('admin.tutors.edit')}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-eye-slash text-dark grow" title="lock"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kingston</td>
                            <td>Graphic Designer</td>
                            <td>12</td>
                            <td>2012/10/13</td>
                            <td>
                                <a href="{{route('admin.users.show')}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                                <a href="{{route('admin.users.edit')}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-eye-slash text-dark grow" title="lock"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Andrew</td>
                            <td>Web Developer</td>
                            <td>14</td>
                            <td>2009/10/09</td>
                            <td>
                                <a href="{{route('admin.tutors.show')}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                                <a href="{{route('admin.tutors.edit')}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-eye-slash text-dark grow" title="lock"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kingston</td>
                            <td>Graphic Designer</td>
                            <td>12</td>
                            <td>2012/10/13</td>
                            <td>
                                <a href="{{route('admin.users.show')}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                                <a href="{{route('admin.users.edit')}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-eye-slash text-dark grow" title="lock"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Andrew</td>
                            <td>Web Developer</td>
                            <td>14</td>
                            <td>2009/10/09</td>
                            <td>
                                <a href="{{route('admin.tutors.show')}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                                <a href="{{route('admin.tutors.edit')}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-eye-slash text-dark grow" title="lock"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kingston</td>
                            <td>Graphic Designer</td>
                            <td>12</td>
                            <td>2012/10/13</td>
                            <td>
                                <a href="{{route('admin.users.show')}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                                <a href="{{route('admin.users.edit')}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-eye-slash text-dark grow" title="lock"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Andrew</td>
                            <td>Web Developer</td>
                            <td>14</td>
                            <td>2009/10/09</td>
                            <td>
                                <a href="{{route('admin.tutors.show')}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                                <a href="{{route('admin.tutors.edit')}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-eye-slash text-dark grow" title="lock"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kingston</td>
                            <td>Graphic Designer</td>
                            <td>12</td>
                            <td>2012/10/13</td>
                            <td>
                                <a href="{{route('admin.users.show')}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                                <a href="{{route('admin.users.edit')}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-eye-slash text-dark grow" title="lock"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Andrew</td>
                            <td>Web Developer</td>
                            <td>14</td>
                            <td>2009/10/09</td>
                            <td>
                                <a href="{{route('admin.tutors.show')}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                                <a href="{{route('admin.tutors.edit')}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-eye-slash text-dark grow" title="lock"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kingston</td>
                            <td>Graphic Designer</td>
                            <td>12</td>
                            <td>2012/10/13</td>
                            <td>
                                <a href="{{route('admin.users.show')}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                                <a href="{{route('admin.users.edit')}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-eye-slash text-dark grow" title="lock"></i></a>&nbsp;&nbsp;
                                <a href="#"><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
