@extends("tutor::layout.master")

@section('title')
    Delete Course
@stop

@section("content")


    <div class="container page__heading-container">
        <div class="page__heading d-flex align-items-center justify-content-between">
            <h1 class="m-0">Delete Course</h1>
        </div>
    </div>


    <div class="container page__container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">

                    <div class="jumbotron text-center">
                        <h4>
                            Are you sure you would like to delete course : <br/>
                            <strong>{{ $course->name }}</strong>
                        </h4>

                    </div>

                    {!! Form::open(['route' =>['tutor.courses.destroy', $course->url_key], 'method' => 'delete']) !!}
                    <div class="card-form__body card-body">

                        <div class="card-body text-center">
                            <button type="submit" class="btn btn-danger">Yes</button>
                            <a href="{{ route('tutor.courses.index') }}" class="btn btn-success">No</a>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
@endsection

@section('page-footer-script')

@stop
