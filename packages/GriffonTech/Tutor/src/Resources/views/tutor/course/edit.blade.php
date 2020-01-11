@extends("tutor::layout.master")


@section("content")
    <div class="container col-md-11">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Edit Course</h3>
                        <a href="{{ route('tutor.courses.index') }}" class="btn btn-dark float-right">Go Back</a>
                    </div>
                    <div class="card-body">
                        @if (isset($course))
                        <form action="{{ route('tutor.courses.edit', $course->url_key) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6" style="padding: 0px 20px">
                                    <div class="form-group">
                                        <label for="name" class="form-label-group">Course Name</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ (old('name')) ? old('name') : $course->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="course_category" class="form-label-group">Course Category</label>
                                        <select id="course_category" name="course_category_id" class="form-control">
                                            @foreach($categories as $id => $name )
                                                <option {{ (old('course_category_id') && old('course_category_id') == $id ) ? 'selected' :
                                                 ($course->course_category_id == $id) ? 'selected' : '' }}  value="{{ $id }}"> {{ $name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="summary" class="form-label-group">Summary </label>
                                        <textarea id="summary" name="summary" id="" cols="30" rows="3" class="form-control">{{ (old('summary')) ? old('summary') : $course->summary }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="##">Number of Users Per Batch</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">#</span>
                                            </div>
                                            <input type="number" disabled name="total_no_of_users_in_batch" value="{{ (old('total_no_of_users_in_batch')) ? old('total_no_of_users_in_batch') : $course->total_no_of_users_in_batch }}" class="form-control"
                                                   placeholder="Number of members" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Price</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input id="price" type="number" class="form-control" placeholder="Amount" value="{{ (old('price')) ? old('price') : $course->price }}" name="price" required>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-6" style="padding: 0px 20px">
                                    <div class="form-group">
                                        <label for="total_number_of_referrals_needed">Number of Referrals </label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i> </span>
                                            </div>
                                            <input id="total_number_of_referrals_needed" name="total_no_of_referrals_needed" value="{{ (old('total_no_of_referrals_needed')) ? old('total_no_of_referrals_needed') : $course->total_no_of_referrals_needed }}" type="number" class="form-control" placeholder="Number of Referrals" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="learning_url">Course Learning link(Url) </label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-link"></i> </span>
                                            </div>
                                            <input id="learning_url" type="text" class="form-control" value="{{ (old('learning_url')) ? old('learning_url') : $course->learning_url}}" name="learning_url" placeholder="course learning url" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="video_url" class="form-label-group">Video URL</label>
                                        <input type="url" id="video_url" name="video_url" value="{{ (old('video_url')) ? old('video_url') : $course->video_url }}" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="number_of_batch" class="form-label-group">Number of  Batches</label>
                                        <input type="number" id="number_of_batch" disabled name="number_of_batch" value="{{ (old('number_of_batch')) ? old('number_of_batch') : $course->number_of_batch }}" placeholder="Number of Batches" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="photo">Photo</label>

                                        <div class="custom-file">
                                            <input type="file" name="photo" value="{{ (old('photo')) ? old('photo') : $course->photo }}" class="custom-file-input">
                                            <label class="custom-file-label" for="customFile">Choose file </label>
                                        </div>
                                    </div>

                                </div>


                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="description" class="form-label-group">Description</label>
                                        <textarea id="description" name="description"  cols="30" rows="10" class="form-control">{{ ( old('description')) ?  old('description') : $course->description}}</textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-dark" value="Submit">
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>

@endsection