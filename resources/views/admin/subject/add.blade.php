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
                                     <h3 class="card-titl text-center">Add New Subject</h3>
                                 </div>
                                 <form action="{{ route('admin.subject.store') }}" method="post">
                                     {{ csrf_field() }}
                                     <div class="card-body">
                                         <div class="form-group">
                                             <label>Subject Name</label>
                                             <input type="text" class="form-control" name="name" value="" placeholder="Subject Name">
                                             <p class="text-danger">{{ $errors->first('name') }}</p>
                                         </div>
                                         <div class="form-group">
                                             <label>Subject Type</label>
                                             <select class="form-control" name="type" id="">
                                                <option value="Theory">Theory</option>
                                                <option value="Practical">Practical</option>
                                             </select>
                                             <p class="text-danger">{{ $errors->first('type') }}</p>
                                         </div>
                                         <div class="form-group">
                                             <label>Status</label>
                                             <select class="form-control" name="status" id="">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                             </select>
                                             <p class="text-danger">{{ $errors->first('status') }}</p>
                                         </div>
                                     </div>
                                     <div class="card-footer">
                                         <button type="submit" class="btn btn-primary">Submit</button>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>
         </div>
     @endsection
