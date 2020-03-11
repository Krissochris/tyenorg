<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{config('app.name', 'TYEN')}}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('dashboard/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{ asset('dashboard/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('dashboard/css/sb-admin.css')}}" rel="stylesheet">
    <script src="{{ asset('dashboard/vendor/jquery/jquery.min.js')}}"></script>
    <style>
        /* file upload css */
        .btn-file {
            overflow: hidden;
            position: relative;
            vertical-align: middle;
        }
        .btn-file > input {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            opacity: 0;
            filter: alpha(opacity=0);
            transform: translate(-300px, 0) scale(4);
            cursor: pointer;
        }
        .fileinput {
            margin-bottom: 9px;
            display: inline-block;
        }
        .fileinput .uneditable-input {
            display: inline-block;
            margin-bottom: 0px;
            vertical-align: middle;
            cursor: text;
        }
        .fileinput .thumbnail {
            overflow: hidden;
            display: inline-block;
            margin-bottom: 5px;
            vertical-align: middle;
            text-align: center;
        }
        .fileinput .thumbnail > img {
            max-height: 100%;
        }
        .fileinput .btn {
            vertical-align: middle;
        }
        .fileinput .input-group-addon {
            padding: 7px 15px;
            font-weight: 600;
        }
        .fileinput-exists .fileinput-new,
        .fileinput-new .fileinput-exists {
            display: none;
        }
        .fileinput-inline .fileinput-controls {
            display: inline;
        }
        .fileinput .uneditable-input {
            white-space: normal;
        }
        .fileinput-new .input-group .btn-file {
            border-radius: 0 1px 1px 0;
        }
        .fileinput-new .input-group .btn-file.btn-xs,
        .fileinput-new .input-group .btn-file.btn-sm {
            border-radius: 0 1px 1px 0;
        }
        .fileinput-new .input-group .btn-file.btn-lg {
            border-radius: 0 1px 1px 0;
        }
        .form-group.has-warning .fileinput .uneditable-input {
            color: #927608;
            border-color: #f7dc6f;
        }
        .form-group.has-warning .fileinput .fileinput-preview {
            color: #927608;
        }
        .form-group.has-warning .fileinput .thumbnail {
            border-color: #f7dc6f;
        }
        .form-group.has-error .fileinput .uneditable-input {
            color: #a81515;
            border-color: #f29797;
        }
        .form-group.has-error .fileinput .fileinput-preview {
            color: #a81515;
        }
        .form-group.has-error .fileinput .thumbnail {
            border-color: #f29797;
        }
        .form-group.has-success .fileinput .uneditable-input {
            color: #527f26;
            border-color: #b8df92;
        }
        .form-group.has-success .fileinput .fileinput-preview {
            color: #527f26;
        }
        .form-group.has-success .fileinput .thumbnail {
            border-color: #b8df92;
        }
    </style>
</head>

<body id="page-top">

@include('tutor::layout.header.index')
<div id="wrapper">
    @include('tutor::layout.sidebar.index')

    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            {{--<ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('tutor-courses')}}" style="text-decoration: none">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Add Course</li>
            </ol>--}}

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

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            @yield('content')

        </div>

    </div>


</div>
<!-- /#wrapper -->
@include('tutor::layout.footer.index')
<script src="{{ asset('admin/js/fileinput.min.js') }}"></script>
</body>
</html>
