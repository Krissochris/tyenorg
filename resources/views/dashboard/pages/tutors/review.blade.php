@extends('dashboard.layouts.header')
@section('content')
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('tutor-courses')}}" style="text-decoration: none">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Reviews</li>
            </ol>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i> Reviews
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                            <tr>
                                <th>S/N</th>
                                <th>User</th>
                                <th>Review</th>
                                <th>Rating</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Andrew Show</td>
                                <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                <td class="text-right">
                                    <strong class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Andrew Show</td>
                                <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                <td class="text-right">
                                    <strong class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Andrew Show</td>
                                <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                <td class="text-right">
                                    <strong class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Andrew Show</td>
                                <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                <td class="text-right">
                                    <strong class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Andrew Show</td>
                                <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                <td class="text-right">
                                    <strong class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Andrew Show</td>
                                <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                <td class="text-right">
                                    <strong class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Andrew Show</td>
                                <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                <td class="text-right">
                                    <strong class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Andrew Show</td>
                                <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                <td class="text-right">
                                    <strong class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Andrew Show</td>
                                <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                <td class="text-right">
                                    <strong class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Andrew Show</td>
                                <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                <td class="text-right">
                                    <strong class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>Andrew Show</td>
                                <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                <td class="text-right">
                                    <strong class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>Andrew Show</td>
                                <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                <td class="text-right">
                                    <strong class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</strong>
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
