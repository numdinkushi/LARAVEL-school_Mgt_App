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
                                     <h3 class="card-titl text-center">Edit Class</h3>
                                 </div>
                                 <form action="{{ route('admin.class.update', $singleClass->id) }}" method="post">
                                     {{ csrf_field() }}
                                     <div class="card-body">
                                         <div class="form-group">
                                             <label>Class Name</label>
                                             <input type="text" class="form-control" value="{{ $singleClass->name}}" name="name" value="" placeholder="Class Name">
                                         </div>
                                         <div class="form-group">
                                             <label>Status</label>
                                             <select class="form-control" name="status" id="">
                                                <option {{ $singleClass->status == 0 ? 'selected' : '' }} value="0">Active</option>
                                                <option {{ $singleClass->status == 1 ? 'selected' : '' }} value="1">Inactive</option>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="card-footer">
                                         <button type="submit" class="btn btn-primary">Update </button>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>
         </div>
     @endsection
