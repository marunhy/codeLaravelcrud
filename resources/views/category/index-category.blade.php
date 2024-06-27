<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/category/index-category.css'])
    {{-- <link rel="stylesheet" href="{{ asset('css/category/index-category.css') }}"> --}}
</head>
@extends('admin.dashboard')

@section('adminpage')
    <div class="row justify-content-evenly">
        <div class="col-8 col-md-8">
            <h1>Manage Category</h1>
            @include('layouts.partials.messages')
            <div class="lead">
                Manage your Category here.
                <div class="icon-add-new-user">
                    <a href="{{ route('createcategoryform') }}"><i class="bi bi-plus-lg"></i></i></a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" width="1%">#</th>
                        <th scope="col">Name</th>
                        <th scope="col" width="30%">Quantity</th>
                        <th scope="col" width="10%">Image</th>
                        <th scope="col" width="15%" colspan="3">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ Str::limit($category->name, 20) }}</td>
                            <td>{{ $category->post_count }}</td> <!-- Số lượng bài post -->
                            <td>
                                <img src="{{ $category->categories_image }}" class="img-circle" alt="Category Image"
                                    width="50" height="50">
                            </td>
                            <td>
                                <a href=""><i class="bi bi-eye-fill"></i></a>
                                <a href="{{ route('editcategoryform', $category->id) }}"><i class="bi bi-pencil-square"></i></a>
                                <form action="" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer; color:red"
                                        onclick="return confirm('Are you sure you want to delete this category?')"><i
                                            class="bi bi-trash3-fill"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
