<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- @vite(['resources/css/postdetail.css']) --}}
    {{-- @vite('resources/js/user.js') --}}
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
    <script src="{{ asset('js/user.js') }}"></script>
</head>
@extends('layouts.layout-page')
@section('pagepost')
    <div class="container bg-light p-4 rounded">
        <h1>Add new user</h1>
        <div class="lead">
            Add new user and assign role.
        </div>
        <div class="row">
            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-6">
                    <div class="col">
                        <label for="name" class="form-label">Name:<span class="required-mark-add"></label>
                        <div>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <label for="email" class="form-label">Email:<span class="required-mark-add"></label>
                        <div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email', $email) }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <label for="password" class="form-label">Password:<span class="required-mark-add"></span></label>
                        <div class="input-group">
                            <input id="password" type="password" class="form-control password-field @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                            <button type="button" class="btn btn-outline-secondary toggle-password"><i class="bi bi-eye"></i></button>
                        </div>
                        @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="gender" class="form-label">Gender:<span class="required-mark-add"> </label>
                        <div>
                            <div class="d-flex align-items-center">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" id="male" name="gender"
                                        value="1">
                                    <label class="form-check-label" for="male">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="female" name="gender"
                                        value="0">
                                    <label class="form-check-label" for="female">
                                        Female
                                    </label>
                                </div>
                            </div>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <label for="profile_image" class="form-label">Image:<span class="required-mark-add"></label>
                        <div>
                            <input id="profile_image" type="file"
                                class="form-control-file @error('profile_image') is-invalid @enderror" name="profile_image"
                                required>

                            @error('profile_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="btn-savenew">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('signUp') }}" class="btn btn-default">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
