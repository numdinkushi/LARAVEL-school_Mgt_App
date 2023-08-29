@extends('layouts.app')

@section('content')
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-6 text-left">
                  <a href="{{ route('admin.class.add') }}" class="btn btn-primary">Add New Class</a>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item active">Simple Tables</li>
                  </ol>
               </div>
            </div>
         </div>
      </section>

      <!-- Main content -->
      <section class="content">
         <div class="container-fluid">
            <div class="card card-primary">
               <div class="card-header">
                  <h2 class="card-titl text-center">Class List</h2>
               </div>
               <form action="" method="get">
                  <div class="card-body">
                     <div class="row">
                        <div class="form-group col-md-3">
                           <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}" placeholder="Enter name">
                        </div>
                        <div class="form-group col-md-3">
                           <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}" placeholder="Date">
                        </div>
                        <div class="form-group col-md-3">
                           <button class="btn btn-primary" type="submit"><span class="fas fa-search"></span> Search </button>
                           <a href="{{ route('admin.class-list') }}" class="btn btn-primary" type="submit">Reset</a>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            <div class="row">
               <div class="col-md-12">
                  @include('_message')
                  <div class="card">
                     <div class="card-header">
                        <div class="d-flex justify-content-between">
                           {{-- <h3>Total: {{ $getRecord->total() }}</h3> --}}
                        </div>
                     </div>
                     <div class="card-body table-responsive p-0">
                        <table class="table table-striped ">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Name</th>
                                 <th>Status</th>
                                 <th>Created By</th>
                                 <th>Created Date</th>
                                 <th>Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($classRecord as $class)
                                 <tr>
                                    <td>{{ $class->id }}</td>
                                    <td>{{ $class->name }}</td>
                                    <td>
                                       @if ($class->status == 0)
                                          Active
                                       @else
                                          Inactive
                                       @endif
                                    </td>
                                    <td>{{ $class->created_by }}</td>
                                    <td>{{ date('d-m-Y H:i A', strtotime($class->created_at)) }}</td>
                                    <td class="d-flex">
                                       <a href="{{ url("admin/class/edit/$class->id") }}" class="btn btn-success">Edit</a>
                                       <a href="{{ url('admin/class/delete', $class->id) }}" class="btn btn-danger ml-2">Delete</a>
                                    </td>
                                 </tr>
                              @endforeach
                           </tbody>
                        </table>
                        <div class="d-flex mt-4 w-full justify-content-end">
                           {!! $classRecord->links() !!}
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
@endsection
