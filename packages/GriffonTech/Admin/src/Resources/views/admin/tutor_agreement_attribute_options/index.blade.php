@extends('admin::layouts.master')

@section('title')
    {{ __('Tutor Agreement Attribute Options') }}
@stop


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <a class="float-right" href="{{ route('admin.tutor_agreement_attribute_options.create') }}"> Add New Agreement Attribute Options </a>
                    <h5>Tutor Agreement Attribute Options </h5>
                </div>
                <div class="ibox-content table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Admin Name</th>
                            <th> Sort Order </th>
                            <th> Tutor Agreement Attribute </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($tutor_agreement_attribute_options)

                            @foreach($tutor_agreement_attribute_options as $attribute)
                                <tr>
                                    <td> {{ $attribute->admin_name }}</td>
                                    <td> {{ $attribute->sort_order }}</td>
                                    <td> {{ $attribute->tutor_agreement_attribute->admin_name }}</td>
                                    <td>
                                        <a href="{{ route('admin.tutor_agreement_attribute_options.edit', $attribute->id) }}" >Edit</a> |
                                        <a
                                            onclick="event.preventDefault();
                                                var confirmed = confirm('Are you sure you want to delete this ?');
                                                if (confirmed) {
                                                document.getElementById({{$attribute->id}}).submit();
                                                }
                                                " class="text-danger">
                                            Delete
                                        </a>
                                        <form id="{{ $attribute->id }}" method="POST" action="{{ route('admin.tutor_agreement_attribute_options.delete', $attribute->id) }}">
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
