@extends('layouts.layout')

@section('content')
    <div class="container container-forgotPassword">
        <div class="row forgotPassword justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('forgotPassword') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email address:<span class="required-mark-signup"></span></label>
                        <input type="email" name="email" id="email" class="form-control">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary button-sendotp">Send OTP</button>
                </form>
            </div>
        </div>
    </div>
@endsection
