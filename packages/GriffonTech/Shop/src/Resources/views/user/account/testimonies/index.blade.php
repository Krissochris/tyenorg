@extends('shop::layouts.master')


@section('content')
    <!-- Breadcumb area start -->
    <section class="breadcumb_area" style="background-image: url({{ asset('lms/img/bg-pattern/breadcumb.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcumb_section">
                        <!-- Breadcumb page title start -->
                        <div class="page_title">
                            <h3>My Testimonies</h3>
                        </div>
                        <!-- Breadcumb page pagination start -->
                        <div class="page_pagination">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                <li>My Testimonies</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><br>
    <!-- Breadcumb area end -->

    <!-- Page Content -->
    <br>
    <div class="container">

        <div class="row">
            <div class="col-sm-6">
                {!! Form::open(['route' => 'user.testimonies.create']) !!}
                        <p>Say Something...</p>
                        <div>
                            <textarea name="testimony" id="" cols="50" rows="5" class="form-control"></textarea>
                        </div>
                    <br>
                        <div>
                            <button class="btn btn-primary btn-sm">Testify</button>
                        </div>
                {!! Form::close() !!}
            </div>
        </div>
        <br>


        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th>S/N</th>
                            <th>Testimonies</th>
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
                                <td>{{$testimony->created_at}}</td>
                                <td class="text-right">
                                    <a href="#" class="text-danger text-decoration-none font-weight-bold"
                                       onclick="event.preventDefault();
                                           var response = confirm('Are you sure you want to delete this testimony?');
                                           if (response) {
                                           document.getElementById('{{ $testimony->id }}').submit(); }"
                                    >Delete</a>
                                    <form id="{{ $testimony['id'] }}" action="{{ route('user.testimonies.delete', $testimony['id']) }}" method="POST" style="display: none;">
                                        <input type="hidden" name="_method" value="delete">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><br>
    <!-- /.container -->

@endsection
