@extends("admin::layouts.master")

@section("content")

    <div class="container col-sm-12">
        <div class="row">
           <div class="col-sm-12">
                   <div class="card">
                       <div class="card-header">
                           <h3 class="float-left">Create User</h3>
                           <a href="{{route('admin.users.index')}}" class="btn btn-dark float-right">Go Back</a>
                       </div>

                       <div class="card-body">
                           {!! Form::open(['route' => 'admin.users.create']) !!}
                           <div class="row">
                               <div class="col-sm-6">
                                   <div class="form-group">
                                       <label for="name">Full Name</label>
                                       {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                   </div>
                               </div>
                               <div class="col-sm-6">
                                   <div class="form-group">
                                       <label for="email">Email</label>
                                       {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                   </div>
                               </div>
                           </div>

                           <div class="row">
                               <div class="col-sm-6">
                                   <div class="form-group">
                                       <label for="username"> Username </label>
                                       {!! Form::text('username', null, ['class' => 'form-control']) !!}
                                   </div>
                               </div>
                               <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Phone Number </label>
                                        {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
                                    </div>
                               </div>
                           </div>

                           <div class="row">
                               <div class="col-sm-6">
                                   <div class="form-group">
                                       <label for="password">Password</label>
                                       {!! Form::password('password', ['class' => 'form-control']) !!}
                                   </div>
                               </div>

                               <div class="col-sm-6">
                                   <label for="password_confirmation">Confirm Password</label>
                                   {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                               </div>
                           </div>

                           <div class="form-group">
                               <input type="hidden" name="is_pro_user" value="0">
                               <label for="is_pro_user">Is pro user
                                   <input id="is_pro_user" type="checkbox" name="is_pro_user" value="1">
                               </label>
                           </div>

                           <div class="form-group">
                               <input type="hidden" name="is_verified" value="0">
                               <label for="is_verified">Is verified
                                   <input id="is_verified" type="checkbox" name="is_verified" value="1">
                               </label>
                           </div>

                           <div class="row">
                               <div class="col-sm-6">
                                   <div class="form-group">
                                       <label for="status"> Status </label>
                                       {!! Form::select('status', [1 => 'Active', 0 => 'UnActive'], null, ['class' => 'form-control']) !!}
                                   </div>
                               </div>
                           </div>
                           <div class="form-group">
                               <input type="submit" class="btn btn-primary" value="Create">
                           </div>
                           {!! Form::close() !!}
                       </div>

                       <div class="card-footer">

                       </div>
                   </div>
               <hr>
           </div>
        </div>
    </div>

@endsection
