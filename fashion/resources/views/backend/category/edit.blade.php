@extends('admin.layouts.admin-master')

@section('title')
    Dashboard
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
                            <li class="breadcrumb-item active" aria-current="page">Category Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-12">
             <!-- Basic Forms -->
              <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Edit Category</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col">
                        <form action="{{ route('categories.update', ['category' => @$category->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                          <div class="row">
                            <div class="col-12">                        
                                <div class="form-group">
                                    <h5>Category Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_name" class="form-control" value="{{ @$category->category_name }}"> 
                                    </div>
                                    @error('category_name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <h5>Category Icon <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_icon" class="form-control" value="{{ @$category->category_icon }}"> 
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
                                            <option {{ @$category->status == '1' ? 'selected' : '' }} value="1">Active</option>
                                            <option {{ @$category->status == '0' ? 'selected' : '' }} value="0">In-active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-rounded btn-info">Update</button>
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
@endsection