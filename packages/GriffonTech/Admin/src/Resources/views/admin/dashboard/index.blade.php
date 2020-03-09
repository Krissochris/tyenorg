@extends("admin::layouts.master")

@section("content")
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    {{--<div class="ibox-tools">
                        <span class="label label-success float-right">Monthly</span>
                    </div>--}}
                    <h5>Total Users</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ number_format($users_total) }}</h1>
                    {{--<div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                    <small>Total income</small>--}}
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    {{--<div class="ibox-tools">
                        <span class="label label-info float-right">Annual</span>
                    </div>--}}
                    <h5>Total Tutors </h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ number_format($tutors_total) }}</h1>
                   {{-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                    <small>New orders</small>--}}
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    {{--<div class="ibox-tools">
                        <span class="label label-primary float-right">Today</span>
                    </div>--}}
                    <h5>Total Courses</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ number_format($courses_total) }}</h1>
                    {{--<div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                    <small>New visits</small>--}}
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    {{--<div class="ibox-tools">
                        <span class="label label-danger float-right">Low value</span>
                    </div>--}}
                    <h5> Course Registrations </h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"> {{ isset($courseRegistrationCounts) ? number_format($courseRegistrationCounts) : '0' }}</h1>
                    {{--<div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                    <small>In first month</small>--}}
                </div>
            </div>
        </div>
    </div>
{{--
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Orders</h5>
                    <div class="ibox-tools">
                        <div class="btn-group">
                            <button type="button" class="btn btn-xs btn-white active">Today</button>
                            <button type="button" class="btn btn-xs btn-white">Monthly</button>
                            <button type="button" class="btn btn-xs btn-white">Annual</button>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <ul class="stat-list">
                                <li>
                                    <h2 class="no-margins">2,346</h2>
                                    <small>Total users in period</small>
                                    <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div>
                                    <div class="progress progress-mini">
                                        <div style="width: 48%;" class="progress-bar"></div>
                                    </div>
                                </li>
                                <li>
                                    <h2 class="no-margins ">4,422</h2>
                                    <small>Course Registrations in last month</small>
                                    <div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i>
                                    </div>
                                    <div class="progress progress-mini">
                                        <div style="width: 60%;" class="progress-bar"></div>
                                    </div>
                                </li>
                                <li>
                                    <h2 class="no-margins ">9,180</h2>
                                    <small>Monthly income from orders</small>
                                    <div class="stat-percent">22% <i class="fa fa-bolt text-navy"></i></div>
                                    <div class="progress progress-mini">
                                        <div style="width: 22%;" class="progress-bar"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
--}}
@endsection
