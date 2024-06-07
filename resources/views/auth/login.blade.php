@extends('layouts.layout')

@section('content')
    <div class="container container-login">
        <div class="col-12 col-md-12 mx-auto row">
            <p class="title-text-login">Login</p>
        </div>
        <div class="row col-md-7 col-12 mx-auto">
            <form class="form-login" action="{{ route('signIn') }}" method="POST" id="signInForm">
                @csrf
                <div class="row login-form-import">
                    <div class="col-md-12 form-login-text">
                        <label for="email" class="form-label title-form-login">Email address:</label>
                        <span class="required-mark"></span>
                    </div>
                    <div class="col-md-12">
                        <input type="email" name="email" class="title-form-login-input" id="email"
                            aria-describedby="emailHelp" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row login-form-import">
                    <div class="col-md-12 form-login-text">
                        <label for="password" class="form-label title-form-login">Password:</label>
                        <span class="required-mark"></span>
                    </div>
                    <div class="col-md-12">
                        <input type="password" name="password" class="title-form-login-input" id="password">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row checkbox-member-login">
                    <div class="col-md-12 checkbox-tich">
                        <input type="checkbox" id="remember" name="remember" class="form-check-input tick-remember">
                        <label for="remember" class="form-check-label title-chick-remember">
                            Automatically log in next time
                        </label>
                    </div>
                </div>
                <div class="row justify-content-md-center button-form-login">
                    <div class="col-5 button-password-login">
                        <div class="custom-button-password-login">
                            <button type="submit" class="button-login-custom" id="loginButton">Log in</button>
                        </div>
                    </div>
                    <div class="title-forgot-password">
                        <p class="text-forgot-password">Forgot your password?</p>
                    </div>
                </div>
                <div class="row justify-content-md-center button-form-register">
                    <div class="col-5 button-password-register">
                            <div class="custom-button-password-register">
                                <a href="{{ route('signUp') }}" class="button button-register-custom" id="registerButton">New member registration <i class="bi bi-arrow-up-right"></i>
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="title-no-account">
                        <p class="text-no-account">Don't have an account?</p>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
