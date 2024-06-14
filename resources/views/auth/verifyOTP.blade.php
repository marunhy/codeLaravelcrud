@extends('layouts.layout')

@section('content')
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
                <button type="submit" class="btn btn-primary">Verify OTP</button>
            </form>
        </div>
    </div>
@endsection
