<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/auth/waiting.css'])
    @vite('resources/js/user.js')
    {{-- <link rel="stylesheet" href="{{ asset('css/auth/waiting.css') }}"> --}}
    {{-- <script src="{{ asset('js/user.js') }}"></script> --}}
</head>
@extends('layouts.layout-page')
@section('pagepost')
    <div class="container container-waiting">
        <h2 class="title-page-signup">Temporary registration email sent.</h2>
        <div class="icon-send1">
            <i class="bi bi-send"></i>
        </div>
        <div class="text-icon-send">
            <span>Information has been sent to email</span></br>
            <span>Please check your email</span>
        </div>
        <div class="justify-content-evenly button-signup">
            <div class="custom-witting">
                <a href="{{ route('sendEmail') }}" class="btn btn-sm custom-button-witting">Back to page</a>
            </div>
        </div>
    </div>
@endsection
