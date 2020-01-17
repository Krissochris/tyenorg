@extends("tutor::layout.master")


@section("content")

    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Reviews </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th>User</th>
                                <th>Review</th>
                                <th>Rating</th>
                                <th>Course</th>
                                <th>Course Batch</th>
                                <th>Created</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reviews as $review)
                                <tr>
                                   <td> {{ $review->user->name }} </td>
                                   <td> {{ $review->review }} </td>
                                   <td> {{ $review->rating }} </td>
                                   <td> {{ $review->course->name }} </td>
                                   <td> {{ $review->course_batch->id }} </td>
                                   <td> {{ $review->created_at }} </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection