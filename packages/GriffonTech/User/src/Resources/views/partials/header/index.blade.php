<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
    <div class="container">
        <a class="navbar-brand" href="/index">{{ config('app.name', 'TYEN') }}</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <div class="col-lg-6 h-100 text-left text-lg-left my-auto">
                <ul class="nav navbar-nav">
                    <li class="nav-item"> <a href="/courses" class="nav-link text-white-90">Explore Our Courses</a></li>
                    <li class="nav-item"> <a href="/about-us" class="nav-link text-white-90">About-us</a></li>
                    <li class="nav-item"> <a href="/portfolio" class="nav-link text-white-90">Portfolio</a></li>
                    <li class="nav-item"> <a href="/blog" class="nav-link text-white-90">Blog</a></li>
                    <li class="nav-item"> <a href="/faq" class="nav-link text-white-90">FAQ's</a></li>
                </ul>

            </div>
            <ul class="navbar-nav ml-auto">

                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('user.session.index') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('user.register.index') }}">Register</a>
                    </li>

                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="dropdown-toggle nav-link text-light" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img src="images/images.png" alt="avatar" width="20" height="20" class="rounded-circle"> &nbsp {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li class="dropdown-item"><a href="/dashboard" class="nav-link text-primary">My Courses</a></li>
                            <li class="dropdown-item"><a href="/dashboard" class="nav-link text-primary">Profile</a></li>
                            <li class="dropdown-item">
                                <a href="{{ route('logout') }}" class="nav-link text-primary"
                                   onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
