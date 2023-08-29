     <!-- Content Wrapper. Contains page content -->

     @extends('layouts.app')

     @section('content')
     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    
        <!-- Main content -->
        <section class="content mt-5">
          <div class="container-fluid">
            <div class="row d-flex justify-content-center">
              <!-- left column -->
              <div class="col-md-7">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-titl text-center">Add New Admin</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ route('admin.store')}}" method="post">
                    {{ csrf_field() }}
                    <div class="card-body">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required placeholder="Enter email">
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name='password' required placeholder="Password">
                      </div>

                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->
    
                <!-- general form elements -->
              
                <!-- /.card -->
              </div>
              <!--/.col (right) -->
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
     @endsection
