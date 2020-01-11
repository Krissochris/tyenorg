@extends("admin::layouts.master")

@section("content")

    <div class="container">
        <form action="">
            <div class="col-sm-11">
                <div class="card">
                    <div class="card-header">
                        <h4 class="float-left">Create Blog</h4>
                        <a href="{{route('admin.blogs.index')}}" class="btn btn-dark float-right">Go Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug')}}" title="This field is used to index your blog" placeholder="Blog Slug" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="customFile">Blog Image</label>
                                <div class="custom-file">
                                    <input type="file" name="photo" class="custom-file-input">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" placeholder="Title" required>
                        </div>
                        <div class="form-group">
                            <label for="body">Blog body</label>
                            <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{old('body')}}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-dark" name="submit" value="Create Blog">
                    </div>
                </div>
            </div>
        </form>
        <hr>
    </div>

@endsection
