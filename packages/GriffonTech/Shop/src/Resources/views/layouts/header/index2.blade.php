<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
    <div class="container">
        <a class="navbar-brand" href="/">{{ config('app.name', 'TYEN') }}</a>
        <button class="navbar-toggler navbar-toggler-right"
                type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <div class="col-lg-6 h-100 text-left text-lg-left my-auto">
                <ul class="nav navbar-nav">
                    <li class="nav-item"> <a href="{{ route("courses.index") }}" class="nav-link text-white-90">Explore Our Courses</a></li>
                    <li class="nav-item"> <a href="/about-us" class="nav-link text-white-90">About-us</a></li>
                    <li class="nav-item"> <a href="{{route('blog.posts.index')}}" class="nav-link text-white-90">Blog</a></li>
                    <li class="nav-item"> <a href="{{ route('faqs.index') }}" class="nav-link text-white-90">FAQ's</a></li>
                </ul>

            </div>
            <ul class="navbar-nav ml-auto">

                <!-- Authentication Links -->
                @guest('user')
                    <li class="nav-item">
                        <a class="nav-link text-truncate" href="{{route('teach')}}">Teach on Tyen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('user.session.index') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('user.register.index') }}">Register</a>
                    </li>

                @endguest


                @auth('user')

                    @if(auth('user')->user()->tutor_id)
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{route('tutor.courses.index')}}">Tutor</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{route('user.tutor_application.create')}}">Become A Tutor</a>
                        </li>
                    @endif
                {{--<li class="nav-item"><a href="#" title="Shopping Cart" class="nav-link text-light"><i class="fa fa-shopping-cart fa-lg"></i></a></li>
                <li class="nav-item"><a href="#" title="Whishlist" class="nav-link text-light"><i class="fa fa-heart fa-lg"></i></a></li>--}}
                <li class="nav-item dropdown">
                        <a href="#" class="dropdown-toggle nav-link text-light" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img src="{{ asset('images/images.png') }}" alt="avatar" width="20" height="20" class="rounded-circle"> &nbsp {{ auth('user')->user()->username }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <a href="{{ route('user.course.index') }}" class="text-decoration-none text-dark"><li class="dropdown-item">My Courses</li></a>
                            <a href="{{ route('user.profile.index') }}" class="text-decoration-none text-dark"><li class="dropdown-item">Profile</li></a>
                            <a href="{{ route('user.referral.show') }}" class="text-decoration-none text-dark"><li class="dropdown-item">Referral</li></a>
                            <a href="#" class="text-decoration-none text-dark"><li class="dropdown-item">Notifications</li></a>
                            <a href="{{route('user.purchases.index')}}" class="text-decoration-none text-dark"><li class="dropdown-item">Purchase history</li></a>
                            <a href="{{route('user.blog.index')}}" class="text-decoration-none text-dark"><li class="dropdown-item">My Blog</li></a>
                            <a href="{{route('user.testimonies.index')}}" class="text-decoration-none text-dark"><li class="dropdown-item">Testimonies</li></a>
                            <li class="dropdown-divider"></li>
                            <a href="{{ route('user.session.destroy') }}" class="text-decoration-none text-dark"><li class="dropdown-item">
                                    Logout
                                </li>
                            </a>

                        </ul>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
