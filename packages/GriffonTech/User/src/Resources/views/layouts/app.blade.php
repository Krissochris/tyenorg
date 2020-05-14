<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TYEN</title>

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
    </script>
    <noscript>
        <img height="1" width="1"
             src="https://www.facebook.com/tr?id=237023990956129&ev=PageView
             &noscript=1"/>
    </noscript>

    <!-- End Facebook Pixel Code -->

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="{{ asset('vendor/bootstrap/css/custom.css')}}" rel="stylesheet">

</head>

<body>
@include('user::partials.header.index')

@yield('content')

</body>
</html>
