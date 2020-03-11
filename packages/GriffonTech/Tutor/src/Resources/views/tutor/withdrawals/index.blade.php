@extends("tutor::layout.master")


@section("content")

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Withdrawals </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Note</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($withdrawals as $withdrawal)
                                <tr>
                                    <td> {{ $withdrawal->amount }} </td>
                                    <td> {{ $withdrawal->status }} </td>
                                    <td> {{ $withdrawal->note }} </td>
                                    <td> {{ $withdrawal->created_at }} </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
