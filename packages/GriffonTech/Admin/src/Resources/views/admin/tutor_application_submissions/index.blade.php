@extends('admin::layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>New Tutor Applications</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content table-responsive">
                    <table class="table table-hover no-margins">
                        <thead>
                        <tr>
                            <th>Date Submitted <i class="fa fa-clock-o"></i></th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tutorApplicationSubmissions as $application)
                            <tr>
                                <td> {{ $application->created_at }} </td>
                                <td> {{ $application->tutor_application->name }}</td>
                                <td> {{ $application->tutor_application->title }}</td>
                                <td class="text-navy">
                                    <a href="{{ route('admin.tutor_application_submissions.show', $application->id) }}">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
