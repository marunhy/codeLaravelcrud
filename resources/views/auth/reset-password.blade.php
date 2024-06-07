{{-- resources/views/sign-up.blade.php --}}
@extends('layouts.layout')

@section('content')
    <div class="container container-signup">
        <h2 class="text-page-signup">Password reset email sent</h2>
        <form class="form-signup" action="{{ route('sendEmail') }}" method="POST" id="signupForm">
            @csrf
            <div class="row signup justify-content-center">
                <div class="col-7 title-signup mx-auto">
                    <div class="form-sigup-email">
                        <label for="email" class="form-label text-email">Email address:<span class="required-mark-signup"></span>
                        </label>

                        <input type="email" class="email" name="email" id="email" required>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row justify-content-evenly button-signup">
                <div class="col-5 custom-button">
                    <div class="button-back1">
                        <button type="button" class="btn btn-sm custom-button1">Back</button>
                    </div>
                </div>
                <div class="col-5 custom-button">
                    <div class="button-back2">
                        <button type="submit" class="btn btn-sm custom-button2" id="submitButton">Sign up</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection


