@extends("admin::layouts.master")

@section('title')
    Admin | Pages
@stop

@section("content")
    <div class="ibox">
        <div class="ibox-title">
            <h5> Pages </h5>
        </div>
        <div class="ibox-content">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th> Pages </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pages as $page_url =>  $page)
                        <tr>
                            <td> {{ $page }} </td>
                            <td>
                                <a href="{{route('admin.pages.edit', $page_url)}}"> Edit </a>&nbsp;&nbsp;
                                <a href="{{route('admin.pages.view', $page_url)}}"> View </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
