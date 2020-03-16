<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
{{--
                    <img alt="image" class="rounded-circle" src="img/profile_small.jpg"/>
--}}
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold"> {{ auth('admin')->user()->name }}</span>
                        <span class="text-muted text-xs block"> admin <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                        <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                        <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li>
                <a href="{{ route('admin.site_settings.index') }}"> <span class="nav-label"> Site Settings </span> </a>
            </li>
            <li>
                <a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.admins.index') }}"><i class="fa fa-users"></i> <span class="nav-label">Admins</span>
                </a>
            </li>
            <li>
                <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Tutors</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('admin.tutor_application_submissions.index') }}">Tutor Applications</a></li>
                    <li><a href="{{ route('admin.tutors.index') }}"> Tutors </a></li>
                    <li><a href="{{ route('admin.tutor_withdrawals.index') }}"> Tutor Withdrawals </a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Users</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li>

                        <a href="{{ route('admin.users.index') }}">Users</a>
                        <a href="{{ route('admin.users.index') }}">User Bonus Withdrawals</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-book"></i> <span class="nav-label">Courses</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('admin.categories.index') }}">Course Categories</a></li>
                    <li><a href="{{ route('admin.courses.index') }}">Courses</a></li>
                    <li><a href="{{ route('admin.course_batches.index') }}"> Course Batches </a></li>
                    <li><a href="{{ route('admin.course_registrations.index') }}"> Course Registrations </a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-money"></i> <span class="nav-label">Payments</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.blogs.index') }}"><i class="fa fa-blogger-b"></i> <span class="nav-label">Blogs</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.reviews.index') }}"><i class="fa fa-comment"></i> <span class="nav-label">Reviews</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.testimonies.index') }}"><i class="fa fa-comment-alt"></i> <span class="nav-label">Testimonies</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.faqs.index') }}"><i class="fa fa-blogger-b"></i> <span class="nav-label">FAQs</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.pages.index') }}">
                    <span class="nav-label"> Pages </span>
                </a>
            </li>
        </ul>

    </div>
</nav>
