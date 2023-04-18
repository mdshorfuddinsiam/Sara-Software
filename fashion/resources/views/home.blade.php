@extends('layouts.frontend-master')

@section('front-title')
    Home Page
@endsection

@section('front-content')

<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row">

      <div class="row">
        <div class="col-md-12 ">
          <a href="{{ route('user.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-primary">Logout</a>
          <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-md-12">
          <h1 class="text-center text-danger">Welcome To Our Dashboard!!</h1>
        </div>
      </div>

    </div>  
  </div>  
</div>  

@endsection
