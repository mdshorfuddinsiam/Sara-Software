<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>Unique Fashion - @yield('front-title')</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('frontend') }}/css/main.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/css/blue.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.carousel.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.transitions.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/css/animate.min.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/css/rateit.css">
<link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap-select.min.css">
<link href="{{ asset('frontend') }}/css/lightbox.css" rel="stylesheet">

@yield('front-css')

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('frontend') }}/css/font-awesome.css">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('partials.header')

<!-- ============================================== HEADER : END ============================================== -->

@yield('front-content')

<!-- ============================================================= FOOTER ============================================================= -->
@include('partials.footer')
<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{ asset('frontend') }}/js/jquery-1.11.1.min.js"></script> 
<script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script> 
<script src="{{ asset('frontend') }}/js/bootstrap-hover-dropdown.min.js"></script> 
<script src="{{ asset('frontend') }}/js/owl.carousel.min.js"></script> 
<script src="{{ asset('frontend') }}/js/echo.min.js"></script> 
<script src="{{ asset('frontend') }}/js/jquery.easing-1.3.min.js"></script> 
<script src="{{ asset('frontend') }}/js/bootstrap-slider.min.js"></script> 
<script src="{{ asset('frontend') }}/js/jquery.rateit.min.js"></script> 
<script type="text/javascript" src="{{ asset('frontend') }}/js/lightbox.min.js"></script> 
<script src="{{ asset('frontend') }}/js/bootstrap-select.min.js"></script> 
<script src="{{ asset('frontend') }}/js/wow.min.js"></script> 
<script src="{{ asset('frontend') }}/js/scripts.js"></script>

@yield('front-js')

</body>
</html>