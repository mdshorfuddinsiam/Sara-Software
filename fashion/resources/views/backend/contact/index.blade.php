@extends('admin.layouts.admin-master')

@section('title')
   All Contacts
@endsection

@section('admin-css')
<link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Contacts</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                            <li class="breadcrumb-item active" aria-current="page">All Contacts</li>
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
              <h3 class="box-title">All Category List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @php
                            dd($categories)
                        @endphp --}}
                        @foreach($contacts as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ @$row->name }}</td>
                            <td>{{ @$row->email }}></i></td>
                            <td>{{ @$row->subject }}></i></td>
                            <td>{{ @$row->message }}></i></td>
                            <td>
                                <a href="{{ route('contact.delete', ['contact' => @$row->id]) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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