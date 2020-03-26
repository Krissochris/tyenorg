@extends('shop::layouts.master')


@section('content')
    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center justify-content-between">
            <h1 class="m-0">My Testimonies</h1>
        </div>
    </div>


    <div class="container page__container">
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
