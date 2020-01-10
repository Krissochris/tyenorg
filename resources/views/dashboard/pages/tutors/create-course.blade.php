@extends('dashboard.layouts.header')
@section('content')
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('tutor-courses')}}" style="text-decoration: none">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Add Course</li>
            </ol>
            <div class="container col-md-11">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="float-left">Add Course</h3>
                                <a href="{{route('tutor-courses')}}"><button class="btn btn-dark float-right">Go Back</button></a>
                            </div>
                            <form action="" class="col-md-12">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6" style="padding: 0px 20px">
                                            <div class="form-group">
                                                <label for="title" class="form-label-group">Course title</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="category" class="form-label-group">Course Category</label>
                                                <select name="category" id="" class="form-control">
                                                    <option value="#1">Web Development</option>
                                                    <option value="#2">Graphic Designs</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="description" class="form-label-group">Short Description</label>
                                                <textarea name="description" id="" cols="30" rows="3" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="##">Number of members per Batch</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">#</span>
                                                    </div>
                                                    <input type="number" name="##" class="form-control" placeholder="Number of members" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                    <input type="number" class="form-control" placeholder="Amount" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="padding: 0px 20px">
                                            <div class="form-group">
                                                <label for="video_url" class="form-label-group">Video URL</label>
                                                <input type="url" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="photo">Photo</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="details" class="form-label-group">Course Details</label>
                                                <textarea name="details" id="" cols="30" rows="10" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="submit" class="btn btn-dark" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
            </div>

        </div>
@endsection
