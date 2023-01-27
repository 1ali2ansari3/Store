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
            <div class="col-md-9">
                <div class="register-card">
                    <div class="row">
                        <div class="col-md-6 d-none d-sm-block">
                            <img src="https://www.fundacodester.com/frontend/images/register-banner.png" class="w-100 h-100" alt="Logo">
                        </div>
                        <div class="col-md-6  pr-4">
                            <div class="card-body">
                                <h5 class="font-weight-bold">{{ __('Register') }}</h5>
                                <hr>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="fw-label">{{ __('Username') }}</label>
                                    <input id="name" type="text" placeholder="Enter Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                                                        </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email" class="fw-label">{{ __('Email Address') }}</label>
                                    <input id="email" type="email"  placeholder="Enter Email Id" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                                    <input id="password" type="password"  placeholder="Enter Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                                                        </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password-confirm" class="fw-label">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control"  placeholder="Enter Confirm Password" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-logo btn-block"> {{ __('Register') }}</button>
                                </div>
                            </div>

                        </div>
                    </form>


                </div>
            </div>
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
