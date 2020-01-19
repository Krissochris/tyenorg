@extends("admin::layouts.master")

@section("title")
    Admin | Create Faq
@stop

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Create Faq </h3>
                        <a href="{{route('admin.faqs.index')}}" class="btn btn-dark float-right">Go Back</a>
                    </div>

                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.faqs.create']) !!}
                        <div class="row">
                            <div class="col-sm-6">

                                <div class="form-group">
                                    <label for="testimony"> Question </label>
                                    {!! Form::text('question', null, ['class' => 'form-control', 'placeholder' => 'Question']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="testimony"> Answer </label>
                                    {!! Form::textarea('answer', null, ['class' => 'form-control', 'placeholder' => 'Answer']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="testimony"> Order </label>
                                    {!! Form::number('order', null, ['class' => 'form-control', 'placeholder' => 'Order']) !!}
                                </div>

                                <div class="form-group">
                                    <label for="testimony"> Status </label>
                                    {!! Form::select('status', $status, null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary float-right" value="Create">
                                </div>
                            </div>

                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
@endsection
