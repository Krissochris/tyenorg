@extends("admin::layouts.master")

@section("content")
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i> Blogs
            <div class=" float-right">
                <a href="{{route('admin.blogs.comments.index')}}" class="btn btn-warning">Comments</a>
                <a href="{{route('admin.blogs.create')}}" class="btn btn-dark"><i class="fa fa-plus-square"></i> Create Blog</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                    <tr>
                        <th>S/N</th>
                        <th>Title</th>
                        <th>Blog</th>
                        <th>Comments</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Andrew Show</td>
                        <td> Lorem ipsum dolor sit amet...</td>
                        <td>45</td>
                        <td>
                            <a href="{{route('admin.blogs.show')}}"><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                            <a href="{{route('admin.blogs.edit')}}"><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fa fa-eye-slash text-dark grow" title="unpublish"></i></a>&nbsp;&nbsp;
                            <a href="#"><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Andrew Show</td>
                        <td> Lorem ipsum dolor sit amet...</td>
                        <td>32</td>
                        <td>
                            <a href=""><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-eye-slash text-dark grow" title="unpublish"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Andrew Show</td>
                        <td> Lorem ipsum dolor sit amet...</td>
                        <td>71</td>
                        <td>
                            <a href=""><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-eye-slash text-dark grow" title="unpublish"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Andrew Show</td>
                        <td> Lorem ipsum dolor sit amet...</td>
                        <td>32</td>
                        <td>
                            <a href=""><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-eye-slash text-dark grow" title="unpublish"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Andrew Show</td>
                        <td> Lorem ipsum dolor sit amet...</td>
                        <td>32</td>
                        <td>
                            <a href=""><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-eye-slash text-dark grow" title="unpublish"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Andrew Show</td>
                        <td> Lorem ipsum dolor sit amet...</td>
                        <td>
                            <strong class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</strong>
                        </td>
                        <td>
                            <a href=""><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-eye-slash text-dark grow" title="unpublish"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Andrew Show</td>
                        <td> Lorem ipsum dolor sit amet...</td>
                        <td>32</td>
                        <td>
                            <a href=""><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-eye-slash text-dark grow" title="unpublish"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Andrew Show</td>
                        <td> Lorem ipsum dolor sit amet...</td>
                        <td>
                            <strong class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</strong>
                        </td>
                        <td>
                            <a href=""><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-eye-slash text-dark grow" title="unpublish"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Andrew Show</td>
                        <td> Lorem ipsum dolor sit amet...</td>
                        <td>
                            <strong class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</strong>
                        </td>
                        <td>
                            <a href=""><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-eye-slash text-dark grow" title="unpublish"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Andrew Show</td>
                        <td> Lorem ipsum dolor sit amet...</td>
                        <td>
                            <strong class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</strong>
                        </td>
                        <td>
                            <a href=""><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-eye-slash text-dark grow" title="unpublish"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Andrew Show</td>
                        <td> Lorem ipsum dolor sit amet...</td>
                        <td>
                            <strong class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</strong>
                        </td>
                        <td>
                            <a href=""><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-eye-slash text-dark grow" title="unpublish"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Andrew Show</td>
                        <td> Lorem ipsum dolor sit amet...</td>
                        <td>
                            <strong class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</strong>
                        </td>
                        <td>
                            <a href=""><i class="fa fa-eye grow" title="view"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-edit grow" title="edit"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-eye-slash text-dark grow" title="unpublish"></i></a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-trash text-danger grow" title="delete"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
