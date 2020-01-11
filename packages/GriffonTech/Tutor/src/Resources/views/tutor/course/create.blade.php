@extends("tutor::layout.master")


@section("content")

    <div class="container col-md-11">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">Add Course</h3>
                        <a href="{{ route('tutor.courses.index') }}" class="btn btn-dark float-right">Go Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tutor.courses.create') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6" style="padding: 0px 20px">
                                    <div class="form-group">
                                        <label for="name" class="form-label-group">Course Name</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="course_category" class="form-label-group">Course Category</label>
                                        <select id="course_category" name="course_category_id" class="form-control">
                                            @foreach($categories as $id => $name )
                                                <option value="{{ $id }}"> {{ $name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="summary" class="form-label-group">Summary </label>
                                        <textarea id="summary" name="summary" id="" cols="30" rows="3" class="form-control">{{ old('summary') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="##">Number of Users Per Batch</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">#</span>
                                            </div>
                                            <input type="number" name="total_no_of_users_in_batch" value="{{ old('total_no_of_users_in_batch') }}" class="form-control"
                                                   placeholder="Number of members" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Price</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input id="price" type="number" class="form-control" placeholder="Amount" value="{{ old('price') }}" name="price" required>
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
                                            <input id="total_number_of_referrals_needed" name="total_no_of_referrals_needed" value="{{ old('total_no_of_referrals_needed') }}" type="number" class="form-control" placeholder="Number of Referrals" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="learning_url">Course Learning link(Url) </label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-link"></i> </span>
                                            </div>
                                            <input id="learning_url" type="text" class="form-control" value="{{ old('learning_url') }}" name="learning_url" placeholder="course learning url" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="video_url" class="form-label-group">Video URL</label>
                                        <input type="url" id="video_url" name="video_url" value="{{ old('video_url') }}" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="number_of_batch" class="form-label-group">Number of  Batches</label>
                                        <input type="number" id="number_of_batch" name="number_of_batch" value="{{ old('number_of_batch') }}" placeholder="Number of Batches" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="photo">Photo</label>

                                        <div class="custom-file">
                                            <input type="file" name="photo" value="{{ old('photo') }}" class="custom-file-input">
                                            <label class="custom-file-label" for="customFile">Choose file </label>
                                        </div>
                                    </div>

                                </div>


                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="description" class="form-label-group">Description</label>
                                        <textarea id="description" name="description" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
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
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>

@endsection