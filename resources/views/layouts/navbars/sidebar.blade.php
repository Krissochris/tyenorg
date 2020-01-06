<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="/index" target="_blank" class="simple-text logo-normal">
      {{ __('TYEN') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'tutor-management' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
            <i class="material-icons">people</i>
          <p>{{ __('Users Management') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse hide" id="laravelExample">
          <ul class="nav">
              <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('user.index') }}">
                      <i class="material-icons">person</i>
                      <span class="sidebar-normal"> {{ __('User Manager') }} </span>
                  </a>
              </li>
              <li class="nav-item{{ $activePage == 'tutor-management' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('tutor.index') }}">
                      <i class="material-icons">account_box</i>
                      <span class="sidebar-normal"> {{ __('Tutor Manager') }} </span>
                  </a>
              </li>
              <li class="nav-item{{ $activePage == 'admin-management' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('user.index') }}">
                      <i class="material-icons">assignment_ind</i>
                      <span class="sidebar-normal"> {{ __('Admin Manager') }} </span>
                  </a>
              </li>
          </ul>
        </div>
      </li>

        <li class="nav-item {{ ($activePage == 'category' || $activePage == 'course') ? ' active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#courses" aria-expanded="true">
                <i class="material-icons">library_books</i>
                <p>{{ __('Course Management') }}
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse" id="courses">
                <ul class="nav">
                    <li class="nav-item{{ $activePage == 'category' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('table') }}">
                            <span class="sidebar-mini"><i class="material-icons">folder</i></span>
                            <span class="sidebar-normal"> {{ __('Category Manager') }} </span>
                        </a>
                    </li>
                    <li class="nav-item{{ $activePage == 'course' ? ' active' : '' }}">
                        <a class="nav-link" href="{{route('course.index')}}">
                            <span class="sidebar-mini"> <i class="material-icons">assignment</i> </span>
                            <span class="sidebar-normal"> {{ __('Course Manager') }} </span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item {{ ($activePage == 'currency-setting' || $activePage == 'site-settings') ? ' active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#setting" aria-expanded="true">
                <i class="material-icons">build</i>
                <p>{{ __('Site Settings') }}
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse hide" id="setting">
                <ul class="nav">
                    <li class="nav-item{{ $activePage == 'currency' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('table') }}">
                            <span class="sidebar-mini"><i class="material-icons">attach_money</i></span>
                            <span class="sidebar-normal"> {{ __('Currency Setting') }} </span>
                        </a>
                    </li>
                    <li class="nav-item{{ $activePage == 'others' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('table') }}">
                            <span class="sidebar-mini"> <i class="material-icons">all_inclusive</i> </span>
                            <span class="sidebar-normal"> {{ __('Other Setting') }} </span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item{{ $activePage == 'blog-page' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('blog-table') }}">
                <i class="material-icons">message</i>
                <p>{{ __('Blog') }}</p>
            </a>
        </li>
        <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('comment-table') }}">
                <i class="material-icons">comment</i>
                <p>{{ __('Comments') }}</p>
            </a>
        </li>
      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('icons') }}">
          <i class="material-icons">list</i>
          <p>{{ __('Testimonials') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
