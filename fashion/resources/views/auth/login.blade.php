@extends('layouts.frontend-master')

@section('front-title')
Login/Registration
@endsection

@section('front-content')
{{-- <div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Login</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb --> --}}

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->            
                <div class="col-md-6 col-sm-6 sign-in">
                    <h4 class="">Sign in</h4>
                    <p class="">Hello, Welcome to your account.</p>
                    <div class="social-sign-in outer-top-xs">
                        <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
                        <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="email">Email Address <span>*</span></label>
                            <input type="email" name="email" class="form-control unicase-form-control text-input" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <label class="info-title" for="password">Password <span>*</span></label>
                            <input type="password" name="password" class="form-control unicase-form-control text-input" id="password" autocomplete="current-password">
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="radio outer-xs">
                            <label>
                                <input type="radio" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember me!
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your Password?</a>
                            @endif
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                    </form>                 
                </div>
                <!-- Sign-in -->

                <!-- create a new account -->
                <div class="col-md-6 col-sm-6 create-new-account">
                    <h4 class="checkout-subtitle">Create a new account</h4>
                    <p class="text title-tag-line">Create your new account.</p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="name">Name <span>*</span></label>
                            <input type="name" class="form-control unicase-form-control text-input" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="email">Email Address <span>*</span></label>
                            <input type="email" class="form-control unicase-form-control text-input" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" >
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
                            <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                        </div> --}}
                        <div class="form-group">
                            <label class="info-title" for="password">Password <span>*</span></label>
                            <input type="password" class="form-control unicase-form-control text-input" id="password" name="password" required autocomplete="new-password" >
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="password-confirm">Confirm Password <span>*</span></label>
                            <input type="password" class="form-control unicase-form-control text-input" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
                    </form>


                </div>  
                <!-- create a new account -->           
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
    </div>
</div>
@endsection
