<div class="mdk-header bg-dark js-mdk-header m-0">
    <div class="mdk-header__content">

        <div class="navbar navbar-expand-sm navbar-main navbar-dark bg-primary pl-md-0 pr-0" id="navbar" data-primary>
            <div class="container">

                <!-- Navbar toggler -->
                <button class="navbar-toggler navbar-toggler-custom d-lg-none d-flex mr-navbar" type="button" data-toggle="sidebar">
                    <span class="material-icons">short_text</span>
                </button>


                <div class="d-flex sidebar-account flex-shrink-0 mr-auto mr-lg-0">
                    <a href="{{ route('user.home.index') }}" class="flex d-flex align-items-center text-underline-0">
                        <img src="{{ asset('images/logo-white.png') }}" style="width: 70px;" >
                    </a>
                </div>


                <ul class="nav navbar-nav d-none d-md-flex">
                    @guest('user')
                    <li class="nav-item"><a href="{{ route('user.session.index') }}" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="{{ route('user.register.index') }}" class="nav-link">Register</a></li>
                    @endguest
                </ul>


                @auth('user')
                <div class="dropdown">
                    <a href="#account_menu" class="dropdown-toggle navbar-toggler navbar-toggler-dashboard border-left d-flex align-items-center ml-navbar" data-toggle="dropdown">
                        <img src="{{ asset('images/avatar.png') }}" class="rounded-circle" width="32" alt="{{ auth('user')->user()->name }}">
                        <span class="ml-1 d-flex-inline">
                            <span class="text-light"> {{ auth('user')->user()->name }} </span>
                        </span>
                    </a>
                    <div id="company_menu" class="dropdown-menu dropdown-menu-right navbar-company-menu">
                        <div class="dropdown-item d-flex align-items-center py-2 navbar-company-info py-3">
                            <span class="flex d-flex flex-column">
                                        <strong class="h5 m-0">
                                            <?php
                                            $names = explode(' ', auth('user')->user()->name);
                                            $name = auth('user')->user()->name;
                                            if (count($names) > 1) {
                                                $name = $names[0]. ' .';
                                                $last_name_abbr = substr($names[1], 0, 1);
                                                $name .= $last_name_abbr;
                                             }
                                            ?>
                                            {{ ucfirst($name)  }}
                                        </strong>
                                        <small class="text-muted text-uppercase">STUDENT</small>
                                    </span>

                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item d-flex align-items-center py-2" href="{{ route('user.profile.index') }}">
                            <span class="material-icons mr-2">account_circle</span> Edit Account
                        </a>
                        <a class="dropdown-item d-flex align-items-center py-2" href="#">
                            <span class="material-icons mr-2">settings</span> Settings
                        </a>
                        <a class="dropdown-item d-flex align-items-center py-2" href="{{ route('user.session.destroy') }}">
                            <span class="material-icons mr-2">exit_to_app</span> Logout
                        </a>
                    </div>
                </div>
                @endauth

            </div>
        </div>

    </div>
</div>
