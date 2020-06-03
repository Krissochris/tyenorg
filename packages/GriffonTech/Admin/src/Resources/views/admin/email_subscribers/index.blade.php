@extends("admin::layouts.master")

@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Email Subscribers </h5>
                </div>
                <div class="ibox-content table-responsive">
                    <div style="margin-bottom: 20px;">
                        <a href="#" class=" btn btn-dark"><i class="fa fa-file"></i> Export as ...</a>
                    </div>


                    <table id="data-table" class="table table-hover no-margins">
                        <thead class="">
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>example@example.com</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
