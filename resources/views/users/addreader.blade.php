<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- @vite(['resources/css/users.css']) --}}
    @vite('resources/js/user.js')
    @vite(['resources/css/user/add.css'])
    {{-- <script src="{{ asset('js/user.js') }}"></script> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/add.css') }}"> --}}
</head>
@extends('layouts.layout-page')

@section('pagepost')
    <div class="container bg-light p-4 rounded">
        <h1 class="text-title">Add new user</h1>
        <div class="lead">
            Add new user and assign role.
        </div>
        <div class="row">
            <form action="{{ route('storereader') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-6">
                    <div class="col">
                        <label for="name" class="form-label">Name:<span class="required-mark-add"></span></label>
                        <div>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                            @error('name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <label for="email" class="form-label">Email:<span class="required-mark-add"></span></label>
                        <div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" autocomplete="email">
                            @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <label for="password" class="form-label">Password:<span class="required-mark-add"></span></label>
                        <div class="input-group">
                            <input id="password" type="password"
                                class="form-control password-field @error('password') is-invalid @enderror" name="password"
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
                    <div class="col">
                        <label class="form-label">Gender:<span class="required-mark-add"></span></label>
                        <div>
                            <div class="d-flex align-items-center">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" id="male" name="gender"
                                        value="1" {{ old('gender') == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="male">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="female" name="gender"
                                        value="0" {{ old('gender') == '0' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="female">
                                        Female
                                    </label>
                                </div>
                            </div>
                            @error('gender')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <label for="profile_image" class="form-label">Image:<span class="required-mark-add"></span></label>
                        <div>
                            @if (isset($uploadedImageUrl))
                                <img src="{{ $uploadedImageUrl }}" alt="Uploaded Image" class="img-thumbnail" style="max-width: 200px;">
                                <input type="hidden" name="uploaded_image" value="{{ $uploadedImageUrl }}">
                            @else
                                <input id="profile_image" type="file"
                                    class="form-control-file @error('profile_image') is-invalid @enderror" name="profile_image">
                                @error('profile_image')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            @endif
                        </div>
                    </div>
                    <div class="btn-savenew">
                        <button type="submit" class="btn btn-primary">Add new</button>
                        <a href="{{ route('indexreader') }}" class="btn btn-default">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
