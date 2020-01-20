@extends('shop::layouts.master')


@section('content')
    <!-- Page Content -->
    <br>
    <div class="container">

        <div class="row">
            <div class="col-sm-6">
                <form action="">
                    <div class="card">
                        <h3 class="card-header">Add Testimony</h3>
                        <div class="card-body">
                            <textarea name="testimony" id="" cols="30" rows="4" class="form-control"></textarea>
                        </div>
                        <div class="card-footer">
                            <input type="submit" value="Testify" class="btn btn-dark float-right">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Testimonies</h1>


        <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            </div>
            <div class="col-md-12 table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th>S/N</th>
                        <th>Testimonies</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $sn = 1; ?>
                    @foreach($testimonies as $testimony)
                        <tr>
                            <td>{{ $sn++ }}</td>
                            <td>{{$testimony->testimony}}</td>
                            <td>{{$testimony->status}}</td>
                            <td>{{$testimony->created_at}}</td>
                            <td class="text-right">
                                <a href="#" class="text-primary text-decoration-none font-weight-bold">View</a> &nbsp; | &nbsp;
                                <a href="#" class="text-danger text-decoration-none font-weight-bold">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><br>
    <!-- /.container -->

@endsection
