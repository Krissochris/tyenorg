@extends("admin::layouts.master")

@section("content")

    <div class="container col-sm-9">
        <div class="row">
           <div class="col-sm-12">
               <form action="">
                   <div class="card">
                       <div class="card-header">
                           <h3 class="float-left">Create User</h3>
                           <a href="{{route('admin.users.index')}}" class="btn btn-dark float-right">Go Back</a>
                       </div>
                       <div class="col-sm-12">
                           <div class="card-body">
                               <div class="form-group">
                                   <label for="name">Full Name</label>
                                   <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter Full Name" required>
                               </div>
                               <div class="form-group">
                                   <label for="username">Username</label>
                                   <input type="text" id="username" name="username" value="{{old('username')}}" placeholder="Enter Username" class="form-control" required>
                               </div>
                               <div class="form-group">
                                   <label for="email">Email</label>
                                   <input type="email" id="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email" required>
                               </div>
                               <div class="row">
                                   <div class="col-sm-6">
                                       <div class="form-group">
                                           <label for="password">Password</label>
                                           <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                       </div>
                                   </div>
                                   <div class="col-sm-6">
                                       <div class="form-group">
                                           <label for="confirm_password">Confirm Password</label>
                                           <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                                       </div>
                                   </div>
                               </div>
                               <div class="custom-file">
                                   <input type="file" class="custom-file-input">
                                   <label class="custom-file-label" for="customFile">Choose file</label>
                               </div>
                           </div>
                       </div>
                       <div class="card-footer">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary float-right" value="Create">
                            </div>
                       </div>
                   </div>
               </form>
               <hr>
           </div>
        </div>
    </div>

@endsection
