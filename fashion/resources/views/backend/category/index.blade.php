@extends('admin.layouts.admin-master')

@section('title')
    Dashboard
@endsection

@section('admin-css')
<link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Categories</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                            <li class="breadcrumb-item active" aria-current="page">All Categories</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-8">
         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">All Category List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Category Name</th>
                            <th>Category Icon</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @php
                            dd($categories)
                        @endphp --}}
                        @foreach($categories as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ @$row->category_name }}</td>
                            <td><i class="{{ @$row->category_icon }}"></i></td>
                            <td>
                                @if($row->status == 1)
                                    <span class="badge badge-pill badge-success">active</span>
                                @else
                                    <span class="badge badge-pill badge-danger">in-active</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('categories.edit', ['category' => @$row->id]) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('category.delete', ['category' => @$row->id]) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    {{-- <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot> --}}
                  </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class="col-4">
             <!-- Basic Forms -->
              <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Add Category</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col">
                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf
                          <div class="row">
                            <div class="col-12">                        
                                <div class="form-group">
                                    <h5>Category Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_name" class="form-control"> 
                                    </div>
                                    @error('category_name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <h5>Category Icon <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_icon" class="form-control"> 
                                    </div>
                                    @error('category_icon')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <h5>Select Status <span class="text-danger"></span></h5>
                                    <div class="controls">
                                        <select name="status" id="status" class="form-control" aria-invalid="false">
                                            <option selected hidden disabled>Select One</option>
                                            <option value="1">Active</option>
                                            <option value="0">In-active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                                </div>
                            </div>
                          </div>
                        </form>

                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
        </div>

      </div>  
    </section>    
    <!-- End Main content -->

@endsection

@section('admin-js')
<script src="{{ asset('') }}assets/vendor_components/datatable/datatables.min.js"></script>
<script src="{{ asset('backend') }}/js/pages/data-table.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<script>
    // $(document).ready(function(){
    //  $('#delete').click(function(e){
    $(function(){
        $(document).on('click', '#delete', function(e){
            e.preventDefault();
            var link = $(this).attr('href');

            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
              }
            });

        });
    });
</script>
@endsection