@extends("tutor::layout.master")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form action="{{ route('tutor.profile.edit') }}" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        <div class="col-sm-2">
                            <div class="form-group">
                                <div class="fileinput fileinput-new" data-provides="fileinput"><input type="hidden" value="" name="...">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; line-height: 150px;">
                                        @if($tutor->photo) <img src="{{ $tutor->photo }}" alt="{{ $tutor->name }}"> @endif
                                    </div>
                                    <div>
                                    <span class="btn btn-default btn-file">
                                    <span class="fileinput-new">Load Image</span>
                                        <span class="fileinput-exists">Change</span>
                                        {!! Form::file('photo') !!}
                                    </span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            </div>
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
                                            <input type="text" class="form-control"
                                                   placeholder="Eg. Social Media Marketer" name="title"
                                                   value="{{ (old('title')) ? old('title') : $tutor->title }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2"> Phone </label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" placeholder="Phone"
                                                   name="phone"
                                                   value="{{ (old('phone')) ? old('phone') : $tutor->phone }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2"> Email </label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" placeholder="Email"
                                                   name="email"
                                                   value="{{ (old('email')) ? old('email') : $tutor->email }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2"> Social Handles: </label>
                                        <div class="col-sm-7">
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
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2"> Summary </label>
                                        <div class="col-sm-7">
                                            <textarea name="description" id="" class="form-control"
                                                      rows="5">{{ (old('description')) ? old('description') : $tutor->description }}</textarea>
                                        </div>
                                    </div>
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
