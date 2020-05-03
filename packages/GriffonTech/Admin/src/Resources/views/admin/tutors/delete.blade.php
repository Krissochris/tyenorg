@extends('admin::layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Delete </h5>
                </div>
                <div class="ibox-content table-responsive">
                    <p> Are you sure you would like to delete tutor : {{ $tutorProfile->name }} ?</p>

                    <div>
                        This entails removing both his/her courses, comments everything.

                        {!! Form::open(['route' => ['admin.tutors.destroy', $tutorProfile->id] ]) !!}

                        <div>
                            <input type="hidden" name="_method" value="DELETE">

                            <a href="{{ route('admin.tutors.index') }}" class="btn btn-primary">Cancel</a>
                            <button class="btn btn-danger">Proceed</button>
                        </div>

                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
