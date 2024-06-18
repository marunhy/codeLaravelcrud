<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- @vite(['resources/css/toppage.css']) --}}
    @vite('resources/js/user.js')

    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
</head>
@extends('layouts.layout-page')
@section('pagepost')
    <div class="container container-resetPassword">
        <div class="resetPassword">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('resetPassword') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email:</label>
                    <div>
                        <input type="email" name="email" id="email" class="form-control">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">New Password:<span class="required-mark-add"></span></label>
                    <div class="input-group">
                        <input id="password" type="password" class="form-control password-field" name="password"
                            autocomplete="new-password">
                        <button type="button" class="btn btn-outline-secondary toggle-password"><i
                                class="bi bi-eye"></i></button>
                    </div>
                    @error('password')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- <div class="form-group">
                    <label for="password" class="form-label">Confirm Password:<span class="required-mark-add"></span></label>
                        <div class="input-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                            <button type="button" id="toggle-password" class="btn btn-outline-secondary"><i class="bi bi-eye"></i></button>
                        </div>
                        @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    @if ($errors->has('new-password_confirmation'))
                        <span class="text-danger">{{ $errors->first('new-password_confirmation') }}</span>
                    @endif
                </div> --}}
                <div class="form-group">
                    <label for="confirm-password" class="form-label">Confirm Password:<span
                            class="required-mark-add"></span></label>
                    <div class="input-group">
                        <input id="confirm-password" type="password" class="form-control password-field"
                            name="password_confirmation" autocomplete="new-password">
                        <button type="button" class="btn btn-outline-secondary toggle-password"><i
                                class="bi bi-eye"></i></button>
                    </div>
                    @error('password')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>



                <button type="submit" class="btn btn-primary">Reset Password</button>
            </form>
        </div>
    </div>
@endsection
