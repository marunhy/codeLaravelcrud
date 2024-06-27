<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- @vite(['resources/css/postdetail.css']) --}}
    @vite('resources/js/user.js')
    @vite(['resources/css/user/edit.css'])
    {{-- <script src="{{ asset('js/user.js') }}"></script> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/edit.css') }}"> --}}
</head>
@extends('layouts.layout-page')
@section('pagepost')
    <div class="container bg-light p-4 rounded">
        <div>
            <h2>Update user</h2>
            <form id="updateForm" action="{{ route('updatewriter', ['userId' => $user->id]) }}" method="post"
                enctype="multipart/form-data">
                @method('patch')
                @csrf
                <input type="hidden" name="userId" value="{{ $user->id }}">
                <div class="row">
                    <div class="col-6 float-left">
                        <div class="col">
                            <label for="name" class="form-label">Name:<span class="required-mark-add"></span></label>
                            <div>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name', $user->name) }}" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <label for="email" class="form-label">Email:<span class="required-mark-add"></span></label>
                            <div>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email', $user->email) }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <label for="signupPassword" class="form-label">Password:<span
                                    class="required-mark-add"></span></label>
                            <div>
                                <div class="input-group">
                                    <input id="password" type="password"
                                        class="form-control password-field @error('password') is-invalid @enderror"
                                        name="password" autocomplete="new-password"
                                        value="{{ old('password', $user->password) }}">
                                        <button type="button" class="btn btn-outline-secondary toggle-password"><i class="bi bi-eye"></i></button>

                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <label for="gender" class="form-label">Gender:<span class="required-mark-add"></span> </label>
                            <div>
                                <div class="d-flex align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="male"
                                            value="1" {{ old('gender', $user->gender) == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="male">
                                            {{ __('Male') }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="female"
                                            value="0" {{ old('gender', $user->gender) == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="female">
                                            {{ __('Female') }}
                                        </label>
                                    </div>
                                </div>
                                @error('gender')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="button-page-edit">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('indexwriter') }}" class="btn btn-default">Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="img-edit col float-right">
                        <img src="{{ asset($user->profile_image) }}" id="preview-image" width="300"
                            class="img-fluid rounded">
                        <div class="item-img-edit col">
                            <label for="profile_image" class="form-label">{{ __('Profile Image') }}:<span
                                    class="required-mark-add"></span></label>
                            <input type="file" class="form-control mh-300 @error('profile_image') is-invalid @enderror"
                                name="profile_image" id="profile_image" accept="image/*" placeholder="Picture"
                                value="{{ old('profile_image', $user->profile_image) }}">
                            <input type="hidden" name="profile_image_url"
                                value="{{ old('profile_image_url', $user->profile_image) }}">
                            @error('profile_image')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
