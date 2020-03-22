@extends('admin::layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <a class="float-right" href="{{ route('admin.tutor_agreement_attributes.create') }}"> Add New Agreement Attribute </a>
                    <h5>Tutor Agreement Attribute </h5>
                </div>
                <div class="ibox-content table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Code</th>
                            <th>Admin Name</th>
                            <th> Type</th>
                            <th> Position</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($tutor_agreement_attributes)

                            @foreach($tutor_agreement_attributes as $attribute)
                                <tr>
                                    <td> {{ $attribute->code }} </td>
                                    <td> {{ $attribute->admin_name }}</td>
                                    <td> {{ $attribute->type }}</td>
                                    <td> {{ $attribute->position }}</td>
                                    <td>
                                        <a href="{{ route('admin.tutor_agreement_attributes.edit', $attribute->id) }}" >Edit</a> |
                                        <a
                                            onclick="event.preventDefault();
                                            var confirmed = confirm('Are you sure you want to delete this ?');
                                            if (confirmed) {
                                                document.getElementById({{$attribute->id}}).submit();
                                            }
                                            " class="text-danger">
                                            Delete
                                        </a>
                                        <form id="{{ $attribute->id }}" method="POST" action="{{ route('admin.tutor_agreement_attributes.delete', $attribute->id) }}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
