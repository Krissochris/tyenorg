<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> TYEN Admin | @yield('title') </title>

    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">

</head>

<body>
<div id="wrapper">
    @include('admin::layouts.sidebar.index')
    <div id="page-wrapper" class="gray-bg">

        @include('admin::layouts.header.index')

        <div class="wrapper wrapper-content" style="padding-bottom: 100px;">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}</p>
            @endif

            @if(Session::has('warning'))
                <p class="alert alert-warning">{{ Session::get('warning') }}</p>
            @endif

            @if(Session::has('info'))
                <p class="alert alert-info">{{ Session::get('info') }}</p>
            @endif
            @if(Session::has('error'))
                <p class="alert alert-danger">{{ Session::get('error') }}</p>
            @endif
            @yield('content')

        </div>
        <div class="footer">
            <div class="float-right">
                <div class="">
                    <p class="copyrights-text">
                        Copyright © <strong> TYEN </strong> - All Right Reserved.
                    </p>

                    <p>Proudly Powered by: <strong> TYCT INITIATIVE (RC No: 127873) </strong>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Mainly scripts -->
<script src="{{ asset('admin/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('admin/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.js') }}"></script>
<script src="{{ asset('admin/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('admin/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('admin/js/plugins/dataTables/datatables.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('admin/js/inspinia.js') }}"></script>
<script src="{{ asset('admin/js/plugins/pace/pace.min.js') }}"></script>

<!-- jQuery UI -->
<script src="{{ asset('admin/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('admin/js/fileinput.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins/summernote/summernote-bs4.js') }}"></script>
@yield('footer-scripts')
<script>
    $(document).ready(function(){

        $('.summernote').summernote();

    });
    $(document).ready(function(){
        $('#data-table').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                /*{ extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {extend: 'print',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }*/
            ]

        });

    });
</script>
</body>
</html>
