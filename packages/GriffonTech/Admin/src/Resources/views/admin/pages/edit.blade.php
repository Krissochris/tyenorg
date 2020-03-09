@extends("admin::layouts.master")

@section('title')
    Admin | Edit Page
@stop

@section("content")
    <div class="ibox">
        <div class="ibox-title">
            <h5> Edit Page </h5>
        </div>
        <div class="ibox-content">
            {!! Form::open(['route' => ['admin.pages.edit', $page ]]) !!}

            <div class="form-group">
                {!! Form::label($page, $page) !!}
                {!! Form::textarea($page, setting($page), ['class' => 'form-control summernote', 'id'=>'editor'] ) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Submit',['class'=> 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
