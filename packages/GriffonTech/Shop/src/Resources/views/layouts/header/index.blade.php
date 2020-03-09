<header class="header_area">
    <!-- Top Header Area Start -->
    <div class="top_header_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md">
                    <!--  Top Quote Area Start -->
                    <div class="top_quote">
                        <p>Welcome to TYEN LMS Platform</p>
                    </div>
                </div>
                <div class="col-md">
                    <div class="login_language_area d-flex align-items-center float-right">
                        <!-- Login Register Area Start -->
                        @guest('user')
                        <div class="login_register">
                            <a href="{{ route('user.session.index') }}"><i class="fa fa-lock" aria-hidden="true"></i> Login/Register</a>
                        </div>
                        @endguest

                        <!-- Language Area Start -->
                        <div class="language_area">
                            <div class="dropdown">
                                <button aria-expanded="false" aria-haspopup="true" data-toggle="dropdown" id="lag" type="button" class="btn btn-default dropdown-toggle"><i class="fa fa-globe" aria-hidden="true"></i> Language</button>
                                <ul aria-labelledby="lag" class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header Area Start -->
    <div class="main_header_area animated">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="educampNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="/"><img src="{{ asset('lms/img/core-img/tyen-learn-logo.png') }}" alt="Logo"></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="{{ route("courses.index") }}">Explore Courses</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="{{route('blog.posts.index')}}">Blog</a></li>
                                <li><a href="{{ route('faqs.index') }}">Faqs</a></li>
                                @guest('user')
                                <li><a href="{{ route('user.session.index') }}">Login</a></li>
                                <li><a href="{{ route('user.register.index') }}">Register</a></li>
                                @endguest

                                @auth('user')
                                        @if(auth('user')->user()->tutor_id)
                                            <li><a href="{{route('tutor.courses.index')}}">Tutor Account </a></li>
                                        @else
                                            <li><a href="{{route('user.tutor_application.create')}}">Become A Tutor</a></li>
                                        @endif
                                        <li><a href="#">{{ auth('user')->user()->username }}</a>
                                            <ul class="dropdown">
                                                <li><a href="{{ route('user.dashboard.index') }}">Dashboard</a></li>
                                                <li><a href="{{ route('user.course.index') }}">My Courses</a></li>
                                                <li><a href="{{ route('user.profile.index') }}">Profile</a></li>
                                                <li><a href="{{ route('user.referral.show') }}">Referrals</a></li>
                                                <li><a href="#">Notifications</a></li>
                                                <li><a href="{{route('user.purchases.index')}}">Purchase History</a></li>
                                                <li><a href="{{route('user.blog.index')}}">My Blog</a></li>
                                                <li><a href="{{route('user.testimonies.index')}}">Testimonies</a></li>
                                            </ul>
                                        </li>
                                            <li><a href="{{ route('user.session.destroy') }}"> <i class="fa fa-power-off"></i> Log Out</a></li>
                                    @endauth
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
