@extends('admin.layouts.admin-master')

@section('title')
    Product Edit
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
             <!-- Basic Forms -->
              <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Edit Product</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col">
                        <form action="{{ route('products.update', ['product' => @$product->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                          <div class="row">
                            <div class="col-12">    

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Category Select <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="category_id" id="category_id" required="" class="form-control select2" style="width: 100%;">
                                                    <option value="" hidden selected disabled>Select Category</option>
                                                    @forelse($categories as $row)
                                                        <option {{ @$row->id == $product->category_id ? 'selected' : '' }} value="{{ @$row->id }}" >{{ @$row->category_name }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                    </div> {{-- end col-6 --}}
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Name<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" value="{{ @$product->name }}" required=""> </div>
                                        </div>
                                    </div> {{-- end col-6 --}}
                                </div>  {{-- end row 1st --}}

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Code <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="code" class="form-control" value="{{ @$product->code }}" required=""> </div>
                                        </div>
                                    </div> {{-- end col-6 --}}
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Quantity <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="number" min="0" name="qty" class="form-control" value="{{ @$product->qty }}" required=""> </div>
                                        </div>
                                    </div> {{-- end col-6 --}}
                                </div>  {{-- end row 2nd --}}

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Size</h5>
                                            <div class="controls">
                                                <input type="text" name="size" value="Large,Medium,Small" data-role="tagsinput" placeholder="add tags" value="{{ @$product->size }}" required="" /> 
                                            </div>
                                        </div>
                                    </div> {{-- end col-6 --}}
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Color<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="color" value="Red,Green,Blue" data-role="tagsinput" placeholder="add tags" value="{{ @$product->color }}" required="" /> 
                                            </div>
                                        </div>
                                    </div> {{-- end col-6 --}}
                                </div>  {{-- end row 3rd --}}

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Selling Price <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="number" min="0" name="selling_price" class="form-control" value="{{ @$product->selling_price }}" required=""> 
                                            </div>
                                        </div>
                                    </div> {{-- end col-6 --}}
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Discount Price </h5>
                                            <div class="controls">
                                                <input type="number" name="discount_price" class="form-control" value="{{ @$product->discount_price }}" > 
                                            </div>
                                        </div>
                                    </div> {{-- end col-6 --}}
                                </div>  {{-- end row 4th --}}

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Short Description<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="short_descp" id="short_descp" class="form-control" required="" >{{ @$product->short_descp }}</textarea>
                                            </div>
                                        </div>
                                    </div> {{-- end col-12 --}}
                                </div>  {{-- end row 6th --}}

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Long Description<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="long_descp" id="editor1" class="form-control" required="" rows="10" cols="80" >{!! @$product->long_descp !!}</textarea>
                                            </div>
                                        </div>
                                    </div> {{-- end col-12 --}}
                                </div>  {{-- end row 7th --}}

                                <hr>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <input {{ @$product->hot_deals == '1' ? 'checked' : '' }} type="checkbox" name="hot_deals" id="hot_deals" value="1">
                                                <label for="hot_deals">Hot Deals</label>
                                            </div>                  
                                            <div class="controls">
                                                <input {{ @$product->featured == '1' ? 'checked' : '' }} type="checkbox" name="featured" id="featured" value="1">
                                                <label for="featured">Featured</label>
                                            </div>                              
                                        </div>
                                    </div> {{-- end col-6 --}}
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <input {{ @$product->special_offer == '1' ? 'checked' : '' }} type="checkbox" name="special_offer" id="special_offer" value="1">
                                                <label for="special_offer">Special Offer</label>
                                            </div>          
                                            <div class="controls">
                                                <input {{ @$product->special_deals == '1' ? 'checked' : '' }} type="checkbox" name="special_deals" id="special_deals" value="1">
                                                <label for="special_deals">Special Deals</label>
                                            </div>                              
                                        </div>
                                    </div> {{-- end col-6 --}}
                                </div>  {{-- end row 8th --}}   

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product">
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

      {{-- Multi Images Update --}}
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box bt-3 border-info">
              <div class="box-header">
                <h4 class="box-title">Porduct Images <strong>Update</strong></h4>
              </div>

              <div class="box-body">

                <form method="POST" action="{{ route('multiimage.update') }}" enctype="multipart/form-data">
                    @csrf

                  <div class="row">
                    @forelse($multiImages as $img)
                      <div class="col-3">
                        <div class="card" >
                          <img src="{{ asset(@$img->multi_img) }}" class="card-img-top" width="130" height="280">
                          <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('multiimage.delete', ['multiimg'=>@$img->id]) }}" class="btn btn-sm btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                            </h5>
                            <p class="card-text">
                                <div class="form-group">
                                    <label class="col-form-label">Update Image</label>
                                    <input type="file" name="multi_img[{{$img->id}}]" class="form-control">
                                </div>
                            </p>
                          </div>
                        </div>
                      </div>
                    @empty
                    @endforelse
                  </div>
                  <div class="text-xs-right">
                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                  </div>
                </form>

              </div>
            </div>
          </div>    
        </div>  
      </section>
      {{-- End Multi Images Update --}}

        {{-- Product Thambnail Update --}}
        <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box bt-3 border-info">
              <div class="box-header">
                <h4 class="box-title">Porduct Thambnail <strong>Update</strong></h4>
              </div>

              <div class="box-body">

                <form method="POST" action="{{ route('thambnail.update', ['product'=>@$product->id]) }}" enctype="multipart/form-data">
                    @csrf   

                  <div class="row">
                      <div class="col-3">
                        <div class="card" >
                          <img src="{{ asset(@$product->thambnail) }}" class="card-img-top" width="130" height="280">
                          <div class="card-body">
                            <h5 class="card-title">

                            </h5>
                            <p class="card-text">
                                <div class="form-group">
                                    <label class="col-form-label">Update Image</label>
                                    <input type="file" name="thambnail" class="form-control">
                                </div>
                            </p>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="text-xs-right">
                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Thambnail">
                  </div>
                </form>

              </div>
            </div>
          </div>    
        </div>  
        </section>
        {{-- End Product Thambnail Update --}}

@endsection

@section('admin-js')
{{-- select js --}}
<script src="{{ asset('') }}assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
<script src="{{ asset('') }}assets/vendor_components/select2/dist/js/select2.full.js"></script>
<script src="{{ asset('backend') }}/js/pages/advanced-form-element.js"></script>
{{-- tagsinput js --}}
<script src="{{ asset('') }}assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>
{{-- tagsinput js --}}
<script src="{{ asset('') }}assets/vendor_components/ckeditor/ckeditor.js"></script>
<script src="{{ asset('backend') }}/js/pages/editor.js"></script>
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
<script type="text/javascript">
    function mainThamUrl(input){
        // console.log(input);
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
                $('#mainThmb').attr('src',e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }   
</script>

<script>
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });   
</script>
@endsection

