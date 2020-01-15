@extends("admin::layouts.master")

@section("content")

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i> Reviews
            <div class=" float-right">
                <a href="{{route('admin.reviews.create')}}" class="btn btn-dark"><i class="fa fa-plus-square"></i> Add Review</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                    <tr>
                        <th>User</th>
                        <th>Review</th>
                        <th> Course </th>
                        <th> Course Batch</th>
                        <th>Rating</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($reviews as $review)
                        <tr>
                            <td> {{ $review->user->name }}</td>
                            <td> {{ $review->review }}</td>
                            <td> {{ $review->course->name }}</td>
                            <td> {{ $review->course_batch->id }}</td>
                            <td> {{ $review->rating }}</td>
                            <td>
                                <a href="{{route('admin.reviews.edit', $review->id)}}"><i class="fa fa-edit" title="edit"></i></a>&nbsp;&nbsp;
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
