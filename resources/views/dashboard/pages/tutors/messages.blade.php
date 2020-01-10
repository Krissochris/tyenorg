@extends('dashboard.layouts.header')
@section('content')
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('tutor-courses')}}" style="text-decoration: none">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Notifications</li>
            </ol>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i> Messages
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                <tr>
                    <th>S/N</th>
                    <th>Title</th>
                    <th>Sender</th>
                    <th></th>
                </tr>
                </thead>
                            <tbody>
                <tr>
                    <td>1</td>
                    <td>Course Enquires</td>
                    <td>Andrew Show</td>
                    <td class="text-right">
                        <a href="#">
                            <i class="fa fa-eye text-dark" title="view message"></i>
                        </a> &nbsp;&nbsp;
                        <a href="#">
                            <i class="fa fa-reply text-dark" title="Reply message"></i>
                        </a> &nbsp;&nbsp;
                        <a href="#">
                            <i class="fa fa-trash text-danger" title="Delete"></i>
                        </a>
                    </td>
                </tr>
                <tr class="text-light bg-secondary">
                    <td>1</td>
                    <td>Course Enquires</td>
                    <td>Andrew Show</td>
                    <td class="text-right">
                        <a href="#">
                            <i class="fa fa-eye text-light" title="view message"></i>
                        </a> &nbsp;&nbsp;
                        <a href="#">
                            <i class="fa fa-reply text-light" title="Reply message"></i>
                        </a> &nbsp;&nbsp;
                        <a href="#">
                            <i class="fa fa-trash text-warning" title="Delete"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Course Enquires</td>
                    <td>Andrew Show</td>
                    <td class="text-right">
                        <a href="#">
                            <i class="fa fa-eye text-dark" title="view message"></i>
                        </a> &nbsp;&nbsp;
                        <a href="#">
                            <i class="fa fa-reply text-dark" title="Reply message"></i>
                        </a> &nbsp;&nbsp;
                        <a href="#">
                            <i class="fa fa-trash text-danger" title="Delete"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Course Enquires</td>
                    <td>Andrew Show</td>
                    <td class="text-right">
                        <a href="#">
                            <i class="fa fa-eye text-dark" title="view message"></i>
                        </a> &nbsp;&nbsp;
                        <a href="#">
                            <i class="fa fa-reply text-dark" title="Reply message"></i>
                        </a> &nbsp;&nbsp;
                        <a href="#">
                            <i class="fa fa-trash text-danger" title="Delete"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Course Enquires</td>
                    <td>Andrew Show</td>
                    <td class="text-right">
                        <a href="#">
                            <i class="fa fa-eye text-dark" title="view message"></i>
                        </a> &nbsp;&nbsp;
                        <a href="#">
                            <i class="fa fa-reply text-dark" title="Reply message"></i>
                        </a> &nbsp;&nbsp;
                        <a href="#">
                            <i class="fa fa-trash text-danger" title="Delete"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Course Enquires</td>
                    <td>Andrew Show</td>
                    <td class="text-right">
                        <a href="#">
                            <i class="fa fa-eye text-dark" title="view message"></i>
                        </a> &nbsp;&nbsp;
                        <a href="#">
                            <i class="fa fa-reply text-dark" title="Reply message"></i>
                        </a> &nbsp;&nbsp;
                        <a href="#">
                            <i class="fa fa-trash text-danger" title="Delete"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Course Enquires</td>
                    <td>Andrew Show</td>
                    <td class="text-right">
                        <a href="#">
                            <i class="fa fa-eye text-dark" title="view message"></i>
                        </a> &nbsp;&nbsp;
                        <a href="#">
                            <i class="fa fa-reply text-dark" title="Reply message"></i>
                        </a> &nbsp;&nbsp;
                        <a href="#">
                            <i class="fa fa-trash text-danger" title="Delete"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Course Enquires</td>
                    <td>Andrew Show</td>
                    <td class="text-right">
                        <a href="#">
                            <i class="fa fa-eye text-dark" title="view message"></i>
                        </a> &nbsp;&nbsp;
                        <a href="#">
                            <i class="fa fa-reply text-dark" title="Reply message"></i>
                        </a> &nbsp;&nbsp;
                        <a href="#">
                            <i class="fa fa-trash text-danger" title="Delete"></i>
                        </a>
                    </td>
                </tr>
                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
