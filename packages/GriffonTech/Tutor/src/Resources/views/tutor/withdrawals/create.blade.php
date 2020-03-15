@extends("tutor::layout.master")


@section("content")

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-4">

                        <div class="card text-white bg-success o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-piggy-bank"></i>
                                </div>
                                <div class="mr-5">{{ $tutorProfile->amount_balance }} USD</div>
                            </div>
                            <p class="card-footer text-white clearfix small z-1">
                                <span class="float-left"> Account Balance </span>
                            </p>
                        </div>
                    </div>
                </div>



                <div class="card" style="margin-top: 20px;">
                    <div class="card-header">
                        <h5> Create Withdrawal Request </h5>
                    </div>
                    <div class="card-body">

                        {!! Form::open(['route' => 'tutor.withdrawals.create']) !!}

                        <div class="form-group">
                            <label for="amount"> Amount </label>
                            {!! Form::number('amount', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary"> Withdrawal </button>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
