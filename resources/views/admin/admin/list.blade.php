     <!-- Content Wrapper. Contains page content -->

     @extends('layouts.app')

     @section('content')
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         {{-- <div class="col-sm-6">
                             <h1>Admin List</h1>
                         </div> --}}
                         <div class="col-sm-6 text-left">
                             <a href="{{ route('admin.add') }}" class="btn btn-primary">Add New Admin</a>
                         </div>
                         <div class="col-sm-6">
                             <ol class="breadcrumb float-sm-right">
                                 <li class="breadcrumb-item"><a href="#">Home</a></li>
                                 <li class="breadcrumb-item active">Simple Tables</li>
                             </ol>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">
                     <div class="row">
                         <!-- /.col -->
                         <div class="col-md-12">
                            @include('_message')
                             <div class="card">
                                 <div class="card-header">
                                     <h3 class="text-center">Admin List</h3>
                                 </div>
                                 <!-- /.card-header -->
                                 <div class="card-body p-0">
                                     <table class="table table-striped">
                                         <thead>
                                             <tr>
                                                 <th >#</th>
                                                 <th>Name</th>
                                                 <th>Email</th>
                                                 <th >Created Date</th>
                                                 <th >Actions</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                            @foreach ($getRecord as $record)
                                                <tr>
                                                    <td>{{$record->id}}</td>
                                                    <td>{{$record->name}}</td>
                                                    <td>{{$record->email}}</td>
                                                    <td>{{$record->created_at}}</td>
                                                    <td class="">
                                                        <a href="{{url("admin/admin/edit/$record->id")}}" class="btn btn-success">Edit</a>
                                                        <a href="{{route('admin.delete', $record->id)}}" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                         </tbody>
                                     </table>
                                 </div>
                                 <!-- /.card-body -->
                             </div>
                             <!-- /.card -->
                         </div>
                         <!-- /.col -->
                     </div>

                 </div><!-- /.container-fluid -->
             </section>
             <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
     @endsection
