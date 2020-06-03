@extends("admin::layouts.master")

@section('title')
    Email Subscribers
@stop

@section('header-includes')
    <link href="{{ asset('admin/css/plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet">
@stop


@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Email Subscribers </h5>
                </div>
                <div class="ibox-content table-responsive">
                    <div style="margin-bottom: 20px;">
                        <form id="form-csv" method="POST" action="{{ route('admin.email_subscribers.download') }}" class="form-inline">
                            @csrf
                            <div class="form-group mr-4">
                                <label for="start_date"> Start Date </label>
                                <div class="input-group date">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i></span>
                                    <input name="start_date" id="start_date" type="text" class="form-control date-range" required>
                                </div>
                            </div>

                            <div class="form-group mr-4">
                                <label for="end_date"> End Date </label>
                                <div class="input-group date">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i></span>
                                    <input name="end_date" id="end_date" type="text" class="form-control date-range" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-dark">Generate </button>
                            </div>
                        </form>
                    </div>


                    <table id="data-table" class="table table-hover no-margins">
                        <thead class="">
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (isset($emailSubscribers))
                            @foreach($emailSubscribers as $subscriber)
                                <tr>
                                    <td> {{ $subscriber->id }}</td>
                                    <td> {{ $subscriber->email }} </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')
    <!-- Date range picker -->
    <script src="{{ asset('admin/js/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <script>
        $('.date-range').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            format : 'YYYY-MM-DD'
        });
    </script>
@stop
