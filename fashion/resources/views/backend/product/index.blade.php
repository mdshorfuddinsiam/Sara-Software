@extends('admin.layouts.admin-master')

@section('title')
    All Product
@endsection

@section('admin-css')
<link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Products</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                            <li class="breadcrumb-item active" aria-current="page">All Products</li>
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
         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">All Product List</h3>
              <a href="{{ route('products.create') }}" class="btn btn-primary float-right">Add New Product</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Image</th>
                            <th>Category Name</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @php
                            dd($categories)
                        @endphp --}}
                        @foreach($products as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset(@$row->thambnail) }}" width="50" alt="">
                            </td>
                            <td>{{ @$row->category->category_name }}</td>
                            <td>{{ @$row->name }}</td>
                            <td>{{ @$row->qty }}</td>
                            <td>
                                @if($row->status == 1)
                                    <span class="badge badge-pill badge-success">active</span>
                                @else
                                    <span class="badge badge-pill badge-danger">in-active</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('products.edit', ['product' => @$row->id]) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('product.delete', ['product' => @$row->id]) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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