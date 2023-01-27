@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="css/bootstrap4.css">
<link rel="stylesheet" href="css/custom.css">

<link rel="stylesheet" href="css/owl.carousel.css">
<link rel="stylesheet" href="css/owl.theme.default.css">
<div class="section bg-f5f5f5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="fw-card">


                    <h5 class="font-weight-bold">Login to Your Account!</h5>
                    <hr>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email" class="fw-label">{{ __('Email Address') }}</label>
                                    <input id="email" type="text" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password" class="fw-label">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                                            </div>

                           

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-logo btn-block"> {{ __('Login') }}</button>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mt-3 text-center">
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link text-dark" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                                                                    </div>
                            </div>

                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">



                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/owl.carousel.js"></script>
<script src="js/sweetalert.min.js"></script>

@endsection
