@extends('shop::layouts.master')

@section('title')
    Homepage
@stop

@section('css')
    <link href="{{ asset('assets/unpkg.com/aos%402.3.1/dist/aos.css') }}" rel="stylesheet">
@stop

@section('content')


    <div class="home-banner text-white mb-4">
        <div class="container page__container">
            <h1 class="display-4 bold" data-aos="fade-up" data-aos-duration="800">Everything you need to LEARN</h1>
            <p class="lead mb-5" data-aos="fade-up" data-aos-duration="1000">
                Learn with a team of likeminds; master a skill and be your own Boss - <strong>
                    We shall HELP YOU for Free
                </strong>
            </p>
            <div data-aos="fade-down" data-aos-duration="400" data-aos-delay="400" data-offset="-100">
                <a class="btn btn-light btn-lg mr-1" href="{{ route('courses.index') }}">Browse Lessons</a>
                <a class="btn btn-success btn-lg" href="{{ route('user.register.index') }}">Get Started</a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="m-4 p-4">
            <h2 class="bold mb-1 text-center">Features &amp; Highlights</h2>
            <p class="lead text-muted text-center">
                What Makes TYEN the best unified community for entrepreneurs around the world
            </p>
        </div>
        <div class="row mb-4">
            <div class="col-md-6 d-flex align-items-center  flex-row-reverse" data-aos-duration="500" data-aos="fade-right">
                <div class="avatar avatar-xl ml-3">
                <span class="bg-primary border avatar-title rounded-circle text-center text-white">
                    <strong>BS</strong>
                </span>
                </div>
                <div class="text-right">
                    <strong> Skill Acquisition </strong>
                    <p class="m-0"> Fully Sponsored Skills for free </p>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center" data-aos-duration="500" data-aos="fade-left">
                <div class="avatar avatar-xl mr-3">
                <span class="bg-primary border avatar-title rounded-circle text-center text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="32" height="32">
                        <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                            <path d="M11.979,17.125c4.052,0,6.875-5.1,6.875-9.67c-0.001-0.95-0.136-1.895-0.4-2.808l0,0c-0.828-2.841-3.522-4.723-6.475-4.522 C9.029-0.063,6.342,1.818,5.51,4.654v0.009c-0.26,0.911-0.395,1.853-0.4,2.8C5.105,12.035,7.929,17.125,11.979,17.125z M16.617,11.281c-0.048,0.125-0.185,0.19-0.312,0.148c-1.395-0.412-2.846-0.599-4.3-0.554c-1.469-0.045-2.936,0.144-4.346,0.559 c-0.127,0.043-0.265-0.022-0.312-0.147c-0.42-1.088-0.664-2.235-0.722-3.4C6.619,7.818,6.642,7.751,6.689,7.7 c0.047-0.049,0.112-0.077,0.18-0.077H17.09c0.138,0,0.25,0.112,0.25,0.25c0,0.004,0,0.008,0,0.012 C17.28,9.048,17.036,10.194,16.617,11.281z M21.632,18.127c0.123,0.065,0.274,0.018,0.339-0.105C21.99,17.986,22,17.946,22,17.906 v-1.531c0-0.138,0.112-0.25,0.25-0.25H23c0.414,0,0.75-0.336,0.75-0.75s-0.336-0.75-0.75-0.75h-0.75c-0.138,0-0.25-0.112-0.25-0.25 v-3c0-0.828-0.672-1.5-1.5-1.5s-1.5,0.672-1.5,1.5v3c0,0.138-0.112,0.25-0.25,0.25H18c-0.414,0-0.75,0.336-0.75,0.75 s0.336,0.75,0.75,0.75h0.75c0.138,0,0.25,0.112,0.25,0.25v0.2c0,0.092,0.051,0.177,0.132,0.22L21.632,18.127z M23.033,19.792 c-0.759-0.561-1.581-1.031-2.45-1.4c-0.119-0.052-0.258-0.005-0.32,0.109l-1.181,1.667l-2.367,3.338 c-0.066,0.121-0.022,0.273,0.099,0.339c0.037,0.02,0.078,0.031,0.12,0.031H23.5c0.276,0,0.5-0.224,0.5-0.5V21.77 C24.007,20.995,23.648,20.263,23.033,19.792z M11.079,21.4l-3.527-3.968c-0.117-0.132-0.294-0.193-0.467-0.16 c-2.206,0.358-4.3,1.221-6.118,2.52C0.351,20.262-0.007,20.995,0,21.77v1.605c0,0.276,0.224,0.5,0.5,0.5h7.326 c0.073,0,0.142-0.032,0.19-0.087l3.066-2.06C11.162,21.633,11.161,21.493,11.079,21.4z M18.31,17.837 c-0.029-0.07-0.088-0.123-0.161-0.145c-0.244-0.069-0.5-0.136-0.76-0.2c-0.091-0.022-0.187,0.009-0.249,0.08l-0.633,0.586 l-5.731,5.305c-0.09,0.105-0.078,0.263,0.027,0.353c0.045,0.039,0.103,0.06,0.162,0.06h3.191c0.092,0,0.176-0.05,0.22-0.13 l3.068-4.452l0.855-1.24C18.335,17.987,18.339,17.907,18.31,17.837z M8.489,8.826C8.185,9.108,8.168,9.583,8.45,9.887 c0.282,0.304,0.757,0.321,1.061,0.039l0,0c0.173-0.097,0.384-0.097,0.557,0c0.304,0.282,0.779,0.265,1.061-0.039 c0.282-0.304,0.265-0.779-0.039-1.061C10.339,8.192,9.24,8.192,8.489,8.826z M13.421,10.125c0.19,0.001,0.372-0.071,0.511-0.2 c0.173-0.097,0.384-0.097,0.557,0c0.304,0.282,0.779,0.265,1.061-0.039c0.282-0.304,0.265-0.779-0.039-1.061 c-0.751-0.633-1.849-0.633-2.6,0c-0.304,0.282-0.322,0.756-0.04,1.06C13.013,10.038,13.213,10.125,13.421,10.125L13.421,10.125z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                    </svg>
                </span>
                </div>
                <div>
                    <strong> Team Learning </strong>
                    <p class="m-0"> Learn together with a team of likeminds  </p>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6 d-flex align-items-center  flex-row-reverse" data-aos-duration="500" data-aos="fade-right">
                <div class="avatar avatar-xl ml-3">
                <span class="bg-primary border avatar-title rounded-circle text-center text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="30" height="30">
                        <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                            <path d="M23,14.5H1c-0.552,0-1,0.448-1,1V16c0,0.684,0.462,1.282,1.125,1.453C1.346,17.51,1.5,17.709,1.5,17.937V23 c0,0.552,0.448,1,1,1s1-0.448,1-1v-1c0-0.276,0.224-0.5,0.5-0.5h16c0.276,0,0.5,0.224,0.5,0.5v1c0,0.552,0.448,1,1,1s1-0.448,1-1 v-5.063c0-0.228,0.154-0.427,0.375-0.484C23.538,17.282,24,16.684,24,16v-0.5C24,14.948,23.552,14.5,23,14.5z M20.5,19 c0,0.276-0.224,0.5-0.5,0.5H4c-0.276,0-0.5-0.224-0.5-0.5v-1c0-0.276,0.224-0.5,0.5-0.5h16c0.276,0,0.5,0.224,0.5,0.5V19z M7.522,5.717l0.75,0.385c0.143,0.073,0.313,0.073,0.456,0l0.75-0.385C9.645,5.631,9.75,5.46,9.75,5.272V4.334 c0-0.189-0.107-0.362-0.276-0.447l-0.75-0.375c-0.141-0.071-0.307-0.071-0.448,0l-0.75,0.375C7.357,3.972,7.25,4.145,7.25,4.334 v0.938C7.25,5.46,7.355,5.631,7.522,5.717z M14.522,9.217l0.75,0.385c0.143,0.073,0.313,0.073,0.456,0l0.75-0.385 c0.167-0.086,0.272-0.257,0.272-0.445V7.834c0-0.189-0.107-0.362-0.276-0.447l-0.75-0.375c-0.141-0.071-0.307-0.071-0.448,0 l-0.75,0.375c-0.169,0.085-0.276,0.258-0.276,0.447v0.938C14.25,8.96,14.355,9.131,14.522,9.217z M2.5,13h19 c0.276,0,0.5-0.224,0.5-0.5v-11C22,0.672,21.328,0,20.5,0h-17C2.672,0,2,0.672,2,1.5v11C2,12.776,2.224,13,2.5,13z M5.75,3.871 C5.749,3.397,6.017,2.964,6.441,2.753L7.941,2c0.352-0.175,0.766-0.175,1.118,0l1.5,0.75c0.424,0.211,0.692,0.644,0.691,1.118v1.4 c0,0.188,0.106,0.36,0.273,0.445l1.275,0.649c0.162,0.082,0.355,0.07,0.505-0.031c0.107-0.071,0.118-0.068,1.171-0.6 c0.169-0.085,0.276-0.258,0.276-0.447V3.5c0-0.414,0.336-0.75,0.75-0.75c0.414,0,0.75,0.336,0.75,0.75v1.79 c0,0.189,0.107,0.362,0.276,0.447l1.033,0.516c0.424,0.211,0.692,0.644,0.691,1.118V9.23c0.001,0.469-0.262,0.899-0.68,1.112 l-1.5,0.77c-0.358,0.184-0.784,0.184-1.142,0l-1.5-0.77c-0.417-0.213-0.68-0.643-0.678-1.112v-0.9c0-0.188-0.106-0.36-0.273-0.445 l-1.748-0.889c-0.143-0.073-0.312-0.073-0.455,0L9.522,7.383C9.355,7.468,9.25,7.64,9.25,7.827v2.237c0,0.414-0.336,0.75-0.75,0.75 s-0.75-0.336-0.75-0.75V7.825c0-0.187-0.105-0.359-0.272-0.444L6.429,6.842C6.011,6.629,5.749,6.199,5.75,5.73V3.871z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                    </svg>
                </span>
                </div>
                <div class="text-right">
                    <strong>Certified Instructors</strong>
                    <p class="m-0"> Get tutored by Award Winning TYEN Instructors </p>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center" data-aos-duration="500" data-aos="fade-left">
                <div class="avatar avatar-xl mr-3">
                <span class="bg-primary border avatar-title rounded-circle text-center text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="30" height="30">
                        <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                            <path d="M7.652,14.05v-0.6C7.65,12.373,6.777,11.501,5.7,11.5H4.5c-0.414,0-0.75,0.336-0.75,0.75v6C3.75,18.664,4.086,19,4.5,19 h1.2c1.077-0.001,1.949-0.873,1.951-1.95v-0.6C7.65,16.117,7.564,15.79,7.4,15.5c-0.089-0.155-0.089-0.345,0-0.5 C7.564,14.71,7.651,14.383,7.652,14.05z M6.152,17.05c-0.017,0.249-0.231,0.437-0.48,0.42c-0.225-0.015-0.405-0.195-0.42-0.42v-0.6 c0.017-0.249,0.231-0.437,0.48-0.42c0.225,0.015,0.405,0.195,0.42,0.42V17.05z M6.152,14.05c-0.017,0.249-0.231,0.437-0.48,0.42 c-0.225-0.015-0.405-0.195-0.42-0.42v-0.6c0.017-0.249,0.231-0.437,0.48-0.42c0.225,0.015,0.405,0.195,0.42,0.42V14.05z M7.652,4.95C7.618,3.873,6.716,3.028,5.64,3.062C4.611,3.095,3.785,3.921,3.752,4.95v4.8c0,0.414,0.336,0.75,0.75,0.75 s0.75-0.336,0.75-0.75v-1.2c-0.017-0.249,0.171-0.463,0.42-0.48c0.249-0.017,0.463,0.171,0.48,0.42c0.001,0.02,0.001,0.04,0,0.06 v1.2c0,0.414,0.336,0.75,0.75,0.75s0.75-0.336,0.75-0.75V4.95z M6.152,6.15c-0.017,0.249-0.231,0.437-0.48,0.42 c-0.225-0.015-0.405-0.195-0.42-0.42v-1.2c0.017-0.249,0.231-0.437,0.48-0.42c0.225,0.015,0.405,0.195,0.42,0.42V6.15z M11.2,4H9.7 C9.286,4,8.95,4.336,8.95,4.75S9.286,5.5,9.7,5.5h1.5c0.414,0,0.75-0.336,0.75-0.75S11.614,4,11.2,4z M11.951,12.75 c0-0.414-0.336-0.75-0.75-0.75c0,0-0.001,0-0.001,0H9.7c-0.414,0-0.75,0.336-0.75,0.75S9.286,13.5,9.7,13.5h1.5 c0.414,0.001,0.75-0.335,0.751-0.749C11.951,12.751,11.951,12.75,11.951,12.75z M8.5,20h-6C2.224,20,2,19.776,2,19.5v-17 C2,2.224,2.224,2,2.5,2h8.672c0.265,0,0.52,0.105,0.707,0.293l2.828,2.828C14.895,5.308,15,5.563,15,5.828V12c0,0.552,0.448,1,1,1 c0.552,0,1-0.448,1-1V5.414c0.001-0.531-0.21-1.04-0.586-1.414L13,0.586C12.624,0.212,12.116,0.001,11.586,0H2C0.895,0,0,0.895,0,2 v18c0,1.105,0.895,2,2,2h6.5c0.552,0,1-0.448,1-1S9.052,20,8.5,20z M23.685,16.61l-6-2.382c-0.119-0.047-0.251-0.047-0.37,0 l-6,2.382c-0.194,0.077-0.319,0.266-0.315,0.475v3.13c0,0.276,0.224,0.5,0.5,0.5s0.5-0.224,0.5-0.5v-2.08 c0-0.138,0.111-0.249,0.248-0.25c0.029,0,0.057,0.005,0.085,0.015l5,1.765c0.108,0.037,0.224,0.037,0.332,0l6-2.118 c0.261-0.091,0.398-0.376,0.307-0.637C23.924,16.773,23.819,16.663,23.685,16.61L23.685,16.61z M20.763,19.829l-2.93,1.034 c-0.215,0.076-0.451,0.076-0.666,0l-2.93-1.034c-0.26-0.092-0.546,0.045-0.638,0.306c-0.019,0.053-0.028,0.11-0.028,0.166v2.145 c0,0.212,0.134,0.401,0.334,0.471l2.574,0.909c0.661,0.232,1.382,0.232,2.043,0l2.573-0.909c0.2-0.07,0.334-0.259,0.334-0.471V20.3 c0-0.276-0.223-0.5-0.5-0.5c-0.057,0-0.113,0.01-0.166,0.028L20.763,19.829z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                    </svg>
                </span>
                </div>
                <div>
                    <strong> Community Access </strong>
                    <p class="m-0"> Free Lifetime Access to your course community</p>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6 d-flex align-items-center  flex-row-reverse" data-aos-duration="500" data-aos="fade-right">
                <div class="avatar avatar-xl ml-3">
                                    <span class="bg-primary border avatar-title rounded-circle text-center text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="30" height="30">
                                            <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                                <path d="M24,4.75c0-1.657-1.343-3-3-3H3c-1.657,0-3,1.343-3,3v14.5c0,1.657,1.343,3,3,3h18c1.657,0,3-1.343,3-3V4.75z M21.75,6.75 C21.888,6.75,22,6.862,22,7v5.5c0,0.138-0.112,0.25-0.25,0.25h-12c-0.138,0-0.25-0.112-0.25-0.25V7c0-0.138,0.112-0.25,0.25-0.25 H21.75z M9.65,3.75c0.258-0.467,0.845-0.637,1.312-0.38c0.16,0.088,0.292,0.22,0.38,0.38c0.096,0.149,0.149,0.322,0.154,0.5 c-0.005,0.178-0.058,0.351-0.154,0.5c-0.258,0.467-0.845,0.637-1.312,0.38C9.87,5.042,9.738,4.91,9.65,4.75 c-0.096-0.149-0.149-0.322-0.154-0.5c0.006-0.178,0.06-0.351,0.158-0.5H9.65z M6.15,3.75c0.258-0.467,0.845-0.637,1.312-0.38 c0.16,0.088,0.292,0.22,0.38,0.38C7.94,3.899,7.994,4.072,8,4.25c-0.005,0.178-0.058,0.351-0.154,0.5 C7.588,5.217,7.001,5.387,6.534,5.13c-0.16-0.088-0.292-0.22-0.38-0.38C6.058,4.601,6.005,4.428,6,4.25 c0.005-0.178,0.058-0.351,0.154-0.5H6.15z M2.588,3.842C2.749,3.482,3.106,3.25,3.5,3.25c0.351,0.004,0.673,0.195,0.846,0.5 C4.442,3.899,4.495,4.072,4.5,4.25c-0.005,0.178-0.058,0.351-0.154,0.5C4.088,5.217,3.501,5.387,3.034,5.13 c-0.16-0.088-0.292-0.22-0.38-0.38C2.558,4.601,2.505,4.428,2.5,4.25c0.001-0.141,0.032-0.28,0.092-0.408H2.588z M8,20 c0,0.138-0.112,0.25-0.25,0.25H3c-0.552,0-1-0.448-1-1V7c0-0.138,0.112-0.25,0.25-0.25h5.5C7.888,6.75,8,6.862,8,7V20z M22,19.25 c0,0.552-0.448,1-1,1H9.75c-0.138,0-0.25-0.112-0.25-0.25v-5.5c0-0.138,0.112-0.25,0.25-0.25h12c0.138,0,0.25,0.112,0.25,0.25 V19.25z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                    </span>
                </div>
                <div class="text-right">
                    <strong> Consistent Update </strong>
                    <p class="m-0"> Get Latest course updates from TYEN RESEARCHERS in your community </p>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center" data-aos-duration="500" data-aos="fade-left">
                <div class="avatar avatar-xl mr-3">
                <span class="bg-primary border avatar-title rounded-circle text-center text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="30" height="30">
                        <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                            <path d="M17.464,11c-3.59,0-6.5,2.91-6.5,6.5s2.91,6.5,6.5,6.5s6.5-2.91,6.5-6.5C23.96,13.912,21.052,11.004,17.464,11z M19.964,18.25h-1.5c-0.138,0-0.25,0.112-0.25,0.25V20c0,0.414-0.336,0.75-0.75,0.75s-0.75-0.336-0.75-0.75v-1.5 c0-0.138-0.112-0.25-0.25-0.25h-1.5c-0.414,0-0.75-0.336-0.75-0.75s0.336-0.75,0.75-0.75h1.5c0.138,0,0.25-0.112,0.25-0.25V15 c0-0.414,0.336-0.75,0.75-0.75s0.75,0.336,0.75,0.75v1.5c0,0.138,0.112,0.25,0.25,0.25h1.5c0.414,0,0.75,0.336,0.75,0.75 S20.378,18.25,19.964,18.25z M12.786,8.5c0-0.414-0.336-0.75-0.75-0.75h-6c-0.414,0-0.75,0.336-0.75,0.75s0.336,0.75,0.75,0.75h6 C12.45,9.25,12.786,8.914,12.786,8.5z M6.036,14.749c-0.414,0-0.75,0.336-0.75,0.75c0,0.414,0.336,0.75,0.75,0.75h3.405 c0.117,0,0.217-0.085,0.237-0.2c0.06-0.323,0.139-0.641,0.238-0.954c0.036-0.116-0.006-0.345-0.333-0.345L6.036,14.749z M9.722,19.194c-0.021-0.115-0.121-0.199-0.238-0.2H3.536c-0.276,0-0.5-0.224-0.5-0.5V5.5c0-0.276,0.224-0.5,0.5-0.5h11 c0.276,0,0.5,0.224,0.5,0.5v4.08c-0.002,0.136,0.107,0.249,0.243,0.251c0.019,0,0.038-0.002,0.057-0.006 c0.814-0.154,1.637-0.252,2.464-0.293c0.132-0.008,0.235-0.118,0.234-0.25V3.5c0-0.828-0.672-1.5-1.5-1.5h-4 c-0.086,0-0.165-0.046-0.208-0.121C11.25,0.06,8.903-0.543,7.084,0.533C6.529,0.861,6.066,1.324,5.738,1.879 C5.696,1.953,5.619,1.999,5.534,2h-4c-0.828,0-1.5,0.672-1.5,1.5v17c0,0.828,0.672,1.5,1.5,1.5h8.94 c0.136,0,0.246-0.11,0.246-0.246c0-0.047-0.014-0.093-0.039-0.133C10.23,20.87,9.906,20.05,9.722,19.194z M11.186,12.654 c0.327-0.427,0.695-0.82,1.1-1.174c0.09-0.079-0.01-0.231-0.245-0.231h-6c-0.414,0-0.75,0.336-0.75,0.75s0.336,0.75,0.75,0.75H11 C11.073,12.747,11.142,12.712,11.186,12.654z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                    </svg>
                </span>
                </div>
                <div>
                    <strong> Free Mentorship </strong>
                    <p class="m-0"> Get Lifetime Skill mentorship in your area of choice </p>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6 d-flex align-items-center  flex-row-reverse" data-aos-duration="500" data-aos="fade-right">
                <div class="avatar avatar-xl ml-3">
                <span class="bg-primary border avatar-title rounded-circle text-center text-white">
                    <strong>BS</strong>
                </span>
                </div>
                <div class="text-right">
                    <strong> Idea & Job Creation </strong>
                    <p class="m-0">We fund feasible ideas and offer job opportunities</p>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center" data-aos-duration="500" data-aos="fade-left">
                <div class="avatar avatar-xl mr-3">
                                    <span class="bg-primary border avatar-title rounded-circle text-center text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="32" height="32">
                                            <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                                <path d="M11.979,17.125c4.052,0,6.875-5.1,6.875-9.67c-0.001-0.95-0.136-1.895-0.4-2.808l0,0c-0.828-2.841-3.522-4.723-6.475-4.522 C9.029-0.063,6.342,1.818,5.51,4.654v0.009c-0.26,0.911-0.395,1.853-0.4,2.8C5.105,12.035,7.929,17.125,11.979,17.125z M16.617,11.281c-0.048,0.125-0.185,0.19-0.312,0.148c-1.395-0.412-2.846-0.599-4.3-0.554c-1.469-0.045-2.936,0.144-4.346,0.559 c-0.127,0.043-0.265-0.022-0.312-0.147c-0.42-1.088-0.664-2.235-0.722-3.4C6.619,7.818,6.642,7.751,6.689,7.7 c0.047-0.049,0.112-0.077,0.18-0.077H17.09c0.138,0,0.25,0.112,0.25,0.25c0,0.004,0,0.008,0,0.012 C17.28,9.048,17.036,10.194,16.617,11.281z M21.632,18.127c0.123,0.065,0.274,0.018,0.339-0.105C21.99,17.986,22,17.946,22,17.906 v-1.531c0-0.138,0.112-0.25,0.25-0.25H23c0.414,0,0.75-0.336,0.75-0.75s-0.336-0.75-0.75-0.75h-0.75c-0.138,0-0.25-0.112-0.25-0.25 v-3c0-0.828-0.672-1.5-1.5-1.5s-1.5,0.672-1.5,1.5v3c0,0.138-0.112,0.25-0.25,0.25H18c-0.414,0-0.75,0.336-0.75,0.75 s0.336,0.75,0.75,0.75h0.75c0.138,0,0.25,0.112,0.25,0.25v0.2c0,0.092,0.051,0.177,0.132,0.22L21.632,18.127z M23.033,19.792 c-0.759-0.561-1.581-1.031-2.45-1.4c-0.119-0.052-0.258-0.005-0.32,0.109l-1.181,1.667l-2.367,3.338 c-0.066,0.121-0.022,0.273,0.099,0.339c0.037,0.02,0.078,0.031,0.12,0.031H23.5c0.276,0,0.5-0.224,0.5-0.5V21.77 C24.007,20.995,23.648,20.263,23.033,19.792z M11.079,21.4l-3.527-3.968c-0.117-0.132-0.294-0.193-0.467-0.16 c-2.206,0.358-4.3,1.221-6.118,2.52C0.351,20.262-0.007,20.995,0,21.77v1.605c0,0.276,0.224,0.5,0.5,0.5h7.326 c0.073,0,0.142-0.032,0.19-0.087l3.066-2.06C11.162,21.633,11.161,21.493,11.079,21.4z M18.31,17.837 c-0.029-0.07-0.088-0.123-0.161-0.145c-0.244-0.069-0.5-0.136-0.76-0.2c-0.091-0.022-0.187,0.009-0.249,0.08l-0.633,0.586 l-5.731,5.305c-0.09,0.105-0.078,0.263,0.027,0.353c0.045,0.039,0.103,0.06,0.162,0.06h3.191c0.092,0,0.176-0.05,0.22-0.13 l3.068-4.452l0.855-1.24C18.335,17.987,18.339,17.907,18.31,17.837z M8.489,8.826C8.185,9.108,8.168,9.583,8.45,9.887 c0.282,0.304,0.757,0.321,1.061,0.039l0,0c0.173-0.097,0.384-0.097,0.557,0c0.304,0.282,0.779,0.265,1.061-0.039 c0.282-0.304,0.265-0.779-0.039-1.061C10.339,8.192,9.24,8.192,8.489,8.826z M13.421,10.125c0.19,0.001,0.372-0.071,0.511-0.2 c0.173-0.097,0.384-0.097,0.557,0c0.304,0.282,0.779,0.265,1.061-0.039c0.282-0.304,0.265-0.779-0.039-1.061 c-0.751-0.633-1.849-0.633-2.6,0c-0.304,0.282-0.322,0.756-0.04,1.06C13.013,10.038,13.213,10.125,13.421,10.125L13.421,10.125z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                    </span>
                </div>
                <div>
                    <strong> Legit Investment </strong>
                    <p class="m-0"> We Recommend Legit businesses for our members to Invest & Grow </p>
                </div>
            </div>
        </div>
        <div class="m-4 p-4">
            <h2 class="bold mb-1 text-center">Total Active Users </h2><br>
            <p class="lead text-muted text-center font-weight-bolder" style="font-family: 'Apple Color Emoji'; font-size: 60px">
                {{ number_format($userCounts) }}
            </p>
        </div>
        <h2 class="bold m-4 text-center p-4">Available Trainings </h2>
        <div class="container">
            <div class="row">
                @if($courses)
                    @foreach($courses as $course)
                        <div class="col-md-4">
                            <div class="card card__course" data-aos="fade-up" data-offset="-100">
                                <div class="card-header card-header-large card-header-dark bg-dark d-flex justify-content-center">
                                    <a class="card-header__title  justify-content-center align-self-center d-flex flex-column" href="{{ route('courses.show', $course->url_key) }}">
                                        <span><img src="{{ $course->photo }}" class="mb-1" style="width:50%;" alt="{{ $course->name }}"></span>
                                        {{--
                                                                            <span class="course__title"> {{ $course->name }} </span>
                                        --}}
                                        <span class="course__subtitle">{{ $course->name }} </span>
                                    </a>
                                </div>
                                <div class="p-3">
                                    <div class="mb-2">
                                        @if(isset($course->course_average_rating) )
                                            <span class="mr-2">
                                            @for($num = 1; $num <= 5; $num++)
                                                    @if($num <= $course->course_average_rating)
                                                        <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                                    @else
                                                        <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star_empty</i></a>
                                                    @endif
                                                @endfor
                                        </span>
                                            <strong>{{ $course->course_average_rating }} </strong><br />

                                            <small class="text-muted">({{ $course->total_reviews }} ratings)</small>
                                        @endif
                                    </div>
                                    <div class="d-flex align-items-center">
                                        @switch($course->type)
                                            @case('free')
                                            <strong class="h4 m-0">Free</strong>
                                            @break
                                            @case('pro_user_free')
                                            <strong class="h4 m-0">Free</strong>
                                            @break
                                            @case('pro_user_paid')
                                            <strong class="h4 m-0">${{ $course->price }}</strong>
                                            @break
                                            @default
                                            {{''}}
                                        @endswitch
                                        <a href="{{ route('courses.show', $course->url_key) }}" class="btn btn-primary ml-auto">view</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                @endif
            </div>
        </div>
        <div class="m-4 p-4">
            <h2 class="bold mb-1 text-center"> Our Blog Post</h2>
            <p class="lead text-muted text-center">
                <strong> Entrepreneurs sharing awesome ideas - check them out, learn and air your view in comment</strong>
            </p>
        </div>
        <div class="container">
            <div class="row">
                @if($blogPosts)
                    @foreach($blogPosts as $post)
                        <div class="col-md-4">
                            <div class="card card__course card__course__animate">
                                <div class="card-img-top">
                                    <a href="{{route('blog.posts.show', $post->url_key)}}" >
                                        <img src="{{ $post->photo }}" style="width:100%; max-height: 175px;" alt="{{ $post->title }}">
                                    </a>
                                </div>
                                <div class="p-3 text-center border-bottom">
                                    <div class="bold mb-2">
                                        <a href="{{route('blog.posts.show', $post->url_key)}}" class="text-body">
                                            <span class="course__title">{{ $post->title }}</span>
                                        </a>
                                    </div>
                                    <div class="d-flex justify-content-around">
                                        <div class="mb-2 text-muted d-flex align-items-center align-self-center ">
                                            <small class="mr-3 d-flex align-items-center">
                                                <i class="fa fa-user"></i> {{ $post->user->name }}
                                            </small>
                                            <small class="mr-3 d-flex align-items-center">
                                                <svg version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="18" height="18">
                                                    <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                                        <path d="M12.619,8.412c-0.001-0.41-0.333-0.742-0.743-0.742H5.938c-0.41,0.015-0.73,0.36-0.715,0.77 c0.014,0.389,0.326,0.701,0.715,0.715h5.938C12.286,9.155,12.619,8.822,12.619,8.412L12.619,8.412z M9.586,19 c-0.02-0.115-0.119-0.199-0.236-0.2H3.464c-0.276,0-0.5-0.224-0.5-0.5V5.443c0.003-0.274,0.226-0.495,0.5-0.495h10.887 c0.272,0.003,0.491,0.223,0.494,0.495v4.039c-0.002,0.135,0.106,0.245,0.241,0.247c0.018,0,0.037-0.002,0.054-0.005 c0.807-0.152,1.623-0.249,2.443-0.29c0.131-0.007,0.232-0.116,0.231-0.247V3.464c0.001-0.82-0.663-1.484-1.483-1.485 c0,0-0.001,0-0.001,0h-3.957c-0.085,0-0.163-0.046-0.205-0.119C11.103,0.059,8.78-0.537,6.979,0.528 C6.43,0.853,5.972,1.311,5.647,1.86c-0.042,0.073-0.12,0.118-0.205,0.119H1.485C0.665,1.979,0,2.644,0,3.464c0,0,0,0,0,0v16.825 c0.001,0.82,0.665,1.484,1.485,1.484h8.847c0.135,0,0.244-0.109,0.244-0.244c0-0.046-0.013-0.092-0.038-0.131 C10.091,20.657,9.769,19.846,9.586,19z M11.035,12.523c0.286-0.376,0.604-0.726,0.951-1.046c0.085-0.079,0.028-0.343-0.11-0.343 H5.938c-0.41,0.015-0.73,0.36-0.715,0.77c0.014,0.389,0.326,0.701,0.715,0.715h4.907C10.92,12.619,10.99,12.583,11.035,12.523z M5.938,14.6c-0.41,0-0.742,0.331-0.743,0.741c0,0.41,0.331,0.742,0.741,0.743c0,0,0.001,0,0.001,0h3.37 c0.117,0,0.216-0.085,0.235-0.2c0.061-0.337,0.145-0.669,0.251-0.995c0.032-0.1,0.055-0.29-0.129-0.29L5.938,14.6z M17.32,10.639 c-3.69-0.001-6.681,2.99-6.682,6.68s2.99,6.681,6.68,6.682c3.69,0.001,6.681-2.99,6.682-6.68c0,0,0-0.001,0-0.001 C23.996,13.632,21.008,10.643,17.32,10.639z M17.32,22.021c-2.596,0-4.7-2.104-4.7-4.7s2.104-4.7,4.7-4.7s4.7,2.104,4.7,4.7 C22.017,19.915,19.914,22.018,17.32,22.021z M19.3,16.33h-0.742c-0.137,0-0.248-0.111-0.248-0.248v-1.237 c-0.017-0.546-0.474-0.975-1.021-0.958c-0.522,0.017-0.941,0.436-0.958,0.958v2.475c0,0.546,0.443,0.989,0.989,0.989 c0,0,0.001,0,0.001,0H19.3c0.546,0.017,1.004-0.412,1.021-0.958s-0.412-1.004-0.958-1.021C19.342,16.329,19.321,16.329,19.3,16.33z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </g>
                                                </svg>
                                                <span class="ml-1"> {{ ($post->category) ? $post->category->name : 'Uncategorized' }} </span>
                                            </small>
                                            <small class="d-flex align-items-center">
                                                <svg version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="18" height="18">
                                                    <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                                        <path d="M19.159,8.257l1.548-1.549c0.397-0.384,0.408-1.017,0.025-1.414c-0.384-0.397-1.017-0.408-1.414-0.025 c-0.008,0.008-0.017,0.016-0.025,0.025l-1.6,1.6C16.324,5.867,14.702,5.231,13,5.054V2h2c0.552,0,1-0.448,1-1s-0.448-1-1-1H9 C8.448,0,8,0.448,8,1s0.448,1,1,1h2v3.054c-5.217,0.553-8.998,5.231-8.445,10.449s5.231,8.998,10.449,8.445 c5.217-0.553,8.998-5.231,8.445-10.449c-0.206-1.942-1.006-3.774-2.29-5.245V8.257z M12,22.5c-4.418,0-8-3.582-8-8s3.582-8,8-8 s8,3.582,8,8S16.418,22.5,12,22.5z M12,8c-3.59,0-6.5,2.91-6.5,6.5S8.41,21,12,21s6.5-2.91,6.5-6.5S15.59,8,12,8z M12.53,14.822 c-0.295,0.288-0.765,0.288-1.06,0l-2.042-2.04c-0.293-0.293-0.293-0.768,0-1.061s0.768-0.293,1.061,0l0,0l2.041,2.042 C12.802,14.052,12.785,14.518,12.53,14.822L12.53,14.822z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </g>
                                                </svg>
                                                <span class="ml-1">
                                                    {{ $post->created_at->format('d - m - y') }}
                                                </span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3 text-center">
                                    <p>
                                        {{ (strlen($post->summary) > 70) ? substr($post->summary, 0, 70)."<b> (&hellip;)</b>  <br> " : $post->summary }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="m-4 p-4">
            <h2 class="bold mb-1 text-center"> Our Members Testimonies </h2>
        </div>
        <div class="container">
            <div class="row">
                @if(!$testimonies->isEmpty())
                @foreach($testimonies as $testimony)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="px-4 py-3">
                                <div class="d-flex mb-1">
                                    <div class="flex">
                                        <div class="d-flex align-items-center mb-1">
                                            <strong class="text-15pt">{{ $testimony->user->name }}</strong>
                                            <small class="ml-2 text-muted">{{ $testimony->created_at->format('d M, Y') }}</small>
                                        </div>
                                        <div>
                                            <p>
                                                {{ $testimony->testimony }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="bg-soft-primary card-body mb-4">
            <div class="row p-4">
                <div class="col-md-6 offset-md-3">
                    <div class="mb-4">

                        <h4 class="text-center text-primary bold mb-1">Sign up and get news letters from us</h4>
                        <p class="text-center text-muted">No spam. Only releases, updates and discounts</p>
                    </div>
                    <div class="d-flex">

                        <form action="#" class="form-inline">
                            <input type="text" class="form-control" placeholder="Your email address">
                            <button class="btn btn-secondary ml-2" data-aos="flip-left" data-aos-duration="800" data-aos-delay="150">SUBSCRIBE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection



@section('footer-scripts')
    <script src="{{ asset('assets/unpkg.com/aos%402.3.1/dist/aos.js') }}"></script>
    <script>
        AOS.init();
    </script>
@endsection
