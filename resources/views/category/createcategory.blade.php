<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- @vite(['resources/css/toppage.css']) --}}
    {{-- @vite('resources/js/user.js') --}}
    <link rel="stylesheet" href="{{ asset('css/category/create.css') }}">
</head>
@extends('admin.dashboard')

@section('adminpage')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Create category</h2>
                <form action="{{ route('createcategory') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Name:</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="categories_image">Category Image:</label>
                        <input type="file" id="categories_image" name="categories_image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary" id="submitButton" onclick="this.disabled=true; this.form.submit();">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
