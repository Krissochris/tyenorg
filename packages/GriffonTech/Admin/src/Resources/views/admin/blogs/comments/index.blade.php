@extends("admin::layouts.master")

@section("content")
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i> Blog Comments
            <div class=" float-right">
                <a href="#" class="btn btn-danger"><i class="fa fa-lock"></i> Unpublished Comments</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                    <tr>
                        <th>S/N</th>
                        <th>User</th>
                        <th>Comment</th>
                        <th>Created</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Andrew Show</td>
                        <td> Lorem ipsum dolor sit amet...</td>
                        <td>2019-12-12 06:43:12 AM</td>
                        <td>
                            <a href="{{route('admin.blogs.comments.show')}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                            <a href="{{route('admin.blogs.comments.edit')}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fa fa-eye-slash text-dark grow" title="unpublish"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Andrew Show</td>
                        <td> Lorem ipsum dolor sit amet...</td>
                        <td>2019-12-12 06:43:12 AM</td>
                        <td>
                            <a href="{{route('admin.blogs.comments.show')}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                            <a href="{{route('admin.blogs.comments.edit')}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fa fa-eye-slash text-dark grow" title="unpublish"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Andrew Show</td>
                        <td> Lorem ipsum dolor sit amet...</td>
                        <td>2019-12-12 06:43:12 AM</td>
                        <td>
                            <a href="{{route('admin.blogs.comments.show')}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                            <a href="{{route('admin.blogs.comments.edit')}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fa fa-eye-slash text-dark grow" title="unpublish"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Andrew Show</td>
                        <td> Lorem ipsum dolor sit amet...</td>
                        <td>2019-12-12 06:43:12 AM</td>
                        <td>
                            <a href="{{route('admin.blogs.comments.show')}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                            <a href="{{route('admin.blogs.comments.edit')}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fa fa-eye-slash text-dark grow" title="unpublish"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Andrew Show</td>
                        <td> Lorem ipsum dolor sit amet...</td>
                        <td>2019-12-12 06:43:12 AM</td>
                        <td>
                            <a href="{{route('admin.blogs.comments.show')}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                            <a href="{{route('admin.blogs.comments.edit')}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fa fa-eye-slash text-dark grow" title="unpublish"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Andrew Show</td>
                        <td> Lorem ipsum dolor sit amet...</td>
                        <td>2019-12-12 06:43:12 AM</td>
                        <td>
                            <a href="{{route('admin.blogs.comments.show')}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                            <a href="{{route('admin.blogs.comments.edit')}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fa fa-eye-slash text-dark grow" title="unpublish"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Andrew Show</td>
                        <td> Lorem ipsum dolor sit amet...</td>
                        <td>2019-12-12 06:43:12 AM</td>
                        <td>
                            <a href="{{route('admin.blogs.comments.show')}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                            <a href="{{route('admin.blogs.comments.edit')}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fa fa-eye-slash text-dark grow" title="unpublish"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Andrew Show</td>
                        <td> Lorem ipsum dolor sit amet...</td>
                        <td>2019-12-12 06:43:12 AM</td>
                        <td>
                            <a href="{{route('admin.blogs.comments.show')}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                            <a href="{{route('admin.blogs.comments.edit')}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fa fa-eye-slash text-dark grow" title="unpublish"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Andrew Show</td>
                        <td> Lorem ipsum dolor sit amet...</td>
                        <td>2019-12-12 06:43:12 AM</td>
                        <td>
                            <a href="{{route('admin.blogs.comments.show')}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                            <a href="{{route('admin.blogs.comments.edit')}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fa fa-eye-slash text-dark grow" title="unpublish"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Andrew Show</td>
                        <td> Lorem ipsum dolor sit amet...</td>
                        <td>2019-12-12 06:43:12 AM</td>
                        <td>
                            <a href="{{route('admin.blogs.comments.show')}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                            <a href="{{route('admin.blogs.comments.edit')}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fa fa-eye-slash text-dark grow" title="unpublish"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
