@extends("admin::layouts.master")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class=" float-right mb-3">
                    <a href="{{route('admin.courses.create')}}" class="btn btn-dark"> Add Course </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" {{--id="dataTable"--}} width="100%" cellspacing="0">
                        <thead class="thead-dark">
                        <tr>
                            <th>S/N</th>
                            <th> Name </th>
                            <th>Teacher </th>
                            <th> Type </th>
                            <th> Image</th>
                            <th>Created On</th>
                            <th>Last Modified On
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td> {{ $course->id }}</td>
                                <td> {{ $course->name }} </td>
                                <td> {{ $course->tutor->name }} </td>
                                <td> {{ $course->type }} </td>
                                <td><img src="{{ $course->photo }}" alt="course image" width="70" height="70"> </td>
                                <td> {{ $course->created_at }} </td>
                                <td> {{ $course->updated_at }} </td>
                                <td>
                                    <a href="{{route('admin.courses.show', $course->id)}}">view</a>&nbsp;&nbsp;
                                    <a href="{{route('admin.courses.edit', $course->id)}}"> edit </a>&nbsp;&nbsp;
                                    <a href="#"
                                       onclick="event.preventDefault();
                                               var response = confirm('Are you sure you want to delete this course ?');
                                               if (response) {
                                               document.getElementById('{{ $course->id }}').submit(); }"
                                            ><i class="fa fa-trash text-danger grow" title="delete"></i>
                                    </a>
                                    <form id="{{ $course['id'] }}" action="{{ route('admin.courses.delete', $course['id']) }}" method="POST" style="display: none;">
                                        <input type="hidden" name="_method" value="delete">
                                        @csrf
                                    </form>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    {{ $courses->links() }}

                </div>
            </div>
        </div>

    </div>

@endsection
