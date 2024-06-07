@extends('layouts.layout')

@section('content')
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
