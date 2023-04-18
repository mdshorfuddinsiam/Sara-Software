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
                  <h4 class="box-title">Add Product</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

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
                                                        <option value="{{ @$row->id }}" >{{ @$row->category_name }}</option>
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
                                                <input type="text" name="name" class="form-control" required=""> </div>
                                        </div>
                                    </div> {{-- end col-6 --}}
                                </div>  {{-- end row 1st --}}

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Code <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="code" class="form-control" required=""> </div>
                                        </div>
                                    </div> {{-- end col-6 --}}
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Quantity <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="number" min="0" name="qty" class="form-control" required=""> </div>
                                        </div>
                                    </div> {{-- end col-6 --}}
                                </div>  {{-- end row 2nd --}}

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Size</h5>
                                            <div class="controls">
                                                <input type="text" name="size" value="Large,Medium,Small" data-role="tagsinput" placeholder="add tags" /> 
                                            </div>
                                        </div>
                                    </div> {{-- end col-6 --}}
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Color<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="color" value="Red,Green,Blue" data-role="tagsinput" placeholder="add tags" /> 
                                            </div>
                                        </div>
                                    </div> {{-- end col-6 --}}
                                </div>  {{-- end row 3rd --}}

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Selling Price <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="number" min="0" name="selling_price" class="form-control" required=""> 
                                            </div>
                                        </div>
                                    </div> {{-- end col-6 --}}
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Discount Price </h5>
                                            <div class="controls">
                                                <input type="number" name="discount_price" class="form-control" > 
                                            </div>
                                        </div>
                                    </div> {{-- end col-6 --}}
                                </div>  {{-- end row 4th --}}

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Main Thumbnail <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="thambnail" class="form-control" required="" onChange="mainThamUrl(this)"> 
                                                <img src="" id="mainThmb">
                                            </div>
                                        </div>
                                    </div> {{-- end col-6 --}}
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Multiple Image</h5>
                                            <div class="controls">
                                                <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg">
                                                <div class="row" id="preview_img">
                                                </div> 
                                            </div>
                                        </div>
                                    </div> {{-- end col-6 --}}
                                </div>  {{-- end row 5th --}}           

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Short Description<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="short_descp" id="short_descp" class="form-control" required="" ></textarea>
                                            </div>
                                        </div>
                                    </div> {{-- end col-12 --}}
                                    
                                </div>  {{-- end row 6th --}}

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Long Description<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="long_descp" id="editor1" class="form-control" required="" rows="10" cols="80" ></textarea>
                                            </div>
                                        </div>
                                    </div> {{-- end col-12 --}}
                                </div>  {{-- end row 7th --}}

                                <hr>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <input type="checkbox" name="hot_deals" id="hot_deals" value="1">
                                                <label for="hot_deals">Hot Deals</label>
                                            </div>                  
                                            <div class="controls">
                                                <input type="checkbox" name="featured" id="featured" value="1">
                                                <label for="featured">Featured</label>
                                            </div>                              
                                        </div>
                                    </div> {{-- end col-6 --}}
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <input type="checkbox" name="special_offer" id="special_offer" value="1">
                                                <label for="special_offer">Special Offer</label>
                                            </div>          
                                            <div class="controls">
                                                <input type="checkbox" name="special_deals" id="special_deals" value="1">
                                                <label for="special_deals">Special Deals</label>
                                            </div>                              
                                        </div>
                                    </div> {{-- end col-6 --}}
                                </div>  {{-- end row 8th --}}   

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New Product">
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
{{-- select js --}}
<script src="{{ asset('') }}assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
<script src="{{ asset('') }}assets/vendor_components/select2/dist/js/select2.full.js"></script>
<script src="{{ asset('backend') }}/js/pages/advanced-form-element.js"></script>
{{-- tagsinput js --}}
<script src="{{ asset('') }}assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>
{{-- tagsinput js --}}
<script src="{{ asset('') }}assets/vendor_components/ckeditor/ckeditor.js"></script>
<script src="{{ asset('backend') }}/js/pages/editor.js"></script>
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

