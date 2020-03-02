@extends('admin::layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Tutors </h5>
                </div>
                <div class="ibox-content table-responsive">
                    <table class="table table-hover no-margins">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th> Name </th>
                            <th>Title</th>
                            <th> Status </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tutors as $tutor)
                            <tr>
                                <td> {{ $tutor->id }}</td>
                                <td> {{ $tutor->name }} </td>
                                <td> {{ $tutor->title }} </td>
                                <td> {{ $tutor->status }} </td>
                                <td>
                                    <a href="{{route('admin.tutors.show', $tutor->id)}}"> View</a>
                                    <a href="{{route('admin.tutors.edit', $tutor->id)}}"> Edit </a>
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
