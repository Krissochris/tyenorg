@extends("admin::layouts.master")

@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5> Courses Batches</h5>
                </div>
                <div class="ibox-content table-responsive">
                    <div class=" float-right mb-3">
                        <a href="{{route('admin.course_batches.create')}}" class="btn btn-dark"> Add Course Batch </a>
                    </div>

                    <table class="table table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th>S/N</th>
                            <th> Course Name </th>
                            <th>Teacher name </th>
                            <th> No of Users </th>
                            <th> Maximum no of users</th>
                            <th> Entry Status </th>
                            <th> Is Taken </th>
                            <th> Time Completed </th>
                            <th> Status </th>
                            <th> Created At </th>
                            <th>Last Modified On </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($course_batches as $course_batch)
                            <tr>
                                <td> {{ $course_batch->id }}</td>
                                <td> {{ $course_batch->course->name }} </td>
                                <td> {{ $course_batch->tutor->name }} </td>
                                <td> {{ $course_batch->no_of_users }} </td>
                                <td> {{ $course_batch->maximum_number_of_users }} </td>
                                <td> {{ ($course_batch->entry_status) ? 'Yes' : 'No' }} </td>
                                <td> {{ ($course_batch->is_taken) ? 'Yes' : 'No' }} </td>
                                <td> {{ $course_batch->time_completed }} </td>
                                <td> {{ $course_batch->status }} </td>
                                <td> {{ $course_batch->created_at }} </td>
                                <td> {{ $course_batch->updated_at }} </td>
                                <td>
                                    <a href="{{route('admin.course_batches.show', $course_batch->id)}}">view</a>&nbsp;&nbsp;
                                    <a href="{{route('admin.course_batches.edit', $course_batch->id)}}"> edit </a>&nbsp;&nbsp;
                                    <a href="#"
                                       onclick="event.preventDefault();
                                           var response = confirm('Are you sure you want to delete this course batch ?');
                                           if (response) {
                                           document.getElementById('{{ $course_batch->id }}').submit(); }"
                                    ><i class="fa fa-trash text-danger grow" title="delete"></i>
                                    </a>
                                    <form id="{{ $course_batch['id'] }}" action="{{ route('admin.course_batches.delete', $course_batch['id']) }}" method="POST" style="display: none;">
                                        <input type="hidden" name="_method" value="delete">
                                        @csrf
                                    </form>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

{{--
                    {{ $course_batches->links() }}
--}}

                </div>
            </div>
        </div>
    </div>

@endsection
