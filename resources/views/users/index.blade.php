@extends('layouts.layout')

@section('content')
    <div class="container bg-light p-4 rounded">

        <div class="row justify-content-evenly">
            <div class="col-8">
                <h1>User</h1>

                @include('layouts.partials.messages')
                <div class="lead">
                    Manage your users here.
                    <div class="icon-add-new-user">
                        <a href="{{ route('create') }}"><i class="bi bi-person-add"></i></a>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" width="26px">#</th>
                            <th scope="col" width="279px">Name</th>
                            <th scope="col" width="266px">Email</th>
                            <th scope="col" width="58px">Image</th>
                            <th scope="col" width="78px">Gender</th>
                            <th scope="col" width="260px" colspan="3">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="col" width="26px">
                                    {{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</th>
                                <td scope="col" width="279px">{{ $user->name }}</td>
                                <td scope="col" width="266px">{{ $user->email }}</td>
                                <td width="58px">
                                    <img src="{{ $user->profile_image }}" class="img-circle" alt="User Image" width="50"
                                        height="50">
                                </td>
                                <td width="78px">{{ $user->gender ? 'male' : 'female' }}</td>
                                <td><a href="{{ route('show', $user->id) }}"> <i class="bi bi-eye-fill"></i></a></td>
                                <td><a href="{{ route('edit', $user->id) }}"><i class="bi bi-pencil-square"></i></a></td>
                                <td>
                                    <form method="POST" action="{{ route('destroy', $user->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            style="background: none; border: none; padding: 0; cursor: pointer; color:red">
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
            <div class="col-3">
                <div class="form-search">
                    <div class="item-search">
                        <hr>
                    </div>
                    <form method="get" class="search" action="{{ route('search') }}">
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
    </div>
@endsection
