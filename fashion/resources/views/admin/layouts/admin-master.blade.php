<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('') }}images/favicon.ico">

    <title>Unique Fashion - @yield('title')</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('backend') }}/css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('backend') }}/css/style.css">
	<link rel="stylesheet" href="{{ asset('backend') }}/css/skin_color.css">

	{{-- toaster css --}}
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

	@yield('admin-css')
     
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

<div class="wrapper">

  @include('admin.partials.header')
  
  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.partials.left-sidebar')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">

      @yield('content')
		
	  </div>
  </div>
  <!-- /.content-wrapper -->

  @include('admin.partials.footer')
  
</div>
<!-- ./wrapper -->
  	
	 
	<!-- Vendor JS -->
	<script src="{{ asset('backend') }}/js/vendors.min.js"></script>
    <script src="{{ asset('') }}assets/icons/feather-icons/feather.min.js"></script>	
	<script src="{{ asset('') }}assets/vendor_components/easypiechart/dist/jquery.easypiechart.js"></script>
	<script src="{{ asset('') }}assets/vendor_components/apexcharts-bundle/irregular-data-series.js"></script>
	<script src="{{ asset('') }}assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>

	{{-- toaster js --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

	@yield('admin-js')
	
	<!-- Sunny Admin App -->
	<script src="{{ asset('backend') }}/js/template.js"></script>
	<script src="{{ asset('backend') }}/js/pages/dashboard.js"></script>
	 
	<script>
		@if(Session::has('message'))
		    var type = "{{ Session::get('alert-type', 'info') }}";
		    switch(type){
		        case 'info':
		            toastr.info("{{ Session::get('message') }}");
		            break;

		        case 'warning':
		            toastr.warning("{{ Session::get('message') }}");
		            break;

		        case 'success':
		            toastr.success("{{ Session::get('message') }}");
		            break;

		        case 'error':
		            toastr.error("{{ Session::get('message') }}");
		            break;
		    }
		@endif
	</script>
	
</body>
</html>
