<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TYEN</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="{{ asset('vendor/bootstrap/css/custom.css')}}" rel="stylesheet">

</head>

<body>
@include('shop::layouts.header.index')

<div class="container">
    <div class="container mt-4">
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
    </div>

    @auth('user')
    @if(!auth('user')->user()->is_pro_user)
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <a class="float-right btn btn-success" href="{{ route('user.pro_user') }}"> <i class="fas fa-flash"></i> Upgrade to Pro User</a>

                </div>
            </div>
        </div>
    @endif
    @endauth

    @yield('content')
</div>

@include('shop::layouts.footer.index')
</body>
</html>