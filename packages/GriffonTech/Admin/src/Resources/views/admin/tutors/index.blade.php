@extends('admin::layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <a class="float-right btn btn-primary btn-sm" href="{{ route('admin.tutors.create') }}">Add New Tutor</a>
                    <h5> Tutors </h5>
                </div>
                <div class="ibox-content table-responsive">
                    <table id="data-table" class="table table-hover no-margins">
                        <thead>
                        <tr>
                            <th> Name </th>
                            <th>Title</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th> Wallet Balance </th>
                            <th>Total Courses </th>
                            <th> Status </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tutors as $tutor)
                            <tr>
                                <td> {{ $tutor->name }} </td>
                                <td> {{ $tutor->title }} </td>
                                <td> {{ $tutor->phone }} </td>
                                <td> {{ $tutor->email }} </td>
                                <td> ${{ number_format($tutor->amount_balance, 2) }} </td>
                                <td> {{ $tutor->courses->count() }} </td>
                                <td>
                                    {{ $tutor->getStatus() }}
                                </td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{route('admin.tutors.show', $tutor->id)}}"> View</a>
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.tutors.edit', $tutor->id)}}"> Edit </a>
                                    <a class="btn btn-danger btn-sm" href="{{route('admin.tutors.delete', $tutor->id)}}"> Delete </a>
{{--
                                    <a class="btn btn-danger btn-sm" href="#" onclick="event.preventDefault(); alert('This action is not active')"> Delete</a>
--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $tutors->links() }}

                </div>
            </div>
        </div>
    </div>

@endsection
