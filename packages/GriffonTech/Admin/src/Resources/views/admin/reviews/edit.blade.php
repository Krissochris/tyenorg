@extends("admin::layouts.master")

@section("content")

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="float-left">Edit Review</h4>
                        <a href="{{route('admin.reviews.index')}}" class="btn btn-dark float-right">Go Back</a>
                    </div>
                    <div class="card-body">
                        {!! Form::model($review, ['route' => ['admin.reviews.edit', $review->id]]) !!}
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="user_id"> User </label>
                                <select id="user_id" name="user_id" class="form-control">
                                    <option value="{{ $review->user->id }}"> {{ $review->user->name }} </option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="status"> Status </label>
                                {!! Form::select('status', [ 1 => 'published', 0 => 'UnPublished'], null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="course_id"> Course </label>
                                <select id="course_id" name="course_id" class="form-control">
                                    <option value="{{ $review->course->id }}"> {{ $review->course->name }} </option>
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <label for="course_batch_id"> Course Batch </label>
                                <select id="course_batch_id" name="course_batch_id" class="form-control">
                                    <option value="{{ $review->course_batch->id }}"> {{ $review->course_batch->id }} </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rating">Rating</label>
                            {!! Form::number('rating', null,['class' => 'form-control', 'min' => 1, 'max'=> 5]) !!}
                        </div>

                        <div class="form-group">
                            <label for="review">Review </label>
                            {!! Form::textarea('review', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-dark" name="submit" value="Update Review">
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>

    <script>
        $("#course_id").change(function(event){
            var course_id = event.target.value;

            $("#course_batch_id").load("<?= request()->getSchemeAndHttpHost()?>/admin/reviews/get_course_batches/" + course_id);
        })
    </script>
@endsection
