@extends("tutor::layout.master")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form action="{{ route('tutor.profile.edit') }}" method="POST">
                    <div class="row">
                        @csrf
                        <div class="col-sm-2">
                            <div class="card">
                                <img src="{{ asset('images/26238.png')}}" class="card-img" alt="">

                                <div class="card-footer text-center">
                                    <div class="custom-file">
                                        <input type="file" name="photo" class="custom-file-input">
                                        <label class="custom-file-label" for="customFile"></label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <div class="col-sm-10">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Personal Details</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2"> Title </label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <table class="table table-hover table-bordered table-striped">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>Field</th>
                                            <th>Value</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Title:</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"
                                                               placeholder="Eg.Social Media Marketer" name="title"
                                                               value="{{ (old('title')) ? old('title') : $tutor->title }}">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Phone:</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" placeholder="Phone"
                                                               name="phone"
                                                               value="{{ (old('phone')) ? old('phone') : $tutor->phone }}">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" placeholder="Email"
                                                               name="email"
                                                               value="{{ (old('email')) ? old('email') : $tutor->email }}">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Social Handles:</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control"
                                                               placeholder="Facebook link" name="facebook_url"
                                                               value="{{ (old('facebook_url')) ? old('facebook_url') : $tutor->facebook_url }}">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control"
                                                               placeholder="Website link" name="website_url"
                                                               value="{{ (old('website_url')) ? old('website_url') : $tutor->website_url }}">
                                                    </div>
                                                </div>
                                                <br>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control"
                                                               placeholder="LinkedIn link" name="linkedIn_url"
                                                               value="{{ (old('linkedIn_url')) ? old('linkedIn_url') : $tutor->linkedIn_url }}">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control"
                                                               placeholder="Youtube Channel" name="youtube_url"
                                                               value="{{ (old('youtube_url')) ? old('youtube_url') : $tutor->youtube_url }}">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Summary:</td>
                                            <td>
                                                <textarea name="description" id="" class="form-control"
                                                          rows="5">{{ (old('description')) ? old('description') : $tutor->description }}</textarea>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" class="btn btn-dark" value="Update">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
            </div>
        </div>
    </div>

@endsection
