<div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
    <div class="mdk-drawer__content">

        <div class="sidebar sidebar-light sidebar-left bg-white" data-perfect-scrollbar>


            <div class="sidebar-block p-0 m-0">
                <div class="d-flex align-items-center sidebar-p-a border-bottom bg-light">
                    <a href="#" class="flex d-flex align-items-center text-body text-underline-0">
                                        <span class="avatar avatar-sm mr-2">
                                            <span class="avatar-title rounded-circle bg-soft-secondary text-muted">
                                                <?php
                                                $name = '';
                                                $names = explode(' ', auth('user')->user()->tutor_profile->name);
                                                for ($i = 0; $i < count($names); $i++) {
                                                   $name .= substr($names[$i], 0, 1);
                                                   if ($i > 1) {
                                                       break;
                                                   }
                                                }
                                                echo strtoupper($name);
                                                ?>
                                            </span>
                                        </span>
                        <span class="flex d-flex flex-column">
                                            <strong> {{ auth('user')->user()->tutor_profile->name }} </strong>
                                            <small class="text-muted text-uppercase">Instructor</small>
                                        </span>
                    </a>
                    <div class="dropdown ml-auto">
                        <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('tutor.dashboard.index') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{route('tutor.profile.edit')}}">My profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" rel="nofollow" data-method="delete" href="{{ route('user.session.destroy') }}">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sidebar-block p-0">

                <div class="sidebar-heading">Instructor</div>


                <ul class="sidebar-menu mt-0">
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="{{ route('tutor.dashboard.index') }}">
                                            <span class="sidebar-menu-icon sidebar-menu-icon--left">
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="22" height="22">
                                                    <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                                        <path d="M5,16.751c-0.552,0-1,0.448-1,1s0.448,1,1,1h16c0.552,0,1-0.448,1-1s-0.448-1-1-1H5z M24,14.251c0-0.552-0.448-1-1-1H4.5 c-2.485,0.001-4.499,2.017-4.498,4.502c0.001,2.484,2.014,4.497,4.498,4.498H23c0.552,0,1-0.448,1-1s-0.448-1-1-1H4.5 c-1.381,0-2.5-1.119-2.5-2.5s1.119-2.5,2.5-2.5H23C23.552,15.251,24,14.803,24,14.251z M1,7.751h0.209 c0.224,0,0.42,0.149,0.481,0.364c0.754,2.656,3.519,4.199,6.175,3.445c2.15-0.61,3.634-2.574,3.635-4.809 c0-0.276,0.224-0.5,0.5-0.5s0.5,0.224,0.5,0.5c0.001,2.761,2.24,4.999,5.001,4.999c2.235-0.001,4.198-1.485,4.809-3.635 c0.061-0.215,0.257-0.364,0.481-0.364H23c0.552,0,1-0.448,1-1s-0.448-1-1-1h-0.209c-0.223,0-0.42-0.148-0.481-0.363 c-0.741-2.648-3.489-4.194-6.137-3.453c-1.214,0.34-2.253,1.127-2.909,2.203c-0.119,0.193-0.353,0.282-0.57,0.217 c-0.452-0.139-0.936-0.139-1.388,0c-0.217,0.065-0.451-0.024-0.57-0.217C9.305,1.79,6.241,1.047,3.893,2.479 C2.817,3.135,2.03,4.174,1.69,5.388C1.629,5.603,1.432,5.751,1.209,5.751H1c-0.552,0-1,0.448-1,1S0.448,7.751,1,7.751z M17.5,3.751 c1.657,0,3,1.343,3,3s-1.343,3-3,3s-3-1.343-3-3S15.843,3.751,17.5,3.751z M6.5,3.751c1.657,0,3,1.343,3,3s-1.343,3-3,3 s-3-1.343-3-3S4.843,3.751,6.5,3.751z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </g>
                                                </svg>
                                            </span>
                            <span class="sidebar-menu-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="{{ route('tutor.courses.index') }}">
                                            <span class="sidebar-menu-icon sidebar-menu-icon--left">
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="22" height="22">
                                                    <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                                        <path d="M24,1.5C24,0.672,23.328,0,22.5,0h-21C0.672,0,0,0.672,0,1.5v21C0,23.328,0.672,24,1.5,24h21c0.828,0,1.5-0.672,1.5-1.5 V1.5z M10,21.5c0,0.276-0.224,0.5-0.5,0.5h-3C6.224,22,6,21.776,6,21.5v-6C6,15.224,6.224,15,6.5,15h3c0.276,0,0.5,0.224,0.5,0.5 V21.5z M15.5,21.5c0,0.276-0.224,0.5-0.5,0.5h-2c-0.276,0-0.5-0.224-0.5-0.5v-5c0-0.276,0.224-0.5,0.5-0.5h2 c0.276,0,0.5,0.224,0.5,0.5V21.5z M20.5,21.5c0,0.276-0.224,0.5-0.5,0.5h-2c-0.276,0-0.5-0.224-0.5-0.5v-6 c0-0.276,0.224-0.5,0.5-0.5h2c0.276,0,0.5,0.224,0.5,0.5V21.5z M23,11.75c0,0.414-0.336,0.75-0.75,0.75H1.75 C1.336,12.5,1,12.164,1,11.75S1.336,11,1.75,11H3c0.276,0,0.5-0.224,0.5-0.5V3.487C3.487,3.232,3.683,3.014,3.938,3h2.624 C6.817,3.014,7.013,3.232,7,3.487V10.5C7,10.776,7.224,11,7.5,11h1C8.776,11,9,10.776,9,10.5V6c0.012-0.288,0.254-0.511,0.542-0.5 h2.166c0.288-0.011,0.53,0.212,0.542,0.5v4.5c0,0.276,0.224,0.5,0.5,0.5h3.106c0.138,0,0.25-0.112,0.25-0.25 c0-0.029-0.005-0.059-0.015-0.086l-2.565-7c-0.079-0.229,0.043-0.479,0.272-0.558c0.007-0.003,0.015-0.005,0.023-0.007l1.8-0.577 c0.242-0.082,0.505,0.039,0.6,0.276l2.886,7.871c0.072,0.197,0.259,0.328,0.469,0.328h2.674c0.414,0,0.75,0.336,0.75,0.75 c0,0.001,0,0.003,0,0.004V11.75z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </g>
                                                </svg>
                                            </span>
                            <span class="sidebar-menu-text">My Courses</span>
                        </a>
                    </li>



                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="{{route('tutor.review.index')}}">
                                            <span class="sidebar-menu-icon sidebar-menu-icon--left">
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="22" height="22">
                                                    <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                                        <path d="M12.75,5h-6C6.336,5,6,5.336,6,5.75S6.336,6.5,6.75,6.5h6c0.414,0,0.75-0.336,0.75-0.75S13.164,5,12.75,5z M13.5,9.25 c0-0.414-0.336-0.75-0.75-0.75h-8C4.336,8.5,4,8.836,4,9.25S4.336,10,4.75,10h8C13.164,10,13.5,9.664,13.5,9.25z M4.75,12 C4.336,12,4,12.336,4,12.75s0.336,0.75,0.75,0.75h5.5c0.414,0,0.75-0.336,0.75-0.75S10.664,12,10.25,12H4.75z M11.3,17.655 c-0.039-0.093-0.13-0.154-0.231-0.155H2.5C2.224,17.5,2,17.276,2,17V2.5C2,2.224,2.224,2,2.5,2h13C15.776,2,16,2.224,16,2.5v10.07 c0,0.138,0.112,0.25,0.251,0.249c0.066,0,0.13-0.027,0.176-0.073l1.28-1.28C17.895,11.279,18,11.024,18,10.759V2 c0-1.105-0.895-2-2-2H2C0.895,0,0,0.895,0,2v15.5c0,1.105,0.895,2,2,2h7.868c0.22,0,0.413-0.143,0.478-0.353 c0.095-0.311,0.267-0.592,0.5-0.819l0.4-0.4C11.318,17.856,11.339,17.749,11.3,17.655z M12.062,20.131 c-0.099-0.097-0.258-0.096-0.355,0.003c-0.034,0.034-0.057,0.078-0.067,0.125L11.012,23.4c-0.055,0.271,0.119,0.535,0.39,0.59 c0.033,0.007,0.066,0.01,0.1,0.01c0.034,0,0.067-0.003,0.1-0.01l3.143-0.629c0.135-0.027,0.223-0.159,0.195-0.295 c-0.01-0.048-0.034-0.093-0.068-0.127L12.062,20.131z M23.228,11.765c-1.023-1.02-2.677-1.02-3.7,0l-6.5,6.5 c-0.195,0.195-0.195,0.512,0,0.707l3,3c0.195,0.195,0.512,0.195,0.707,0l6.5-6.5C24.257,14.447,24.254,12.787,23.228,11.765 C23.228,11.765,23.228,11.765,23.228,11.765z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </g>
                                                </svg>
                                            </span>
                            <span class="sidebar-menu-text">Course Reviews</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="{{route('tutor.withdrawals.index')}}">
                                            <span class="sidebar-menu-icon sidebar-menu-icon--left">
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="22" height="22">
                                                    <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                                        <path d="M16,5.75c0.414,0,0.75-0.336,0.75-0.75V3.5c0-0.414-0.336-0.75-0.75-0.75s-0.75,0.336-0.75,0.75V5 C15.25,5.414,15.586,5.75,16,5.75z M21,3c0-1.657-1.343-3-3-3H6C4.343,0,3,1.343,3,3v18c0,1.657,1.343,3,3,3h12 c1.657,0,3-1.343,3-3V3z M12,14c0.552,0,1,0.448,1,1s-0.448,1-1,1s-1-0.448-1-1S11.448,14,12,14z M11,10.5c0-0.552,0.448-1,1-1 s1,0.448,1,1s-0.448,1-1,1S11,11.052,11,10.5z M16.5,18.75c0.414,0,0.75,0.336,0.75,0.75s-0.336,0.75-0.75,0.75H11 c-0.414,0-0.75-0.336-0.75-0.75s0.336-0.75,0.75-0.75H16.5z M16.5,16c-0.552,0-1-0.448-1-1s0.448-1,1-1c0.552,0,1,0.448,1,1 S17.052,16,16.5,16z M16.5,11.5c-0.552,0-1-0.448-1-1s0.448-1,1-1c0.552,0,1,0.448,1,1S17.052,11.5,16.5,11.5z M7.5,16 c-0.552,0-1-0.448-1-1s0.448-1,1-1s1,0.448,1,1S8.052,16,7.5,16z M8.5,19.5c0,0.552-0.448,1-1,1s-1-0.448-1-1s0.448-1,1-1 S8.5,18.948,8.5,19.5z M7.5,11.5c-0.552,0-1-0.448-1-1s0.448-1,1-1s1,0.448,1,1S8.052,11.5,7.5,11.5z M6,2h12c0.552,0,1,0.448,1,1 v3.25c0,0.138-0.112,0.25-0.25,0.25H5.25C5.112,6.5,5,6.388,5,6.25V3C5,2.448,5.448,2,6,2z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </g>
                                                </svg>
                                            </span>
                            <span class="sidebar-menu-text">Earnings</span>
                        </a>
                    </li>


                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="{{route('tutor.profile.edit')}}">
                                            <span class="sidebar-menu-icon sidebar-menu-icon--left material-icons">
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="22" height="22">
                                                    <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                                        <path d="M0.5,13.985h3c0.276,0,0.5-0.224,0.5-0.5C3.95,11.87,3.532,10.289,2.778,8.86C2.76,8.825,2.75,8.786,2.75,8.746V5.205 c0-0.414-0.336-0.75-0.75-0.75s-0.75,0.336-0.75,0.75v3.541c0,0.04-0.009,0.079-0.027,0.114C0.468,10.288,0.05,11.87,0,13.485 C0,13.761,0.224,13.985,0.5,13.985z M21.187,20.271l-0.017-0.006l-4.97-1.647c-0.175-0.057-0.367-0.013-0.5,0.114l-3.357,3.231 c-0.193,0.185-0.498,0.185-0.691,0l-3.4-3.218c-0.133-0.126-0.325-0.169-0.5-0.112l-4.938,1.638 c-1.381,0.511-2.426,1.663-2.8,3.087c-0.07,0.267,0.09,0.54,0.357,0.611c0.041,0.011,0.084,0.016,0.126,0.016h23 c0.276,0,0.5-0.225,0.499-0.501c0-0.042-0.005-0.084-0.016-0.125C23.608,21.936,22.566,20.783,21.187,20.271z M23.586,1.993 L12.429,0.052c-0.284-0.049-0.574-0.049-0.858,0L0.414,1.993C0.142,2.041-0.04,2.3,0.008,2.572c0.036,0.207,0.199,0.37,0.406,0.406 l11.157,1.94c0.284,0.051,0.574,0.051,0.858,0l11.157-1.94c0.272-0.048,0.454-0.307,0.406-0.579 C23.956,2.192,23.793,2.029,23.586,1.993z M18.458,5.393l-6.115,1.063c-0.227,0.039-0.458,0.039-0.685,0L5.543,5.393 C5.407,5.369,5.277,5.46,5.254,5.596C5.251,5.61,5.25,5.625,5.25,5.639V10c0,0.061-0.022,0.12-0.063,0.166 c-0.336,0.408-0.506,0.927-0.476,1.455C4.7,12.634,5.252,13.57,6.144,14.05l0.151,0.192c0.51,3.047,4.02,4.99,5.686,4.99 s5.175-1.943,5.685-4.989l0.151-0.192c0.891-0.482,1.443-1.417,1.433-2.43c0.026-0.507-0.131-1.006-0.442-1.407 c-0.037-0.045-0.058-0.101-0.058-0.159V5.639c0-0.138-0.111-0.249-0.248-0.25C18.487,5.389,18.472,5.39,18.458,5.393z M17.192,12.693c-0.53,0.242-0.904,0.732-1,1.306c-0.377,2.249-3.174,3.739-4.207,3.739S8.15,16.246,7.773,14 c-0.096-0.574-0.471-1.063-1-1.306C6.41,12.45,6.198,12.037,6.21,11.6c-0.02-0.152,0.016-0.305,0.1-0.433 c0.266-0.121,0.437-0.386,0.438-0.678V8.548c0-0.079,0.037-0.153,0.1-0.2c0.061-0.047,0.141-0.063,0.216-0.044 C8.675,8.73,10.334,8.948,12,8.952c1.667-0.003,3.326-0.22,4.937-0.646c0.134-0.035,0.27,0.045,0.305,0.179 c0.005,0.021,0.008,0.042,0.008,0.063v1.821c-0.055,0.321,0.105,0.639,0.395,0.787c0.089,0.128,0.126,0.285,0.105,0.44 c0.014,0.436-0.197,0.85-0.558,1.095V12.693z M12.939,14.306c-0.076,0.041-0.155,0.074-0.237,0.1 c-0.187,0.055-0.38,0.082-0.575,0.081l0,0c-0.196,0.001-0.392-0.026-0.58-0.082c-0.082-0.026-0.162-0.059-0.238-0.1 c-0.365-0.196-0.82-0.06-1.016,0.305c-0.196,0.365-0.06,0.82,0.305,1.016l0,0c0.162,0.087,0.333,0.157,0.51,0.21 c0.33,0.099,0.673,0.15,1.017,0.149h0.007c0.343,0.002,0.685-0.048,1.014-0.147c0.177-0.054,0.348-0.125,0.511-0.212 c0.367-0.192,0.509-0.645,0.317-1.012s-0.645-0.509-1.012-0.317c-0.006,0.003-0.012,0.007-0.019,0.01L12.939,14.306z M11.189,12 c0.277-0.308,0.253-0.782-0.055-1.059c-0.769-0.62-1.867-0.62-2.636,0c-0.293,0.293-0.292,0.768,0.001,1.061 c0.271,0.27,0.701,0.294,0.999,0.054c0.195-0.111,0.433-0.111,0.628,0c0.307,0.278,0.781,0.255,1.059-0.052 C11.187,12.003,11.188,12.001,11.189,12z M13.064,10.945c-0.293,0.293-0.292,0.768,0.001,1.061c0.271,0.27,0.701,0.294,0.999,0.054 c0.195-0.111,0.433-0.111,0.628,0c0.293,0.293,0.768,0.293,1.061,0.001c0.293-0.293,0.293-0.768,0.001-1.061 c-0.019-0.019-0.04-0.038-0.061-0.055C14.924,10.329,13.832,10.329,13.064,10.945z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </g>
                                                </svg>
                                            </span>
                            <span class="sidebar-menu-text">Profile</span>
                        </a>
                    </li>



                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="{{route('tutor.withdrawals.index')}}">
                                            <span class="sidebar-menu-icon sidebar-menu-icon--left">
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="22" height="22">
                                                    <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                                        <path d="M20.375,15.792V4.958c0.008-0.59-0.463-1.075-1.053-1.083c0,0,0,0,0,0H1.428c-0.59,0.008-1.061,0.493-1.053,1.083 c0,0,0,0,0,0v10.834c-0.008,0.59,0.463,1.075,1.053,1.083c0,0,0,0,0,0h17.894C19.912,16.867,20.383,16.382,20.375,15.792 C20.375,15.792,20.375,15.792,20.375,15.792z M10.375,13.375c-1.657,0-3-1.343-3-3s1.343-3,3-3s3,1.343,3,3 S12.032,13.375,10.375,13.375z M22.875,6.625c-0.414,0-0.75,0.336-0.75,0.75v11c0,0.138-0.112,0.25-0.25,0.25h-18 c-0.414,0-0.75,0.336-0.75,0.75s0.336,0.75,0.75,0.75h18c0.966-0.001,1.749-0.784,1.75-1.75v-11 C23.625,6.961,23.289,6.625,22.875,6.625z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </g>
                                                </svg>
                                            </span>
                            <span class="sidebar-menu-text">Withdrawals</span>
                        </a>
                    </li>



                </ul>
            </div>
            <div class="sidebar-block p-0">
                <div class="sidebar-heading">Navigations</div>
                <ul class="sidebar-menu mt-0">

                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="{{ route('user.dashboard.index') }}">
                            <span class="sidebar-menu-text"> Student Account </span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="{{ route('user.home.index') }}">
                            <span class="sidebar-menu-text">Home</span>
                        </a>
                    </li>


                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="{{ route('courses.index') }}">
                            <span class="sidebar-menu-text">Explore Courses</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="{{ route('pages.view', 'page_about_us') }}">
                            <span class="sidebar-menu-text">About Us</span>
                        </a>
                    </li>


                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="{{ route('pages.view', 'page_contact_us') }}">
                            <span class="sidebar-menu-text">Contact Us</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
