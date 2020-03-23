@extends("shop::layouts.master")

@section('title')
    {{ __('Tutor Application Agreement Form') }}
@stop

@section('content')
    <div class="container p-30">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left"> Tutor Agreement Form </h3>
                    </div>
                    <div class="card-body">

                        {!! Form::model($tutor_agreement, ['route' => ['user.tutor_application.agreement_save', $tutor_agreement->id]]) !!}

                        @if($attributes)
                            <?php $num = 1;  ?>
                            @foreach($attributes as $attribute)
                                @if (view()->exists('shop::user.tutor_agreement.field-types.'.$attribute->type))
                                    <div class="form-group">
                                        <label for="{{ $attribute->code }}">{{$num}}.  {{ $attribute->admin_name }} </label>
                                        @include('shop::user.tutor_agreement.field-types.'.$attribute->type)
                                    </div>
                                @endif
                                <?php $num++; ?>
                            @endforeach
                        @endif
                        {{--<div class="form-group">
                            <label for="signed_on">
                                <input type="checkbox" id="signed_on" name="signed_on" value="1"> Sign Agreement
                            </label>
                        </div>--}}
                        <div class="form-group">
                            <button class="btn btn-primary"> Save </button>
                        </div>

                        {!! Form::close() !!}

                        <a href="{{ route('user.tutor_application.create') }}"><< Go Back </a>

                        <a class="pull-right" href="{{ route('user.tutor_application.preview') }}"> Preview and Submit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

