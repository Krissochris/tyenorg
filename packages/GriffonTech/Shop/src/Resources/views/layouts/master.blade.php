<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>TYEN - @yield('title') </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('lms/img/core-img/favicon.ico') }}">

    <!-- ===================== All CSS Files ===================== -->

    <!-- Style css -->
    <link href="{{ asset('admin/css/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('lms/style.css') }}">

    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('lms/css/responsive.css') }}">
    <style>
        .p-30 {
            padding: 30px 0;
        }
    </style>
</head>

<body>
<!-- Preloader -->
<div id="preloader"></div>

<!-- Header Area Start -->
@include("shop::layouts.header.index")
<!--  ===================== Header Area End ===================== -->

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

<!-- ===================== Footer Area Start ===================== -->
@include("shop::layouts.footer.index")
<!-- ===================== Footer Area End ===================== -->

<!-- ===================== All jQuery Plugins ===================== -->

<!-- jQuery (necessary for all JavaScript plugins) -->
<script src="{{ asset('lms/js/jquery-2.2.4.min.js') }}"></script>
<!-- Popper js -->
<script src="{{ asset('lms/js/popper.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ asset('lms/js/bootstrap.min.js') }}"></script>
<!-- Plugins js -->
<script src="{{ asset('lms/js/plugins.js') }}"></script>
<!-- Classy Nav js -->
<script src="{{ asset('lms/js/classy-nav.js') }}"></script>
<!-- Active js -->
<script src="{{ asset('lms/js/active.js') }}"></script>
<script src="{{ asset('admin/js/plugins/summernote/summernote-bs4.js') }}"></script>
<script>
    $(document).ready(function(){

        $('.summernote').summernote();

    });
</script>
@yield('footer-scripts')
</body>

</html>
