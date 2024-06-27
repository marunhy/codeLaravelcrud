<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- @vite(['resources/css/postdetail.css']) --}}
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
@extends('admin.dashboard')
@section('adminpage')

        <div class="row justify-content-evenly">
            <div class="col-8 col-md-8">
                <h1>User</h1>

                @include('layouts.partials.messages')
                <div class="lead">
                    Manage your users here.
                    <div class="icon-add-new-user">
                        <a href="{{ route('createwriter') }}"><i class="bi bi-person-add"></i></a>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" width="1%">#</th>
                            <th scope="col" width="">Name</th>
                            <th scope="col" width="30%">Email</th>
                            <th scope="col" width="15%">Image</th>
                            <th scope="col" width="10%">Gender</th>
                            <th scope="col" width="15%" colspan="3">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="col" >
                                    {{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</th>
                                <td scope="col">{{Str::limit( $user->name, 20) }}</td>
                                <td scope="col">{{Str::limit(  $user->email, 20) }}</td>
                                <td>
                                    <img src="{{ $user->profile_image }}" class="img-circle" alt="User Image" width="50"
                                        height="50">
                                </td>
                                <td>{{ $user->gender ? 'male' : 'female' }}</td>
                                <td><a href="{{ route('showwriter', $user->id) }}"> <i class="bi bi-eye-fill"></i></a></td>
                                <td><a href="{{ route('editwriter', $user->id) }}"><i class="bi bi-pencil-square"></i></a></td>
                                <td>
                                    <form method="POST" action="{{ route('destroywriter', $user->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            style="background: none; border: none; padding: 0; cursor: pointer; color:red"
                                            onclick="return confirm('Are you sure you want to delete this user?')">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $users->links() }}
                </div>
            </div>
            <div class="col-3 col-md-3">
                <div class="form-search">
                    <div class="item-search">
                        <hr>
                    </div>
                    <form method="get" class="search" action="{{ route('searchwriter') }}">
                        <div class="search-by-name">
                            <span class="title-search-name">Name</span>
                            <div class="search-bar">
                                <input class="form-control" type="search" name="name" placeholder="Search by name"
                                    value="{{ request()->get('name') }}">
                            </div>
                        </div>
                        <div class="search-by-name mt-3">
                            <span class="title-search-name">Gender</span>
                            <div class="search-radio">
                                <div>
                                    <input type="checkbox" name="gender[]" value="1" id="male"
                                        {{ in_array('1', (array) request()->get('gender')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div>
                                    <input type="checkbox" name="gender[]" value="0" id="female"
                                        {{ in_array('0', (array) request()->get('gender')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>
                        </div>
                        <div class="button-search">
                            <button class="btn btn-primary mt-2" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
