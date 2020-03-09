@extends("admin::layouts.master")

@section("content")
    <div class="ibox">
        <div class="ibox-title">
            <h5> Create Review </h5>
        </div>
        <div class="ibox-content">
            {!! Form::open(['route' => 'admin.reviews.create']) !!}
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="slug"> User </label>
                    {!! Form::select('user_id', $users, null, ['class'=> 'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    <label for="status"> Status </label>
                    {!! Form::select('status', [ 1 => 'published', 0 => 'UnPublished'], null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="slug"> Course </label>
                    {!! Form::select('course_id', $courses, null, ['class'=> 'form-control', 'id' => 'course_id']) !!}
                </div>

                <div class="col-sm-6">
                    <label for="course_batch"> Course Batch </label>
                    {!! Form::select('course_batch_id', [], null, ['class' => 'form-control', 'id' => 'course_batch_id']) !!}
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
                <input type="submit" class="btn btn-dark" name="submit" value="Create Review">
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('footer-scripts')
    <script>
        $("#course_id").change(function(event){
            var course_id = event.target.value;

            $("#course_batch_id").load("<?= request()->getSchemeAndHttpHost()?>/admin/reviews/get_course_batches/" + course_id);
        })
    </script>
@endsection
