<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- @vite(['resources/css/postdetail.css']) --}}
    <link rel="stylesheet" href="{{ asset('css/forgotPassword.css') }}">
</head>
@extends('layouts.layout-page')
@section('pagepost')
    <div class="container container-forgotPassword">
        <div class="row forgotPassword justify-content-center">
            <div class="col-md-6 form-forgotpassword">
                <form action="{{ route('forgotPassword') }}" method="POST">
                    <p class="custom-text-forgotpassword">Forgot password</p>
                    @csrf
                    <div class="form-group">
                        <label for="email">Email address:<span class="required-mark-signup"></span></label>
                        <input type="email" name="email" id="email" class="form-control frame-input-email">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="button-sendotp">Send OTP</button>
                </form>
            </div>
        </div>
    </div>
@endsection
