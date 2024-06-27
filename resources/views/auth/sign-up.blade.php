<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/auth/signup.css'])
    {{-- <link rel="stylesheet" href="{{ asset('css/auth/signup.css') }}"> --}}
</head>
@extends('layouts.layout-page')
@section('pagepost')
<div class="custome-hr-header">
    <hr>
</div>
<div class="container container-signup">
    <div class="form-sign-up">
        <h2 class="text-page-signup">Register as a new member</h2>
        <form class="form-signup" action="{{ route('sendEmail') }}" method="POST" id="signupForm">
            @csrf
            <div class="row signup justify-content-center">
                <div class="col-7 title-signup mx-auto">
                    <div class="form-sigup-email">
                        <label for="email" class="form-label text-email">Email address:<span class="required-mark-signup"></span></label>
                        <div>
                            <input type="email" class="email" name="email" id="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="text-danger error-require">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-evenly form-button-signup">
                <div class="col-5 custom-button">
                    <div class="button-back1">
                        <button type="button" class="btn btn-sm custom-button1" onclick="window.location='{{ route('indexpost') }}'">Back</button>
                    </div>
                </div>
                <div class="col-5 custom-button">
                    <div class="button-back2">
                        <button type="submit" class="btn btn-sm custom-button2" id="submitButton" onclick="this.disabled=true; this.form.submit();">Sign up</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection

<script>
    document.getElementById("signupForm").addEventListener("submit", function() {
        document.getElementById("submitButton").disabled = true;
    });
</script>
