@extends('layouts.layout')

@section('content')
    <div class="container bg-light p-4 rounded">
        <div class="itemshow">
            <h1>Show user</h1>
            <div class="row">
                <div class="col-3 ">
                    <div>
                        Name: {{ $user->name }}</br>
                    </div>
                    <div>
                        Email: {{ $user->email }}</br>
                    </div>
                    <div>
                        Gender: {{ config('const.table.user.gender_name')[$user->gender] }}</br>
                    </div>
                    <div>
                        @if ($user->profile_image)
                            <img src="{{ asset($user->profile_image) }}" class="img-show" width="200" height="200">
                        @else
                            <p>No profile image</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <a href="{{ route('edit', $user->id) }}"class="btn btn-info btn-sm">Edit</a>
                <a href="{{ route('index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
@endsection
