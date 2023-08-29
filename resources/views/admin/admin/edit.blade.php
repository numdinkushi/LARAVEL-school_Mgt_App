     <!-- Content Wrapper. Contains page content -->

     @extends('layouts.app')

     @section('content')
        <div class="content-wrapper">
           <section class="content mt-5">
              <div class="container-fluid">
                 <div class="row d-flex justify-content-center">
                    <div class="col-md-7">
                       <div class="card card-primary">
                          <div class="card-header">
                             <h3 class="card-titl text-center">Edit Admin</h3>
                          </div>
                          <form action="{{ route('admin.update', $getRecord->id) }}" method="post">
                             {{ csrf_field() }}
                             <div class="card-body">
                                <div class="form-group">
                                   <label>Name</label>
                                   <input type="text" class="form-control" name="name" value="{{ old('name', $getRecord->name) }}" placeholder="Name">
                                </div>
                                <div class="form-group">
                                   <label>Email</label>
                                   <input type="email" class="form-control" name="email" value="{{ old('email', $getRecord->email) }}" required placeholder="Enter email">
                                   <p class="text-danger">{{ $errors->first('email') }}</p>
                                </div>
                                <div class="form-group">
                                   <label>Password</label>
                                   <input type="password" class="form-control" name='password'
                                      placeholder="Password">
                                   <p class="text-sm text-muted">Enter a new password only if you wish to change
                                      it.</p>
                                </div>
                             </div>
                             <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                             </div>
                          </form>
                       </div>
                    </div>
                 </div>
              </div>
           </section>
        </div>
     @endsection
