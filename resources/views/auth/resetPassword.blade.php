@extends('layouts.layout')

@section('content')
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
                    <label for="new-password">New Password:</label>
                    <div>
                        <input type="password" name="new-password" id="new-password" class="form-control">
                        @if ($errors->has('new-password'))
                            <span class="text-danger">{{ $errors->first('new-password') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="new-password_confirmation">Confirm Password:</label>
                    <div>
                        <input type="password" name="new-password_confirmation" id="new-password_confirmation" class="form-control">
                        @if ($errors->has('new-password_confirmation'))
                            <span class="text-danger">{{ $errors->first('new-password_confirmation') }}</span>
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Reset Password</button>
            </form>
        </div>
    </div>
@endsection
