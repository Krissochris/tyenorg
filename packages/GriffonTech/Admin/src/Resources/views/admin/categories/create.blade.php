@extends("admin::layouts.master")

@section("content")

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="float-left">Create Category</h3>
                            <a href="{{route('admin.categories.index')}}" class="btn btn-dark float-right">Go Back</a>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'admin.categories.create']) !!}
                            <div class="form-group">
                                <label for="name"> Name</label>
                                {!! Form::text('name',null, ['class' => 'form-control',  'placeholder' => 'Category Name']) !!}
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary float-right" value="Create">
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                <hr>
            </div>
        </div>
    </div>
@endsection
