<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title> {{ setting('application_name', '') }} - @yield('title') </title>


    <!-- Facebook Pixel Code -->

    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window,document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '237023990956129');
        fbq('track', 'PageView');
        @yield('fb_pixel_script')
    </script>
    <noscript>
        <img height="1" width="1"
             src="https://www.facebook.com/tr?id=237023990956129&ev=PageView
             &noscript=1"/>
    </noscript>

    <!-- End Facebook Pixel Code -->



    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">

    <!-- Perfect Scrollbar -->

    <link type="text/css" href="{{ asset('assets/vendor/perfect-scrollbar.css') }}" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/app.rtl.css') }}" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="{{ asset('assets/css/vendor-material-icons.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-material-icons.rtl.css') }}" rel="stylesheet">

    <!-- Font Awesome FREE Icons -->
    <link type="text/css" href="{{ asset('assets/css/vendor-fontawesome-free.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-fontawesome-free.rtl.css') }}" rel="stylesheet">

    <!-- ion Range Slider -->
    <link type="text/css" href="{{ asset('assets/css/vendor-ion-rangeslider.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-ion-rangeslider.rtl.css') }}" rel="stylesheet">
    @yield('css')
    {!! setting('head_scripts') !!}
    <style>
        .page__heading-container {
            margin-top: 60px;
        }
    </style>
</head>

<body class="layout-fixed layout-sticky-subnav">

<div class="preloader"></div>

<!-- Header Layout -->
<div class="mdk-header-layout js-mdk-header-layout">

    <!-- Header -->
    @include('shop::layouts.header.index')
    <!-- // END Header -->


    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content page">

        @include('shop::layouts.header.navs.index')

        <div style="{{ (request()->route()->getName() === "user.home.index") ? 'margin-top: 40px;' : 'margin-top: 60px;'  }} ">
            <div class="container page__container">

                @if ($errors->any())
                    <div class="alert alert-danger mt-2">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-soft-success d-flex  align-items-center mt-2" role="alert">
                        <i class="material-icons mr-3">check_circle</i>
                        <div class="text-body"><strong>Success:</strong>
                            {{ Session::get('success') }}
                        </div>
                    </div>
                @endif

                @if(Session::has('warning'))
                    <div class="alert alert-soft-warning d-flex  align-items-center m-0 mt-2" role="alert">
                        <i class="material-icons mr-3">error_outline</i>
                        <div class="text-body"><strong>warning</strong>
                            {{ Session::get('warning') }}
                        </div>
                    </div>
                @endif

                @if(Session::has('info'))
                    <div class="alert alert-soft-info d-flex align-items-center mt-2" role="alert">
                        <i class="material-icons mr-3">info_outline</i>
                        <div class="text-body"><strong>Info - </strong>
                            {{ Session::get('info') }}
                        </div>
                    </div>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-soft-danger d-flex align-items-center mt-2" role="alert">
                        <i class="material-icons mr-3">error_outline</i>
                        <div class="text-body"><strong>Error - </strong>
                            {{ Session::get('error') }}
                        </div>
                    </div>
                @endif
            </div>

            @yield('content')
        </div>

        @include('shop::layouts.footer.index')
    </div>
    <!-- // END Header Layout Content -->

</div>
<!-- // END Header Layout -->
@include('shop::layouts.sidebar.index')

<!-- jQuery -->
<script src="{{ asset('assets/vendor/jquery.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('assets/vendor/popper.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap.min.js') }}"></script>

<!-- Perfect Scrollbar -->
<script src="{{ asset('assets/vendor/perfect-scrollbar.min.js') }}"></script>

<!-- DOM Factory -->
<script src="{{ asset('assets/vendor/dom-factory.js') }}"></script>

<!-- MDK -->
<script src="{{ asset('assets/vendor/material-design-kit.js') }}"></script>

<!-- Range Slider -->
<script src="{{ asset('assets/vendor/ion.rangeSlider.min.js') }}"></script>
<script src="{{ asset('assets/js/ion-rangeslider.js') }}"></script>

<!-- App -->
<script src="{{ asset('assets/js/toggle-check-all.js') }}"></script>
<script src="{{ asset('assets/js/check-selected-row.js') }}"></script>
<script src="{{ asset('assets/js/dropdown.js') }}"></script>
<script src="{{ asset('assets/js/sidebar-mini.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
@yield('footer-scripts')
<script src="{{ asset('assets/vendor/tinymice/tinymce.min.js') }}"></script>
<script>tinymce.init({
        selector:'.tinymce_editor',
        images_dataimg_filter: function(img) {
            return img.hasAttribute('internal-blob');
        },
        height: 200,
        theme: 'modern',
        plugins: [
            'advlist autolink lists link image jbimages charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
        ],
        toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image |  jbimages',
        toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
        image_advtab: true,
        templates: [
            { title: 'Test template 1', content: 'Test 1' },
            { title: 'Test template 2', content: 'Test 2' }
        ],
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
        ]
});
</script>
</body>

</html>
