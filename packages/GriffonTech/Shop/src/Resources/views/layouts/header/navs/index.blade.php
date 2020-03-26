<div class="page__header  page__header-nav mb-0">
    <div class="container page__container">
        <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0 d-none d-md-flex" id="secondaryNavbar">
            <ul class="nav navbar-nav">
                <li class="nav-item active">
                    <a href="{{ route('user.home.index') }}" class="nav-link active">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.home.index') }}" class="nav-link">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.home.index') }}" class="nav-link">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.home.index') }}" class="nav-link">FaQs</a>
                </li>
                @auth('user')
                    @if(auth('user')->user()->tutor_id)
                        <li class="nav-item">
                            <a href="{{route('tutor.dashboard.index')}}" class="nav-link">Tutor Account </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{route('user.tutor_application.create')}}" class="nav-link">Become A Tutor</a>
                        </li>
                    @endif

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">My Account</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('user.dashboard.index') }}">Dashboard</a>
                        <a class="dropdown-item" href="{{ route('user.course.index') }}">My Courses</a>
                        <a class="dropdown-item" href="{{ route('user.referral.show') }}">Referrals</a>
                        <a class="dropdown-item" href="{{ route('user.withdrawals.index') }}">Request Withdrawal</a>
                        <a class="dropdown-item" href="{{route('user.purchases.index')}}">Purchase History</a>
                        <a class="dropdown-item" href="{{route('user.blog.index')}}">My Blog Posts</a>
                        <a class="dropdown-item" href="{{route('user.testimonies.index')}}">My Testimonies</a>
                    </div>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</div>
