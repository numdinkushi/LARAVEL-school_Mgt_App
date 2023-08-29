@extends('layouts.app')

@section('content')
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-6 text-left">
                  <a href="{{ route('admin.subject.add') }}" class="btn btn-primary">Add New Subject</a>
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
                  <h2 class="card-titl text-center">Subject List</h2>
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
                           <a href="{{ route('admin.subject-list') }}" class="btn btn-primary" type="submit">Reset</a>
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
                                 <th>Type</th>
                                 <th>Status</th>
                                 <th>Created By</th>
                                 <th>Created Date</th>
                                 <th>Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($subjectRecord as $subject)
                                 <tr>
                                    <td>{{ $subject->id }}</td>
                                    <td>{{ $subject->name }}</td>
                                    <td>{{ $subject->type }}</td>
                                    <td>
                                       @if ($subject->status == 1)
                                          Active
                                       @else
                                          Inactive
                                       @endif
                                    </td>
                                    <td>{{ $subject->created_by }}</td>
                                    <td>{{ date('d-m-Y H:i A', strtotime($subject->created_at)) }}</td>
                                    <td class="d-flex">
                                       <a href="{{ url("admin/subject/edit/$subject->id") }}" class="btn btn-success">Edit</a>
                                       <a href="{{ url('admin/subject/delete', $subject->id) }}" class="btn btn-danger ml-2">Delete</a>
                                    </td>
                                 </tr>
                              @endforeach
                           </tbody>
                        </table>
                        <div class="d-flex mt-4 w-full justify-content-end">
                           {!! $subjectRecord->links() !!}
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
@endsection
