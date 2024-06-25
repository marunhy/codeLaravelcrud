<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- @vite(['resources/css/postdetail.css']) --}}
    <link rel="stylesheet" href="{{ asset('css/verifyOTP.css') }}">
</head>
@extends('layouts.layout-page')
@section('pagepost')
    <div class="container container-verifyOTP">
        <div class="codeOTP">
            <form action="{{ route('verifyOTP') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="otp">OTP:</label>
                    <div>
                        <input type="text" name="otp" id="otp" class="form-control">
                        @if ($errors->has('otp'))
                            <span class="text-danger error-require">{{ $errors->first('otp') }}</span>
                        @endif
                    </div>

                </div>
                <button type="submit" class="btn btn-primary" id="submitButton" onclick="this.disabled=true; this.form.submit();">Verify OTP</button>
            </form>
        </div>
    </div>
@endsection
